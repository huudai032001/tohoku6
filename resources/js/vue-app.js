import { createApp } from 'vue'
import { createI18n } from 'vue-i18n'

import formControlUpload  from './vue-sfc/form-control-upload.vue'
import formControlTaxonomy  from './vue-sfc/form-control-taxonomy.vue'
import textEditor  from './vue-sfc/form-control-text-editor.vue'
import buttonSubmit  from './vue-sfc/button-submit.vue'

import fileManager  from './vue-sfc/file-manager.vue'

import common_en from './lang/en/common.js'
import common_ja from './lang/ja/common.js'

let modalFileManager_Modal = $('#file-manager-modal');


document.querySelectorAll('.vue-form').forEach(element => {
    const app = createApp({
        data(){
            return {

            }
        },
        mounted() {
            
        },
        methods: {
            openUploadSelect (comp) {
                modalFileManager_Modal.modal('show');
                modalFileManager.uploadGetter = comp
            }
        },
        components: {
            formControlUpload,
            formControlTaxonomy,
            buttonSubmit,
            textEditor
        }
    })

    app.use(createI18n({
      locale: document.documentElement.lang,
      fallbackLocale: 'en',
      messages: {
        en: common_en,
        ja: common_ja
      }
    }))

    app.mount(element)
})



const modalFileManager = (function(){
    const app = createApp({
        data() {
            return {            
               uploadGetter: null
            }
        },
        mounted() {
            let vm = this

            let fileManagerComponent = this.$refs.fileManager
            if (!fileManager) return

            modalFileManager_Modal.on('shown.bs.modal', function() {
                if (!fileManagerComponent.loaded) {
                    fileManagerComponent.loadDataFirstTime();                    
                }    
            });

            modalFileManager_Modal.on('hide.bs.modal', function() {
                fileManagerComponent.unselectedFiles();
                vm.uploadGetter = null;
            });

            modalFileManager_Modal.find('[data-action="add-selected-items"]').click(function(){
                let uploadGetter = vm.uploadGetter
                if (uploadGetter) {
                    let items = fileManagerComponent.getSelectedFiles();
                    uploadGetter.getUploadItems(items);
                    vm.uploadGetter = null;
                }
                fileManagerComponent.unselectedFiles();
                modalFileManager_Modal.modal('hide')
            });

        },
        methods: {
            onSelectedFilesChange () {
                let fileManagerComponent = this.$refs.fileManager
                if (fileManagerComponent.getSelectedFiles().length > 0) {
                    modalFileManager_Modal.find('[data-action="add-selected-items"]').show();
                } else {
                    modalFileManager_Modal.find('[data-action="add-selected-items"]').hide();
                }
            }
        },
        components: {
            fileManager
        } 
    });

   
    app.use(createI18n({
      locale: document.documentElement.lang,
      fallbackLocale: 'en',
      messages: {
        en: common_en,
        ja: common_ja
      }
    }))

    return app
})().mount('#file-manager-modal');


const fileLibrary = (function(){
    const app = createApp({
        data() {
            return {            
               uploadGetter: null
            }
        },        
        components: {
            fileManager
        } 
    });

   
    app.use(createI18n({
      locale: document.documentElement.lang,
      fallbackLocale: 'en',
      messages: {
        en: common_en,
        ja: common_ja
      }
    }))

    return app
})().mount('#file-library');