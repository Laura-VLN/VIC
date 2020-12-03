<template>
    <div class="formationlist">
        <div>
            <h3>Liste des formations</h3>
            <a href="/admin/formation/create"><i class="fas fa-plus"></i> Ajouter une formation</a>
        </div>
        <div class="scollertable">
            <table>
                <tr>
                    <th>Action</th>
                    <th>Id</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Adresse</th>
                    <th>Date</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                </tr>
                <tr v-for="formation in formations">
                    <td style="width:200px;"><a v-bind:href="'/admin/formation/edit/'+formation.id">Modifier</a><a v-bind:href="'/admin/formation/delete/'+formation.id">Supprimer</a></td>
                    <td>{{formation.id}}</td>
                    <td>{{formation.title}}</td>
                    <td>{{formation.description}}</td>
                    <td>{{formation.location}}</td>
                    <td>{{formation.time}}</td>
                    <td>{{formation.email}}</td>
                    <td>{{formation.phone}}</td>
                </tr>
            </table>
        </div>
    </div>
</template>
<script>
    export default {
        props:['formations'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style scoped lang="scss">
.formationlist{
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