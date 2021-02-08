<template>
    <div class="d-flex flex-row col-12 col-md-6 profile-card">
        <div class="mx-auto d-flex flex-row">
            <i class="fas fa-user"></i>
            <div class="d-flex flex-column justify-content-between informations">
                <h5>{{user.first_name.charAt(0).toUpperCase() + user.first_name.slice(1)}} {{user.last_name.charAt(0).toUpperCase() + user.last_name.slice(1)}}</h5>
                <ul>
                    <li>{{user.birth_date}}</li>
                    <li>{{user.location}}</li>
                </ul>
                <p>{{user.email}}</p> 
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props:['user'],
        mounted() {
            console.log('Component mounted. nav')
        }
    }
</script>
<style scoped lang="scss">
.profile-card{
    max-height:220px;
    padding:30px;
    i{
        display:block;
        font-size: 8rem;
        color: gray;
        padding:15px;
        border: 2px solid black;
        box-shadow: -10px 10px black;
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
            padding: 0px 5px;
        }
        p{
            margin-bottom: 0;
        }
    }
}
</style>