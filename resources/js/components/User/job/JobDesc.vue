<template>
    <div class="row">
        <div class="col-12 col-md-6 d-flex flex-column">
            <p>DeadLine : {{job.deadline}}</p>
            <h4>Description</h4>
            <p>{{job.description}}</p>
        </div>
        <div class="col-12 col-md-6 d-flex flex-column">
            <p>{{job.title}} - {{job.type}}</p>
            <h4>Compétences</h4>
            <p>{{job.skills_needed}}</p>
        </div>
    </div>
</template>
<script>
export default {
    props:['job']
    }
</script>
<style scoped lang="scss">

</style>