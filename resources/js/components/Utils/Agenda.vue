<template>
    <div class="d-flex flex-column w-100 ">
        <div v-bind:class="'d-flex flex-row my-2 custom-agenda '+agend.topic" v-for="agend in agenda">
            <div class="d-flex flex-column my-auto left-parts">
                <strong class="date">{{getTime(agend.time)}}</strong>    
                <span class="time">{{getHours(agend.hour)}}</span>
            </div>
            <div class="d-flex flex-column text-left pl-4 right-parts">
                <strong class="title">{{agend.title.charAt(0).toUpperCase() + agend.title.slice(1)}}</strong>
                <span class="descripriton">{{agend.title}}</span>
                <span class="location"><i class="fas fa-map-marker-alt"></i> {{agend.location}}</span>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props:['agenda'],
        mounted() {
            console.log('Component mounted. nav')
        },
        methods: {
            getTime (date){
                let d = new Date(date);
                return d.getDate()+"|"+(d.getMonth()+1);
            },
            getHours(time){
                let t = time.toString().split(':');
                return t[0]+" : "+t[1];
            }
        }
    }
</script>
<style scoped lang="scss">
@import "../../../sass/app.scss";
.left-parts{
    width:auto;
    padding: 0px 20px;
}
.right-parts{
    width:auto;
    padding: 0px;
}
.custom-agenda{
    padding: 0px 30px;
}
.date{
    font-size: 1.5rem;
}
.time{
    padding-left:2px;
}
.coach{
    .right-parts{
            border-left: 2px solid $bleu;
    }
    .title,i,.date{
        color: $bleu;
    }
}
.logement{
    .right-parts{
        border-left: 2px solid $violet;
    }
    .title,i,.date{
        color: $violet;
    }
}
.sponsor{
    .right-parts{
        border-left: 2px solid $turquoise;
    }
    .title,i,.date{
        color: $turquoise;
    }
}
.job{
    .right-parts{
        border-left: 2px solid $orange;
    }
    .title,i,.date{
        color: $orange;
    }
}
.formation{
    .right-parts{
        border-left: 2px solid $green;
    }
    .title,i,.date{
        color: $green;
    }
}
</style>