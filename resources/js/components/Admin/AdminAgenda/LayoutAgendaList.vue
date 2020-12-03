<template>
    <div class="agendalist">
        <div>
            <h3>Liste des agendas</h3>
            <a href="/admin/agenda/create"><i class="fas fa-plus"></i> Ajouter un rendez-vous</a>
        </div>
        <div class="scollertable">
            <table>
                <tr>
                    <th>Action</th>
                    <th>Id</th>
                    <th>Titre</th>
                    <th>Adresse</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Jeune</th>
                    <th>Parrain/Coach</th>
                </tr>
                <tr v-for="agenda in agendas">
                    <td style="width:200px;"><a v-bind:href="'/admin/agenda/edit/'+agenda.id">Modifier</a><a v-bind:href="'/admin/agenda/delete/'+agenda.id">Supprimer</a></td>
                    <td>{{agenda.id}}</td>
                    <td>{{agenda.title}}</td>
                    <td>{{agenda.location}}</td>
                    <td>{{agenda.time}}</td>
                    <td>{{agenda.hour}}</td>
                    <td>{{agenda.user_id}}</td>
                    <td>{{agenda.follower_id}}</td>
                </tr>
            </table>
        </div>
    </div>
</template>
<script>
    export default {
        props:['agendas'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style scoped lang="scss">
.agendalist{
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