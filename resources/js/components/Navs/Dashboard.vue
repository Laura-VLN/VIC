<template>
<nav class="navbar-custom">
    <ul class="navbar-nav nav-justified w-100 text-center mt-1" v-if="iscoach == '1'">
        <li class="Mon jeune"> 
            <a href="/young" class="nav-link d-flex flex-column">
                <i class="fas fa-child"></i>
                <span class="title-custom mt-1 text-light">Mes jeunes</span>
            </a>
        </li>
    </ul>
    <ul class="navbar-nav nav-justified w-100 text-center mt-1" v-else-if="connected == '1'">
        <li class="nav-item"> 
            <a href="/job/1" class="nav-link d-flex flex-column">
                <span class="fas fa-briefcase"></span>
                <span class="title-custom mt-1 text-light">Mon job</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="/logement/1" class="nav-link d-flex flex-column">
                <span class="fas fa-home"></span>
                <span class="title-custom mt-1 text-light">Mon logement</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="/parrain" class="nav-link d-flex flex-column">
                <span class="fas fa-handshake"></span>
                <span class="title-custom mt-1 text-light">Mes parrains</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="/coach" class="nav-link d-flex flex-column">
                <span class="fas fa-file-signature"></span>
                <span class="title-custom mt-1 text-light">Mes coachs</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="/formations/1" class="nav-link d-flex flex-column">
                <span class="fas fa-graduation-cap"></span>
                <span class="title-custom mt-1 text-light">Mes formations</span>
            </a>
        </li>
    </ul>
    <ul class="navbar-nav nav-justified w-100 text-center mt-1" v-else>
        <li class="nav-item">
            <a href="/" class="nav-link d-flex flex-column">
                <img src="../../../img/logovic.png" alt="" class="viclogo">
                <span class="title-custom mt-1 text-light">Accueil</span>
            </a>
        </li>
    </ul>
</nav>
</template>

<script>
    export default {
        props: ["connected","iscoach"],
        mounted() {
            //console.log(this._props.iscoach +" teste")

        }
    }
</script>

<style scoped lang="scss">
    @import "../../../sass/app.scss";
    .fa-briefcase{
        color:$orange;
    }
    .fa-home{
        color:$purple;
    }
    .fa-handshake{
        color:$turquoise;
    }
    .fa-file-signature{
        color:$bleu;
    }
    .fa-graduation-cap{
        color:$green;
    }
    .fa-child{
        color:$green;
    }
    .navbar-custom{
        background-color:$black;
        z-index:999;
        padding: 10px 10px;
        position:fixed;
        bottom:0;
        left:0;
        width:100%;
        ul{
            display:flex;
            flex-direction:row;
            width:100%;
            justify-content:space-between;
            li{
                margin-left:auto;
                margin-right:auto;
            }
            .fas{
                font-size: 30px;
            }
            .title-custom{
                display:none;
            }
        }
    }
    .viclogo{
        display:none;
    }
    
    @media (min-width: 768px) {
        .navbar-custom{
            position:relative;
            width:20%;
            height:100%;
            padding-top:50px;
            max-width: 200px;
            ul{
                height:100%;
                flex-direction:column;
                justify-content:space-around;
                li{
                    .fas{
                        font-size: 50px;
                    }
                    .title-custom{
                        display:block;
                    }
                }
            }
        }
        .viclogo{
        display:block;
        width:70%;
        margin:auto;
        height: auto;
        background: white;
        }
    }
    
</style>