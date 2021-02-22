<template>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown text-light">
            <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span><i class="text-success pt-1 pr-1 fas fa-user-circle"></i></span>{{fn}}  {{ln}} <span class="caret"></span>
            </a>
    
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/admin/user/list/1" v-if="role == 3">Panel admin</a>
                <a class="dropdown-item" href="/profile">Profil</a>
                <a class="dropdown-item" v-bind:href="lo">
                    {{lot}}
                </a>
            </div>
        </li>
        
    </ul>
</template>

<script>
    export default {
        props: ["fn","ln","lo","lot","role"],
        mounted() {
            //console.log(this._props);
        }
    }
</script>
