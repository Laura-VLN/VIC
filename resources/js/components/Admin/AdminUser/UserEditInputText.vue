<template>
    <div class="form-group row">
        <label v-bind:for="id" class="col-md-2 col-form-label text-md-right">{{label}}</label>
        <div class="col-md-6">
            <input @input='colorChange' ref="input" v-if="required == 'true' " v-bind:id="id" v-bind:type="type" v-bind:class="'form-control '+ error" v-bind:name="id" v-bind:value="value" required v-bind:autocomplete="id" autofocus>
            <input @input='colorChange' ref="input" v-if="required == 'false'" v-bind:id="id" v-bind:type="type" v-bind:class="'form-control '+ error" v-bind:name="id" v-bind:value="value"  v-bind:autocomplete="id" autofocus>
            <slot></slot>
        </div>
    </div>
</template>
<script>
    export default {
        props:['id','value','label','error','type','required'],
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