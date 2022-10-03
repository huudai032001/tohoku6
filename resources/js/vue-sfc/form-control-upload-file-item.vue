<script>
    export default {
        data() {
            return {
                
            }
        },
        props: {
            inputName: String,
            fileInfo: Object,
            index: Number
        },
        methods: {

        }
    }
</script>

<template>
    <div class="file-item">  
        <input type="hidden" :name="inputName" :value="fileInfo.id">          
        <div class="card file-item-panel">
            <div class="card-img-actions mx-1 mt-1">
                <div
                    class="file-item-image-holder embed-responsive embed-responsive-1by1 d-flex align-items-center justify-content-center">
                    <img class="file-item-image card-img embed-responsive-item"
                        :src="fileInfo.thumbnail">
                </div>                    
            </div>

            <div class="d-block p-1 item-body">
                <div class="d-flex align-items-start flex-nowrap">
                    <div class="file-name font-weight-semibold mr-2">{{fileInfo.name}}</div>        
                    <div class="ml-auto">
                        <span class="item-check-sign icon-cancel-square2 text-danger item-remove-button" @click="$emit('remove')"></span>
                    </div>
                </div>                        
            </div>
        </div>
    </div>
</template>
