<template>
    <div class="formationlist">
        <div>
            <h3>Liste des logements</h3>
            <a href="/admin/logement/create"><i class="fas fa-plus"></i> Ajouter un logement</a>
        </div>
        <div class="scollertable">
            <table>
                <tr>
                    <th>Action</th>
                    <th>Id</th>
                    <th>Adresse</th>
                    <th>Surface</th>
                    <th>Type</th>
                    <th>Prix</th>
                    <th>Disponibilité</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                </tr>
                <tr v-for="logement in logements">
                    <td style="width:200px;"><a v-bind:href="'/admin/logement/edit/'+logement.id">Modifier</a><a v-bind:href="'/admin/logement/delete/'+logement.id">Supprimer</a></td>
                    <td>{{logement.id}}</td>
                    <td>{{logement.location}}</td>
                    <td>{{logement.area}}</td>
                    <td>{{logement.type}}</td>
                    <td>{{logement.price}}</td>
                    <td>{{logement.availability}}</td>
                    <td>{{logement.email}}</td>
                    <td>{{logement.phone}}</td>
                </tr>
            </table>
        </div>
    </div>
</template>
<script>
    export default {
        props:['logements'],
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