<template>
    <div class="border-bottom border-dark col-md-6 offset-md-3">
        <h4>{{report.title}}</h4>
        <p>{{report.content}}</p>
        <p>{{getDate(report.created_at)}}</p>
    </div>
    
</template>

<script>

export default {
    props:['report'],
    mounted() {
        console.log("Component mounted.table");
    },
    methods : {
        getDate : function(date){
            let correctDate = new Date(date);
            correctDate = correctDate.getDate()+'.'+(correctDate.getMonth()+1)+'.'+correctDate.getFullYear();
            console.log(correctDate);
            return correctDate;
        }
    }
    
};
</script>
<style scoped lang="scss">
//changer le chemin selon la position du component
@import "../../../sass/variables";
</style>
