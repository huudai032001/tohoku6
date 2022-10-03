<script>
import fileItem from './file-manager-file-item.vue'

export default {
    data() {
        return {
            state: 'idle',
            uploadQueueFileCount: 0,
            uploadCompleteFileCount: 0,
            uploadSuccessFileCount: 0,
            uploadFailFileCount: 0,
            currentUploadingFileNum: 0,
            uploadHasError: false,
            uploadFinished: false,
            currentPath: '',
            subFolders: [],
            selectedFolder: null,
            nextPaginateCursor: '',
            fileItems: [],
            hasMoreItem: false,
            searchKeyword: '',
            loaded: false,
            uploadPerFileResults: []
        }
    },
    props: {
        autoLoad: {
            default: false
        }
    },
    components: {
        fileItem
    },
    methods: {
        triggerFileInput () {
            $('.file-manager input[name="upload_files"]').first().trigger('click');
        },
        async onInputFileChange (e) {
            let files = e.target.files;          
            if (files.length < 1) {
                return;
            }            
            await this.processUploadingQueue(files);
            e.target.value = null;
        },
        processUploadingQueue: async function (files) {
            this.uploadQueueFileCount = files.length;
            this.uploadSuccessFileCount = 0,
            this.uploadFailFileCount = 0;
            this.uploadCompleteFileCount = 0;
            this.uploadHasError = false;
            this.uploadFinished = false;

            this.state = 'uploading';
            this.uploadPerFileResults = [];

            for (let i = 0; i < files.length; i++) {
                this.currentUploadingFileNum = i + 1;

                let file = files[i];


                let result = await this.uploadFile(file); 

                if (result.success) {
                    this.uploadSuccessFileCount++;

                    this.uploadPerFileResults.push( file.name + ' : <span class="text-success">' + this.$t('message.upload_success') +'</span>');
                    console.log(this.uploadPerFileResults)
                    
                    if (result.file_info) {
                        this.fileItems.unshift(this.initFileItem(result.file_info)); 
                    }
                } else {
                    this.uploadFailFileCount++;
                    if (result.error) {
                        this.uploadHasError = true;
                        this.uploadFinished = true;

                        this.uploadPerFileResults.push('<span class="text-danger">'+ this.$t('message.upload_stopped_due_to_error') +'</span>');

                        
                        break;
                    } else {
                        let msg = result.msg ? result.msg : this.$t('message.upload_failed');

                        this.uploadPerFileResults.push('<span class="text-danger">' + file.name + ' - ' + msg + '</span>');
                    }
                }
                this.uploadCompleteFileCount++;

                $('.file-manager .upload-log').scrollTop($('.file-manager .upload-log').prop('scrollHeight'));

            }
            this.uploadFinished = true;

            if (this.uploadFailFileCount < 1) {
                await new Promise(r => setTimeout(r, 1000));
                this.finishUploading();
            }

        },
        uploadFile: async function (file) {
            var formData = new FormData();
            formData.append("upload_file", file);
            formData.append('current_path', this.currentPath);
            //await new Promise(r => setTimeout(r, 1000));
            var result = null;
            let el = this;
            await $.ajax({
                url: '/admin/file-manager/upload',
                method: 'post',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                complete: function (response) {                   
                    result = response;
                    //console.log(response);
                },
                error: function (response) {
                    //alert('error');
                }
            });
            return result;
        },
        deleteFile: async function () {
            if (this.state != 'idle') {
                return;
            }
            if (this.selectedFiles.length < 1) {
                alert(this.$t('message.no_file_selected'));
                return;
            }
            if (window.confirm(this.$t('message.file_delete_confirm'))) {
                let el = this;
                let files_id = this.selectedFiles.map(function(file){
                    return file.id
                });
                
                el.state = 'deleting_file';
                for (let i = 0; i < files_id.length; i++) {
                    let file_id = files_id[i];                    
                    let success = false;

                    await $.ajax({
                        url: '/admin/file-manager/delete-file',
                        method: 'post',
                        data: {
                            file_id: file_id
                        },
                        success: function (response) {
                            if (response.success) {                                
                                success = true;
                                // el.selectedFiles = el.selectedFiles.filter(file => {
                                //     file.id == file_id
                                // })
                                el.fileItems = el.fileItems.filter(file => {
                                     return file.id != file_id
                                })
                                
                            } else {
                                alert(response.message);
                            }
                        },
                        error: function () {
                            alert(this.$t('message.unknown_error'));
                        }
                    });
                    if (!success) break;
                }
                el.state = 'idle';
                
            }
        },
        finishUploading: function () {
            this.state = 'idle';
        },
        fetchData: async function (data_to_load) {
            if (this.state != 'idle') {
                return;
            }
            let el = this;  
            
            this.state = 'fetching'
            await $.ajax({
                url: '/admin/file-manager/fetch-data',
                method: 'get',
                data: {
                    cursor: el.nextPaginateCursor,
                    data_to_load: data_to_load,
                    current_path: el.currentPath,
                    search: el.searchKeyword
                },
                success: function (response) {
                    
                    data_to_load.forEach(data_type => {
                        switch (data_type) {
                            case 'file':
                                el.loadFile(response);
                                break;                        
                            
                            case 'sub_folder':
                                el.loadSubFolder(response);
                                break; 
                        }
                    });

                    
                }
            });
            this.state = 'idle'
        },

        loadFile(response) {
            if (response.files.length > 0) {                            
                let files = response.files;                    
                this.hasMoreItem = response.has_more;
                this.nextPaginateCursor = response.has_more ? response.next_cursor : '';
                for (let i = 0; i < files.length; i++) {
                    const item = files[i];
                    this.fileItems.push(this.initFileItem(item));
                }                       
            }
        },

        loadSubFolder(response) {                
            let folders = response.sub_folders;
            for (let i = 0; i < folders.length; i++) {
                this.subFolders.push(folders[i]);
            }
            
        },

        async createFolder () {
            if (this.state != 'idle') {
                return;
            }
            let folderName = prompt(this.$t('message.set_folder_name'));
            if (folderName) {
                let el = this;
                el.state = 'doing-ajax'
                await $.ajax({
                    url: '/admin/file-manager/create-folder',
                    method: 'post',
                    data: {
                        current_path: el.currentPath,
                        folder_name: folderName
                    },
                    success: function (response) {
                        
                        if (response.success) {
                            el.subFolders = []
                            el.loadSubFolder(response);
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function () {
                        alert(this.$t('message.unknown_error'));
                    }
                });
                el.state = 'idle'
            }
        },
        async deleteFolder () {
            if (this.state != 'idle') {
                return;
            }
            if (!this.selectedFolder) {
                alert(this.$t('message.no_folder_selecred'));
                return;
            }
            if (window.confirm(this.$t('message.folder_delete_confirm'))) {
                let el = this;
                el.state = 'doing-ajax'
                await $.ajax({
                    url: '/admin/file-manager/delete-folder',
                    method: 'post',
                    data: {
                        current_path: el.currentPath,
                        folder_path: this.selectedFolder
                    },
                    success: function (response) {
                        if (response.success) {
                            el.subFolders = []
                            el.loadSubFolder(response);
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function () {
                        alert(this.$t('message.unknown_error'));
                    }
                });
                el.state = 'idle'
            }
        },
        async loadDataFirstTime() {
            if (this.loaded) return;
            await this.fetchData([
                'file',
                'sub_folder'
            ]);
            this.loaded = true;
        },
        showMore() {
            this.fetchData([
                'file'
            ]);
        },
        initFileItem: function (fileInfo) {
            let item = fileInfo;
            item.selected =  false;                
            return item;
        },
        toggleSelectItem (fileInfo) {
            fileInfo.selected = !fileInfo.selected
        },
        getSelectedFiles: function () {
            return this.selectedFiles;
        },
        unselectedFiles: function () {
            this.getSelectedFiles().map(item => {
                item.selected = false;
            })
        },
        selectFolder(folder) {
            if (this.selectedFolder && (this.selectedFolder == folder)) {
                this.changeFolder(folder)
            } else {
                this.selectedFolder = folder
            }
        },
        changeFolder(path = '') {
            this.selectedFolder = null
            this.currentPath = path
            this.subFolders = []            
            this.fileItems = [];
            this.nextPaginateCursor = null

            this.fetchData([
                'file',
                'sub_folder'
            ]);
        },
        backFolder(){
            if (this.currentPath) {
                let folders = this.currentPath.split('/');
                folders.pop();                
                this.changeFolder(folders.join('/'));
            }
        }
    },
    watch: {
        selectedFiles: function () {
            this.$emit('selected-files-change')
        },
        searchKeyword: function () {
            this.fileItems = []
            this.fetchData([
                'file'                
            ]);
        }      
    },
    computed: {
        progressPercent: function () {
            if (this.uploadQueueFileCount < 1) {
                return 0;
            } else {
                return (this.uploadCompleteFileCount) * 100 / this.uploadQueueFileCount;
            }
        },
        selectedFiles: function() {
            return this.fileItems.filter(item => item.selected);
        },
        idle: function () {
            return !(this.isUploading || this.is)
        }
    },
    mounted: function () {
        if (this.autoLoad) {
            this.loadDataFirstTime();
        }        
    }
}
</script>

<template lang="">
    <div class="file-manager">
        <div class="file-manager-wrap">

             <div class="file-manager-header">
                 <div class="action-buttons">
                     <div class="btn btn-primary" data-action="upload-file" @click="triggerFileInput">
                         <i class="icon-upload"></i> {{ $t('upload') }}
                     </div>
                     <!-- <div class="btn btn-light" data-action="move-file">
                         <i class="icon-file-upload2"></i> Move files
                     </div> -->
                     <div class="btn btn-light" data-action="create-folder" @click="createFolder">
                         <i class="icon-folder-plus"></i> {{ $t('create_folder') }}
                     </div>
                     <div class="btn btn-light" data-action="delete-folder" @click="deleteFolder">
                         <i class="icon-folder-remove"></i> {{ $t('delete_folder') }}
                     </div>
                     <div class="btn btn-light" data-action="delete-file" @click="deleteFile">
                         <i class="icon-bin"></i> {{ $t('delete_file') }}
                     </div>                     
                     <!-- <div class="btn btn-light" data-action="rename-folder">
                         <i class="icon-folder-minus3"></i> Rename Folder
                     </div> -->
                     
                 </div>
                 <div class="row justify-content-between align-items-center">
                     <div class="col">
                          <div class="d-flex">
                              <div class="path-breadcrumb flex-fill">
                                    <span class="path-breadcrumb-folder" @click="changeFolder('')"><i class="icon-folder4 mr-1"></i> uploads</span>
                                    <template v-if="currentPath" v-for="(folder, index) in currentPath.split('/')">
                                        <span class="sep">/</span>
                                        <span  class="path-breadcrumb-folder" @click="changeFolder(currentPath.split('/', index + 1).join('/'))">
                                            {{ currentPath.split('/', index + 1).pop() }}
                                        </span>                                            
                                    </template>
                              </div>
                              <span class="btn btn-light ml-2 btn-sm" @click="backFolder">
                                  <i class="icon-undo2"></i> {{ $t('back') }}
                              </span>
                          </div>                                    
                     </div>
                     <div class="col-auto form-inline ml-auto">
                         <div class="row">
                             <div class="col-auto">
                              <input v-model.lazy="searchKeyword" type="search" class="form-control form-control-sm" :placeholder="$t('search_placeholder')" >                                                                                 
                             </div>
                             <!-- <div class="col-auto">
                                 <select name="" id="" class="form-control form-control-sm" disabled>
                                     <option value="">Nestest</option>
                                     <option value="">Oldest</option>
                                 </select>
                             </div> -->
                             <!-- <div class="col-auto">
                                 <div class="btn-group">
                                     <button type="button" class="btn btn-sm btn-icon" disabled><i class="icon-list"></i></button>
                                     <button type="button" class="btn btn-sm btn-light btn-icon"><i
                                             class="icon-grid"></i></button>
                                 </div>
                             </div> -->
                         </div>
                     </div>
                 </div>
             </div>

             <div class="file-manager-body flex-fill d-flex">
                 <div class="folder-tree">
                      <ul class="folder-list">
                         <li v-for="folder in subFolders" @click="selectFolder(folder)" :class="{selected: selectedFolder && (selectedFolder == folder)}"><i class="icon-folder4 mr-1"></i> {{ folder.split('/').pop() }}</li>
                      </ul>
                 </div>
                 <div class="files flex-fill">                     

                    <template v-if="(state == 'idle') && loaded && (fileItems.length < 1)">
                        <div>
                            <div class="alert alert-info">
                                {{ $t('message.no_item_found') }}
                            </div>
                        </div>
                    </template>
                    <template v-else>
                        <div class="files-container">
                            <file-item v-for="(fileInfo, index) in fileItems" :key="fileInfo.id" :file-info="fileInfo" @toggle-select="toggleSelectItem(fileInfo)"></file-item> 
                        </div>
                        <div class="text-center pt-3">
                           <template v-if="state == 'fetching'">
                               <span class="btn btn-light">
                                   <i class="icon-spinner2 spinner mr-2"></i> {{ $t('message.loading') }}
                               </span>
                           </template>
                           <template v-else-if="hasMoreItem">
                               <span class="btn btn-light" @click="showMore">
                                   <i class="icon-arrow-down15 mr-2"></i> {{ $t('load_more') }}
                               </span>
                           </template>
                        </div>
                    </template>
                    

                 </div>
             </div>

        </div>
        <div style="display: none;">
            <input ref="fileInput" @change="onInputFileChange" name="upload_files" type="file" class="form-control" multiple
                accept="audio/*,video/*,image/*,media_type">
        </div> 

        <Transition name="upload-progress">
            <div class="file-uploading-overlay" v-show="state == 'uploading'">
                <div class="file-uploading-overlay-wrap">
                    <div class="file-uploading-overlay-dialog panel">
                        <div class="panel-body">
                            <div class="card">
                                <div class="card-body">
                                    <div class="upload-log">
                                        <div v-for="msg in uploadPerFileResults" v-html="msg"></div>
                                    </div>
                                    <div class="upload-progress mt-2">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" :style="{width: progressPercent + '%'}">
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <span class="mr-4">
                                                {{ $tc('file', 2) }}: <span class="total">{{ uploadQueueFileCount }}</span>
                                            </span>
                                            <span class="mr-4">
                                                {{ $t('success') }}: <span class="success">{{ uploadSuccessFileCount }}</span>
                                            </span>
                                            <span>
                                                {{ $t('fail') }}: <span class="fail">{{ uploadFailFileCount }}</span>
                                            </span>                                    
                                        </div>
                                    </div>
                                    <div class="upload-controls mt-1">
                                        <div class="uploading-controls" style="display: none">
                                            <div class="text-center">                                       
                                                <button class="btn btn-warning upload-control-stop">
                                                    <i class="icon-cancel-circle2 mr-2"></i>
                                                    {{ $t('cancel') }}
                                                </button>
                                            </div>
                                        </div>
                                        <div class="upload-control-group completed-controls" v-show="uploadFinished && (uploadFailFileCount > 0)">
                                            <div class="text-center">
                                                <button class="btn btn-primary" data-control="done" @click="finishUploading">{{ $t('ok') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </Transition>

    </div>
</template>