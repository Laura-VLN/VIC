<template>
    <nav class="navbar-admin">
        <ul class="navbar-nav w-100">
            <li class="nav-item">Panel Admin</li>
            <li class="nav-item"><a href="/admin/user/list/1" ><i class="fas fa-users mr-1"></i> Utilisateurs</a></li>
            <li class="nav-item"><a href="/admin/formation/list/1" ><i class="fas fa-graduation-cap mr-1"></i> Formations</a></li>
            <li class="nav-item"><a href="/admin/job/list/1" ><i class="fas fa-briefcase mr-1"></i> Job</a></li>
            <li class="nav-item"><a href="/admin/logement/list/1" ><i class="fas fa-home mr-1"></i> Logement</a></li>
            <li class="nav-item"><a href="/admin/agenda/list/1" ><i class="fas fa-calendar-alt mr-1"></i></i> Agenda</a></li>
            <a class="return-button" href="/">Retour Accueil</a> 
        </ul>
        
    </nav>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style scoped lang="scss">
    .navbar-admin{
            width:20%;
            height:100vh;
            max-width: 300px;
            background-color:#1a2226;
            ul{
                height:100%;
                flex-direction:column; 
                justify-content:start;
                li{
                    border-top:1px solid #474747;
                    padding-left:15px;
                    padding-top:10px;
                    padding-bottom:10px;
                    background-color:#222d32;
                    &:first-child{
                        color:white;
                        margin-bottom:50px;
                        padding-bottom:20px;
                        padding-top:15px;
                        font-size:20px;
                        border-bottom:1px solid #474747;
                    }
                    &:nth-child(6){
                        border-bottom:1px solid #474747;
                    }
                    a{
                        font-size: 15px;
                        color:white;
                        text-decoration:none;
                        &:hover{
                            color:lightgray;
                        }
                        i{
                            width:25px;
                        }
                    }
                }
                .return-button{
                    margin-top:auto;
                    margin-bottom:30px;
                    padding-left:15px;
                    color:white;
                    text-decoration:none;
                    background-color:#222d32;
                    width:100%;
                    padding-top:10px;
                    padding-bottom:10px;
                    border-top:1px solid #474747;
                    border-bottom:1px solid #474747;
                    &:hover{
                        color:lightgray;
                    }
                }
            }
    }
</style>