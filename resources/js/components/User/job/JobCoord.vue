<template>
    <div class="container">
        <p>{{job.company}}</p>
        <p>{{job.contact_people}}</p>
        <p>{{job.location}}</p>
    </div>
</template>
<script>
export default {
    props:['job']
}
</script>
<style scoped lang="scss">
</style>