<script>
	import fileItem from './form-control-upload-file-item.vue'
	import draggable from 'vuedraggable'

	export default {
		data() {
            return {
                items: this.initialItems
            }
        },
        props: [
            'inputName',
            'multiple',
            'fileType',
            'max',
            'initialItems'
		],
		mounted() {
			
		},
        methods: {    
			addUpload() {
				this.$emit('add-upload', this)
			},
            removeItem(index) {                
                this.items.splice(index, 1);
            },
			getUploadItems(items) {
				if (items.length < 1) return
				if(this.multiple) {
					items.forEach(item => {
						if (!this.max || this.items.length < this.max) {
							this.items.push(item);
						}
					});
				} else {
					this.items.splice(0, this.items.length)
					this.items.push(items[0]);
				}				
			}
        },
		components: {
			fileItem,
			draggable
		}
	}
</script>

<template>
	<div class="form-control-upload" :data-multiple="multiple ? 'true' : 'false'">
		<draggable class="items-wrap"
			v-model="items"				
			item-key="id">
			<template #item="{element, index}">
				<file-item :file-info="element" :input-name="inputName"
				@remove="removeItem(index)" :key="element.id"></file-item>
			</template>
		</draggable>
		
		<div class="">
			<button type="button" class="btn btn-primary add-file-item-button"
				@click="addUpload">
				<template v-if="multiple || this.items.length < 1">
					{{ $t('add') }}
				</template>
				<template v-else>
					{{ $t('change') }}
				</template>
			</button>
			<template v-if="multiple && max">
				{{ $t('max') }}: {{ max }}
			</template>
		</div>
	</div>
</template>