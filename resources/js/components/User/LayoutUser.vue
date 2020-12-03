<template>
    <div class="user-layout">
        <dashboard v-bind:connected="connected" :iscoach="iscoach"></dashboard>
        <div class="user-content h-100">
            <slot></slot>
            <div class="fixNavBottom"></div>
        </div>
        
    </div>
</template>
<script>
    export default {
        props:['connected','iscoach'],
        mounted() {
            console.log('Component mounted. nav')
        }
    }
</script>
<style scoped lang="scss">
    .user-layout{
        width:100%;
        height:100vh;
        display:flex;
        flex-direction:row;
        justify-content: flex-start;
        margin: 0;
        padding: 0;
        
    }
    .user-content{
        flex-flow: column;
        display:relative;
        overflow-y:scroll;
        width:100%;
        padding-top:60px;
        //background-color:#ecf0f5;
        height:100%;
        overflow-x:hidden;
        &::-webkit-scrollbar {
            display:none;
        }
    }
    .fixNavBottom{
        width:100%;
        height:100px;
        display: block;
        background-color:#ecf0f5;
    }
    @media (min-width: 768px) {
        .fixNavBottom{
            display:none;
        }
    }
</style>