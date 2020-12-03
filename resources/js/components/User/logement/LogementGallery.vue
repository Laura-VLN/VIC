<template>
    <div class="container">
        <div id="carouselExampleControls"  class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item" v-for="picture in pictures" :ref="picture.id">
                <img class="d-block" :src="picture.img_link" alt="First slide">
            </div> 
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        props:['pictures'],
        mounted() {
            this.$refs[this._props.pictures[0].id][0].className += " active";
        }
    }
</script>
<style scoped lang="scss">
//changer le chemin selon la position du component
@import '../../../../sass/variables';
.carousel-item{
    height: 500px;
    
    background-color:lightgrey;
} 
.carousel-item img{
    height:500px;
    width:auto;
    margin-left:auto;
    margin-right:auto;
}
</style>
