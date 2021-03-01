<template>
    <div class="container">
        <form
            v-bind:action="/report/ +youngid"
            method="post"
            class="row mx-2 my-5 text-left"
        >
            <label for="date" class="col-3 my-2">Date</label>
            <input
                type="date"
                name="time"
                id="date"
                class="col-9 my-2"
                required
            /><br />
            <label for="heure" class="col-3 my-2">Heure</label>
            <input
                type="time"
                name="hour"
                id="heure"
                class="col-9 my-2"
                required
            /><br />
            <label for="titre" class="col-3 my-2">Titre</label>
            <input
                type="text"
                name="title"
                id="titre"
                class="col-9 my-2"
                required
            /><br />
            <input type="hidden" name="dest" :value="youngid" />
            <label for="description" class="col-3 my-2">Description</label>
            <textarea
                name="description"
                id="description"
                cols="30"
                rows="10"
                class="col-9 my-2"
                required
            ></textarea
            ><br />
            <div class="col-3 my-2" maboy="true"></div>
            <input type="hidden" name="_token" :value="csrf" />
            <input
                class="col-9 btn btn-success my-2"
                type="submit"
                value="Enregistrer"
            />
        </form>
    </div>
</template>

<script>
export default {
    props: ["youngid", "csrf"],
    mounted() {
        console.log("Component mounted.");
    }
};
</script>
<style scoped lang="scss">
//changer le chemin selon la position du component
@import "../../../sass/variables";
</style>
