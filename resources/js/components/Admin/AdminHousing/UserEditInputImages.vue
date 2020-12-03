<template>
    <div class="form-group row">
        <label v-bind:for="id" class="col-md-2 col-form-label text-md-right mt-2">{{label}}</label>
        <div class="col-md-6">
            <div class="d-flex">
                <input type="file" name="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Choisir une image</label>
            </div>
            <div class="d-flex flex-row row imgbox">
                <div v-for="image in images" class="col-md-3">
                    <form method="POST" class="formbox" v-bind:action="'/admin/logement/delimg/'+image.id">
                        <img class="img-fluid" v-bind:src="asset + image.img_link" alt="photo de logement">
                        <input type="hidden" name="id" v-bind:value="id">
                        <input type="hidden" name="_token" :value="csrf">
                        <button type="submit"><i class="fas fa-times"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props:['id','images','label','asset','csrf'],
        mounted() {
            console.log('Component mounted. nav');
        }
    }
</script>
<style scoped lang="scss">
.imgbox{
    border:1px solid lightgray;
    border-radius:4px;
    margin-left: 0px;
    padding: 15px 0px;
    margin-top:30px;
    display:block;
    position:relative;
    
}
.formbox{
    &:hover{
        button{
            opacity: 1;
        }
    }
    button{
        display:block;
        opacity:0;
        position:absolute;
        top: 0px;
        right: 5px;
        background-color: #ffffff00;
        border:none;
        color:red;
        transition-duration: 0.2s;
    }
}
.custom-file-label{
    margin-left:15px;
    margin-top:10px;
}
</style>