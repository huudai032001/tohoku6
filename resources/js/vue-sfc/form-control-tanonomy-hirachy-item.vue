<script>	
	export default {
		data() {
            return {
                
            }
        },
        props: [
           'term' ,
           'selectedTerms',
		],
        inheritAttrs: false,
		mounted() {            
            
		},
        methods: {
            select() {               
                this.$emit('select', this.term)
            },
			onChildSelected(term) { 
                this.$emit('select', term)
            },
        },
		components: {
			
		},
        computed: {
            selected() {
                return this.selectedTerms.some(item => {
                    return item.id == this.term.id 
                })
            },
            
        }
	}
</script>

<template>
    <div class="item">
        <div class="item-control d-flex" @click="select" :class="{ 'selected': selected }">
            <div class="mr-auto">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" :checked="selected">
                    <span class="custom-control-label">{{ term.name }}</span>
                </div>            
            </div>
            <!-- <div class="ml-5">
                <div class="badge badge-light">Primary</div>
            </div> -->
        </div>
        <template v-if="term.children && term.children.length > 0">
            <div class="sub-items">
                <form-control-tanonomy-hirachy-item v-for="(child_term, index) in term.children" :term="child_term" :selected="false" :selected-terms="selectedTerms" @select="onChildSelected"></form-control-tanonomy-hirachy-item>
            </div>
        </template>
    </div>
</template>

