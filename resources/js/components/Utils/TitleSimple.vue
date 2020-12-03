<template>
    <div v-bind:class="'mt-3 mb-5 title '+theme">
        <h4><slot></slot></h4>
    </div>
</template>
<script>
export default {
    props:['theme']
    }
</script>
<style scoped lang="scss">
@import '../../../sass/variables';
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
h4{
        font-weight:bolder;
    }
</style>