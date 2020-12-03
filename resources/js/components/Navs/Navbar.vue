<template>
    <nav class="navbar navbar-expand-md navbar-dark shadow-sm mx-0 navbar-custom">
            <div class="container-fluid d-flex flex-row">
                <div class="fix-flex-navbar"></div>
                <div class="navbar-title fix-flex-navbar mr-auto">
                    <a class="navbar-brand font-weight-bold mx-0" v-bind:href="home">
                        <span class="text-success">SRPE</span> - DASHBOARD
                    </a>
                </div>
                <div class="navbar-dropdown fix-flex-navbar ml-auto d-flex justify-content-end">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" v-bind:aria-label="toggle">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <slot></slot>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
</template>

<script>
    export default {
        props: ["title","toggle","home"],
        mounted() {
            console.log('Component mounted.')
        }
    } 
</script>

<style scoped lang="scss">
.navbar-custom{
    position:fixed;
    width:100%;
    z-index:999;
    background-color:#21202C;
}
.fix-flex-navbar{
    flex:1;
    display: flex;
    justify-content: center;
}
</style>
