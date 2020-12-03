<template>
    <div class="form-group row">
                <label v-bind:for="id" class="col-md-2 col-form-label text-md-right">{{label}}</label>
                <div class="col-md-6">
                    <select v-if="required == 'true'" @input='colorChange' ref="input" v-bind:id="id" v-bind:class="'form-control'+ error" v-bind:name="id" required v-bind:autocomplete="id">
                        <slot></slot>
                    </select>
                    <select v-if="required == 'false'" @input='colorChange' ref="input" v-bind:id="id" v-bind:class="'form-control'+ error" v-bind:name="id"  v-bind:autocomplete="id">
                        <slot></slot>
                    </select>
                    <slot name="error"></slot>
                </div>
            </div>
</template>
<script>
    export default {
        props:['id','label','error','required','value'],
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            colorChange : function(){
                if(this.$refs.input.value != this._props.value){
                    this.$refs.input.style.border =  '1px solid blue';
                }else{
                    this.$refs.input.style.border =  '1px solid lightgrey';
                }
            }
        }
    }
</script>