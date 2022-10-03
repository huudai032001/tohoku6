<script>	
	export default {
		data() {
            return {
               editor: null
            }
        },
        props: [
            
		],
        inheritAttrs: false,
		mounted() {
            let useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches
            let isSmallScreen = window.matchMedia('(max-width: 1023.5px)')
            
            tinymce.init({                
                plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap emoticons autoresize',
                editimage_cors_hosts: ['picsum.photos'],
                menubar: 'edit insert format tools table help',
                toolbar: 'undo redo | bold italic underline strikethrough | forecolor backcolor | fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | pagebreak | charmap emoticons  | insertfile image media link anchor codesample | ltr rtl',
                toolbar_sticky: true,
                toolbar_sticky_offset: isSmallScreen ? 102 : 108,
                autosave_ask_before_unload: true,
                autosave_interval: '30s',
                autosave_prefix: '{path}{query}-{id}-',
                autosave_restore_when_empty: false,
                autosave_retention: '2m',
                image_advtab: true,

                importcss_append: true,

                template_cdate_format: '[Date Created (CDATE): %Y/%m/%d : %H:%M:%S]',
                template_mdate_format: '[Date Modified (MDATE): %Y/%m/%d : %H:%M:%S]',
                height: 600,
                //min_height: 500,
                max_height: 800,
                image_caption: true,
                quickbars_selection_toolbar: '',
                noneditable_class: 'mceNonEditable',
                toolbar_mode: 'sliding',
                contextmenu: 'link image table',
                skin: useDarkMode ? 'oxide-dark' : 'oxide',
                content_css: useDarkMode ? 'dark' : 'default',
                content_style: `
                    body { 
                        font-family:Helvetica,Arial,sans-serif;
                        font-size:100%;                     
                    }
                    figure, img {
                        max-width: 100%;
                    }
                    `,
                font_size_formats: '50% 60% 70% 80% 90% 100% 110% 120% 130% 140% 150% 160% 170% 180% 190% 200% 220% 240% 260% 280% 320% 360% 420% 480%',
                branding: false, // remove tiny copyright logo
                promotion: false, // remove upgrade promotion,
                language: document.documentElement.lang,
                target: this.$refs.textarea,
                convert_urls: false, // disable tinymce to auto convert link and image url,

            }).then((value) => {
                this.editor = value[0]
            });
           
		},
        methods: {    
			addUpload() {
				this.$emit('add-upload', this)
			},
            getUploadItems(items) {
                items.forEach(item => {
                    let id = item.id
                    let url = item.url
                    let alt = item.name
                    let version = 'full'
                    this.editor.insertContent(`
                        <figure data-upload-id="${id}" data-version="${version}">
                            <img src="${url}" alt="${alt}">
                        </figure>
                    `)  
                })
                             
            }
        },
		components: {
			
		}
	}
</script>

<template>
    <div class="d-flex justify-content-end mb-1">
        <span class="btn btn-primary btn-sm" @click="addUpload">
            <i class="icon-images2"></i> {{ $t('insert_media') }}
        </span>
    </div>
	<textarea ref="textarea" v-bind="$attrs">
		dddddddd
	</textarea>
</template>

