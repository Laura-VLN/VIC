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
                    <th>Coachs</th>
                    <th>Parrains</th>
                </tr>
                <tr v-for="(user, i) in users" v-bind:key="i">
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
                    <td>
                        <div v-for="(coach, index) in getCoachs(user.id)" v-bind:key="index"><a v-bind:href="'/admin/user/edit/'+coach.coach_id">{{ returnCoachById(coach.coach_id) }}</a></div>
                    </td>
                    <td>
                        <div v-for="(sponsor, index) in getSponsors(user.id)" v-bind:key="index"><a v-bind:href="'/admin/user/edit/'+sponsor.sponsor_id">{{ returnSponsorById(sponsor.sponsor_id) }}</a></div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</template>
<script>
    export default {
        props:['users','coaches_users','sponsors_users','coachs','sponsors'],
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            getCoachs: function(uid){
                this.currentUser = uid;
                return this.coaches_users.filter(this.checkCoach);
            },
            checkCoach(coach) {
                return coach.user_id == this.currentUser;
            },
            getSponsors: function(uid){
                this.currentUser = uid;
                return this.sponsors_users.filter(this.checkSponsor);
            },
            checkSponsor(sponsor) {
                return sponsor.user_id == this.currentUser;
            },
            returnCoachById(cid){
                let coach = this.coachs.find(elem => elem.id == cid);
                return coach.first_name + " " + coach.last_name;
            },
            returnSponsorById(sid){
                let sponsor = this.sponsors.find(elem => elem.id == sid);
                return sponsor.first_name + " " + sponsor.last_name;
            }
        },
    }
</script>
<style scoped lang="scss">
@import "../../../../sass/app.scss";
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
            color:$violet;
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