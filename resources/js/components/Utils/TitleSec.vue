<template>
    <div v-bind:class="'ml-5 mt-3 mb-3 d-flex flex-row title '+theme">
        <h4><slot></slot></h4><div class="ml-3 mr-5 d-flex"></div>
    </div>
</template>
<script>
export default {
    props:['theme']
    }
</script>
<style scoped lang="scss">
@import '../../../sass/variables';
.title{
    div{
        border-bottom:1.5px solid black;
        height:22px;
        flex:1;
    }
    h4{
        font-weight:bolder;
    }
}
.job{
    color:$orange;
}
.logement{
    color:$violet;
}
.sponsor{
    color:$turquoise;
}
.coach{
    color:$bleu;
}
.formation{
    color:$green;
}
</style>