<template>
    <div class="customTable">
        <table class="table">
            <tr v-if="logement.type != null">
                <td>Type</td>
                <td v-if="logement.type == 'appart'">Appartement</td>
                <td v-if="logement.type == 'maison'">Maison</td>
            </tr>
            <tr v-if="logement.availability != null">
                <td>Disponibilité</td>
                <td>{{logement.availability}}</td>
            </tr>
            <tr v-if="logement.area != null">
                <td>Surface</td>
                <td>{{logement.area}} m²</td>
            </tr>
            <tr v-if="logement.location != null">
                <td>Adresse</td>
                <td>{{logement.location}}</td>
            </tr>
            <tr>
                <td>Description</td>
                <td>{{logement.description}}</td>
            </tr>
            <tr>
                <td>Prix</td>
                <td>{{logement.price}} €</td>
            </tr>
        </table>
    </div>
</template>

<script>
    export default {
        props:['logement'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style scoped lang="scss">
//changer le chemin selon la position du component
@import '../../../../sass/variables';
$borderwidth: 2px;
.customTable{
    margin-left:48px;
    margin-bottom:50px;
    margin-right:48px;
    table{
        width:100%;
        
        tr td:first-child{
            color:$violet;
            font-weight:bold;
            vertical-align:top;
            width:100px;
        }
        tr td:last-child{
            padding-left:20px;
            white-space: pre-line;
        }
        tr{
            border-bottom:$borderwidth solid $violet;
            border-left:$borderwidth solid $violet;
            border-right:$borderwidth solid $violet;
            &:first-child{
                border-top:$borderwidth solid $violet;
            }
        }
    }
}
</style>
