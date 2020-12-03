<template>
    <div class="Admin-layout">
        <dashboardadmin></dashboardadmin>
        <div class="AdminContent">
            <slot></slot>
        </div>
    </div>
</template>
<script>
    export default {
        mounted() {
            console.log('Component mounted. nav')
        }
    }
</script>
<style scoped lang="scss">
    .Admin-layout{
        width:100%;
        height:100vh;
        display:flex;
        flex-direction:row;
        justify-content: flex-start;
        margin: 0;
        padding: 0;
    }
    .AdminContent{
        width:100%;
        padding-left: 20px;
        padding-right: 20px;
        padding-top:10px;
        background-color:#ecf0f5;
        
    }
</style>