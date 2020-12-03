<template>
    <div class="form-group row">
        <label for="topic" class="col-md-2 col-form-label text-md-right">{{label}}</label>
        <div class="col-md-6">
        <input @input='setvalue' id="user" type="text" ref="input" list="browsers" required  :class="'form-control'+ error">
            <datalist id="browsers">
                <option v-for="user in users">{{user.name}}</option>
            </datalist>
        <input type="hidden" ref="target" name="user_id" >
        </div>
    </div>
</template>

<script>
    export default {
        props:['label','users','id','error'],
        methods:{
            setvalue : function(){
                this.$refs.target.value = this.$refs.input.value;
                let index = this._props.users.find(element=>element.name == this.$refs.input.value);
                console.log(typeof(index));
                if(typeof(index) == "undefined"){
                    this.$refs.target.value = null;
                }else{
                    this.$refs.target.value = index.id;
                }
                
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style scoped lang="scss">
//changer le chemin selon la position du component
@import '../../../../sass/variables';
</style>
