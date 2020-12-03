<template>
    <div class="joblist">
        <div>
            <h3>Liste des jobs</h3>
            <a href="/admin/job/create"><i class="fas fa-plus"></i> Ajouter un job</a>
        </div>
        <div class="scollertable">
            <table>
                <tr>
                    <th>Action</th>
                    <th>Id</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Adresse</th>
                    <th>Date limite</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Entreprise</th>
                </tr>
                <tr v-for="job in jobs">
                    <td style="width:200px;"><a v-bind:href="'/admin/job/edit/'+job.id">Modifier</a><a v-bind:href="'/admin/job/delete/'+job.id">Supprimer</a></td>
                    <td>{{job.id}}</td>
                    <td>{{job.title}}</td>
                    <td>{{job.description}}</td>
                    <td>{{job.location}}</td>
                    <td>{{job.time}}</td>
                    <td>{{job.email}}</td>
                    <td>{{job.type}}</td>
                    <td>{{job.company}}</td>
                </tr>
            </table>
        </div>
    </div>
</template>
<script>
    export default {
        props:['jobs'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style scoped lang="scss">
.joblist{
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