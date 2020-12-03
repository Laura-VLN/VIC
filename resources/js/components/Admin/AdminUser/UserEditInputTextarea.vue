<template>
    <div class="form-group row">
        <label v-bind:for="id" class="col-md-2 col-form-label text-md-right">{{label}}</label>
        <div class="col-md-6">
            <textarea v-if="required == 'true'" @input='colorChange' ref="input" rows="10" cols="200" v-bind:id="id" type="text" v-bind:class="'form-control'+ error" v-bind:name="id" v-bind:autocomplete="id" required>{{value}}</textarea>
            <textarea v-if="required == 'false'" @input='colorChange' ref="input" rows="10" cols="200" v-bind:id="id" type="text" v-bind:class="'form-control'+ error" v-bind:name="id" v-bind:autocomplete="id">{{value}}</textarea>
            <slot></slot>
        </div>
    </div>
</template>
<script>
    export default {
        props:['id','value','label','error','required'],
        mounted() {
            console.log('Component mounted. nav');
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