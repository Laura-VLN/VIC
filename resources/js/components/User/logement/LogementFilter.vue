<template>
    <div class="container custom-form">
        <h4>Filtrer</h4>
        <form action="/logement/1" method="post">
            <select class="form-control" name="type" id="">
                <option value="appart">Appartement</option>
                <option value="maison">Maison</option>
                <option value="aucun" selected>Type de logement</option>
            </select><br>
            <select class="form-control" name="proximity" id="">
                <option value="brx">Bruxelles</option>
                <option value="nmr">Namur</option>
                <option value="lge">Liège</option>
                <option value="crl">Charleroi</option>
                <option value="aucun" selected>Lieu</option>
            </select><br>
            
            <input type="hidden" name="_token" :value="csrf">
            <input class="btn" type="submit" value="C'est parti">
        </form>
    </div>
</template>
<script>
export default {
    props:['csrf']
}
</script>
<style scoped lang="scss">
@import '../../../../sass/variables';
.custom-form{
    *{border-radius:0;}
    .form-control{
        border: 2px solid $violet;
    }
    .btn{
        border: 2px solid white;
        background-color: $violet;
        color:white;
        height: 28px;
        &:hover{
            border: 2px solid $violet;
            background-color: white;
            color:black;
        }
    }
    select {
    font: inherit;
    /* reset */
    margin: 0;      
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    -webkit-appearance: none;
    -moz-appearance: none;
    }


/* arrows */

    select{
    background-image:
        linear-gradient(45deg, transparent 50%, white 50%),
        linear-gradient(135deg, white 50%, transparent 50%),
        linear-gradient(to right, $violet, $violet);
    background-position:
        calc(100% - 15px) calc(1em),
        calc(100% - 10px) calc(1em),
        101% 0px;
    background-size:
        5px 5px,
        5px 5px,
        2.5em 2.5em;
    background-repeat: no-repeat; 
    }
}
</style>