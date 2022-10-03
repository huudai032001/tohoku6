<script>
export default {
    data() {
        return {

        }
    },
    props: [
        'fileInfo'
    ],
    methods: {

    }
}
</script>


<template lang="">
    <div class="file-item" :class="{'item-selected': fileInfo.selected}">
        <div class="card file-item-panel m-0">
            <div class="card-img-actions mx-1 mt-1" @click="$emit('toggle-select')">
                <div
                    class="file-item-image-holder embed-responsive embed-responsive-1by1 d-flex align-items-center justify-content-center">
                    <img class="file-item-image card-img embed-responsive-item"
                        :src="fileInfo.thumbnail">
                </div>                    
            </div>

            <div class="d-block p-1 item-body">
                <div class="d-flex align-items-start flex-nowrap">
                    <div class="file-name font-weight-semibold mr-2">{{ fileInfo.name }}</div>                
                    <div class="ml-auto">
                        <span class="item-check-sign" @click="$emit('toggle-select')" :class="[fileInfo.selected ? 'icon-checkbox-checked' : 'icon-checkbox-unchecked']"></span>                            
                    </div>
                </div>
                <div class="file-item-info">
                    <span class="font-size-sm text-muted info-size">{{fileInfo.extension}}</span>  
                    <span class="font-size-sm text-muted info-size">{{fileInfo.file_size}}</span>
                </div>
            </div>
        </div>
    </div>
</template>