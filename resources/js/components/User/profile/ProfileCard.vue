<template>
    <div class="d-flex flex-row col-12 col-md-6 profile-card">
        <a v-bind:href="path+uid">
            <div class="mx-auto d-flex flex-row">
                <i v-bind:class="'fas fa-user '+theme"></i>
                <div class="d-flex flex-column justify-content-between informations">
                    <h5 v-bind:class="theme">{{user.first_name.charAt(0).toUpperCase() + user.first_name.slice(1)}} {{user.last_name.charAt(0).toUpperCase() + user.last_name.slice(1)}}</h5>
                    <ul v-if="user.role !== 0">
                        <li>{{user.birth_date}}</li>
                        <li>{{user.location}}</li>
                    </ul>
                    <p>{{user.email}}</p> 
                </div>
            </div>
        </a>
    </div>
</template>
<script>
    export default {
        props:['user', 'path', 'theme','uid'],
        mounted() {
            console.log('Component mounted. nav')
        }
    }
</script>
<style scoped lang="scss">
@import "../../../../sass/app.scss";

.profile-card{
    max-height:220px;
    padding:30px;
    
    i{
        display:block;
        font-size: 8rem;
        padding:15px;
        border: 2px solid black;
        box-shadow: -10px 10px black;
        transition: 0.3s;
    }
    .informations{
        width:100%;
        height:100%;
        padding:5px;
        padding-left:15px;
        margin-right:10px;
        ul{
            padding-left:0;
            li{
                list-style-type:none;
            }
        }
        h5{
            font-weight:bold;
            border-bottom:2px solid black;
            margin-right:auto;
        }
        p{
            margin-bottom: 0;
        }
    }
}

a{
    color: $black;
    text-decoration: none;
    &:hover {
        text-decoration: none;
        color: $black;
        i {
            box-shadow: 0px 0px rgba(255, 255, 255, 0);
        }
        h5.coach {
            border-bottom:2px solid $bleu;
        }
        h5.parrain {
            border-bottom:2px solid $turquoise;
        }
        h5.young {
            border-bottom:2px solid $green;
        }

    }
    &:focus {
        text-decoration: none;
    }
}
i.coach {
    color : $bleu;
}
i.parrain {
    color : $turquoise;
}
i.young {
    color : $green;
}
</style>