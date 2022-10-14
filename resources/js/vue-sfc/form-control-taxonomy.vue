<script>
    import hierachyItem from './form-control-tanonomy-hirachy-item.vue'	

	export default {
		data() {
            return {
                inputType: '',
                termList: [],
                showOptions: false,
                firstLoaded: false,
                state: 'idle',
                selectedTerms: [],
                //primaryTerm: null
            }
        },
        props: [
            'initialSelectedTerms',
            //'initial//',
            'inputName',
            'hierachy',
            'modelClass',
		],
        inheritAttrs: false,
		mounted() {
            
            if (this.initialSelectedTerms) {
                this.selectedTerms = this.initialSelectedTerms
            }
            // if (this.hierachy) {
            //     this.// = this.initial//
            // }
        
		},
        methods: {    
			toggleOptions() {
                this.showOptions = !this.showOptions
                if(!this.firstLoaded) {
                    this.fetchData()
                }
                this.firstLoaded = true
            },
            async fetchData() {
                this.state = 'fetching'
                let el = this;  

                await $.ajax({
                    url: '/admin/ajax/taxonomy/fetch',
                    method: 'get',
                    data: {
                        model_class: el.modelClass
                    },
                    success: function (response) {
                        el.termList = response.data
                    },
                    
                });
                this.state = 'idle'
            },
            selectTerm(term) {
                if (this.hasSelectedTerm(term)) {
                    this.selectedTerms = this.selectedTerms.filter(item => {
                        return item.id != term.id
                    })
                } else {
                    this.selectedTerms.push({
                        id: term.id,
                        name: term.name
                    })
                    //console.log('select item  ' + term.id)
                }
                
            },
            hasSelectedTerm(term) {
                return this.selectedTerms.some(item => {
                    return item.id == term.id 
                })
            }
        },
        computed: {
            showingTerms() {
                return this.termList
            }
        },
		components: {
			hierachyItem
		}
	}
</script>

<template>
    <div class="form-control-taxonomy">        
        <div class="showing-part" @click="toggleOptions">
            <div class="selected-items">
                <div class="selected-item" v-for="(term, index) in selectedTerms" @click.stop="">
                    <input type="hidden" :name="inputName" :value="term.id">
                    {{ term.hierachy_name ? term.hierachy_name : term.name  }}<span class="selected-item_remove" @click="selectedTerms.splice(index, 1)">×</span>
                </div>
                
            </div>
            <div class="toggle-button">
                <i class="icon-arrow-down32"></i>
            </div>
        </div>   
        
        <div class="toggle-part" v-show="showOptions">

            <div class="taxonomy-search-box">
                <div class="form-group-feedback form-group-feedback-right">
                    <input type="text" class="form-control" placeholder="Search ...">
                    <div class="form-control-feedback">
                        <i class="icon-search4"></i>
                    </div>
                </div>
            </div>

            <template v-if="state == 'fetching'">
                <div class="fetching-notice">
                    <i class="icon-spinner2 spinner mr-2"></i> {{ $t('message.loading') }}
                </div>
            </template>

            <div class="taxonomy-term-list" :data-display="hierachy ? 'list' : 'grid'">
                <template v-if="hierachy">
                    <hierachy-item v-for="(term, index) in showingTerms" :term="term" @select="selectTerm" :selected="hasSelectedTerm(term)" :selected-terms="selectedTerms"></hierachy-item>
                </template>
                <template v-else>
                    <div class="item" v-for="(term, index) in showingTerms" @click="selectTerm(term)" :class="{ 'selected': hasSelectedTerm(term) }">
                        <div class="item-control">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" :checked="selected">
                                <span class="custom-control-label">{{ term.name }}</span>
                            </div>                             
                        </div>                        
                    </div>    
                </template>            
            </div>           
            
        </div>
    </div>
</template>

