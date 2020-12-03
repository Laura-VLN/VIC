<template>
    <div class="userlist">
        <div>
            <h3>Liste des utilisateurs</h3>
            <a href="/admin/user/create"><i class="fas fa-plus"></i> Créer un utilisateur</a>
        </div>
        <div class="scollertable">
            <table>
                <tr>
                    <th>Action</th>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Adresse</th>
                    <th>Grade</th>
                    <th>Coach</th>
                    <th>Parrain</th>
                </tr>
                <tr v-for="user in users">
                    <td style="width:200px;"><a v-bind:href="'/admin/user/edit/'+user.id">Modifier</a><a v-bind:href="'/admin/user/delete/'+user.id">Supprimer</a></td>
                    <td>{{user.id}}</td>
                    <td>{{user.first_name}}</td>
                    <td>{{user.last_name}}</td>
                    <td>{{user.email}}</td>
                    <td>{{user.location}}</td>
                    <td v-if="user.role == 3">Admin</td>
                    <td v-if="user.role == 2">Parrain</td>
                    <td v-if="user.role == 1">Coach</td>
                    <td v-if="user.role == 0">Utilisateur</td>
                    <td><a v-bind:href="'/admin/user/edit/'+user.coach_id" v-if="user.coach_id != null">Profile</a></td>
                    <td><a v-bind:href="'/admin/user/edit/'+user.sponsor_id" v-if="user.sponsor_id != null">Profile</a></td>
                </tr>
            </table>
        </div>
    </div>
</template>
<script>
    export default {
        props:['users'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style scoped lang="scss">
.userlist{
    overflow-y:scroll;
    max-height:90%;
    border-top:2px solid #e4e6ec;
    width:100%;
    background-color:white;
    div{
        display:flex;
        flex-direction:row;
        justify-content: space-between;
        h3{
            padding:10px 10px;
        }
        a{
            margin-top:auto;
            margin-bottom:auto;
            padding-right:20px;
            color:grey;
            text-decoration:none;
            &:hover{
                color:blue;
            }
        }
    }
    .scollertable{
        width:100%;
        table{
            height:100%;
            width:100%;
            border-collapse: collapse;
            tr{
                border-top: 1px solid #e4e6ec;
                width:100%;
                background-color:white;
                th{
                    padding:5px 10px;
                    border-right: 1px solid #e4e6ec;
                    &:last-child{
                        border-right:none;
                    }
                }
                td{
                    padding:5px 10px;
                    border-right: 1px solid #e4e6ec;
                    &:last-child{
                        border-right:none;
                    }
                    a{
                        color:grey;
                        text-decoration:none;
                        &:hover{
                            color:blue;
                        }
                    }
                }
            }
        }
    }
    
    
}
</style>