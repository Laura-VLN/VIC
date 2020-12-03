<template>
    <div class="container">
        <table class="table">
            <tr>
                <td>Titre</td>
                <td>{{formation.title}}</td>
            </tr>
            <tr>
                <td>Description</td>
                <td>{{formation.description}}</td>
            </tr>
            <tr>
                <td>Date</td>
                <td>{{formation.time}}</td>
            </tr>
            <tr>
                <td>Adresse</td>
                <td>{{formation.location}}</td>
            </tr>
            <tr>
                <td>Téléphone</td>
                <td>{{formation.phone}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{formation.email}}</td>
            </tr>
        </table>
    </div>
</template>

<script>
    export default {
        props:['formation'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style scoped lang="scss">
//changer le chemin selon la position du component
@import '../../../../sass/variables';
.table{
    tr{
        border:none;
        td:first-child{
            font-weight:bolder;
            color:$green;
            width:150px;
        }
        td:last-child{
            white-space:pre-line;
        }
    }
}
</style>
