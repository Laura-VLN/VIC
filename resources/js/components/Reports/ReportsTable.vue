<template>
    <div class="container">
        <table>
            <th>test</th>
        </table>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log("Component mounted.table");
    },
};
</script>
<style scoped lang="scss">
//changer le chemin selon la position du component
@import "../../../sass/variables";
</style>
