<template>
        <ul class="customList">
            <li><i class="fas fa-phone"></i> {{logement.phone}}</li>
            <li><i class="fas fa-envelope"></i> {{logement.email}}</li>
            <li><i class="fas fa-home"></i> {{logement.location}}</li>
        </ul>
</template>

<script>
    export default {
        props:['logement'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style scoped lang="scss">
//changer le chemin selon la position du component
@import '../../../../sass/variables';
.customList{
    padding-left:0;
    li{
        list-style-type:none;
        padding-bottom:20px;
        i{
            padding-right:10px;
        }
    }
}
</style>
