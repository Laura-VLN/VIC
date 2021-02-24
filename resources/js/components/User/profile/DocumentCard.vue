<template>
    <div class="d-flex flex-column col-12 col-md-6 document-card">
        <div class="d-flex flex-column mx-auto">
            <div class="d-flex flex-row doc">
                <h5>Documents utiles </h5> <a :href="'/profile/upload/'+userid" v-if="canadd == true"><i class="fas fa-file-upload"></i></a>
            </div>
            <ul>
                <li v-bind:key="index" v-for="(document,index) in documents">
                    <form v-bind:action="'/profile/download'" method="post">
                    <button type="submit"><i  class="fas fa-download"></i></button> {{document.title}}
                    <input type="hidden" name="link" :value="document.link">
                    <input type="hidden" name="_token" :value="csrf">
                    </form>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
    export default {
        props:['documents','canadd','userid','csrf'],
        mounted() {
            console.log('Component mounted. nav')
        }
    }
</script>
<style scoped lang="scss">
.document-card{
    padding:30px;
    .doc{
        h5{
            margin-right:0;
        }a{
            font-size:1.5rem;
            padding-left: 10px;
            color:black;
            text-decoration:none;
            &:hover{
                color:grey;
            }
        }
    }
    h5{
        font-weight:bold;
        border-bottom:2px solid black;
        margin-right:auto;
        padding: 5px 5px;
        padding-bottom:0px;
        
    }
    p{
        padding-left:10px;
    }
    ul{
        padding-left:10px;
        margin-top:5px;
        margin-bottom:5px;
        display:block;
        max-height: 110px;
        overflow-y : scroll;
        &::-webkit-scrollbar {
            display:none;
        }
        li{
            list-style-type:none;
            form{
                color:black;
                text-decoration:none;
                font-size:1.5rem;
                &:hover{
                    color:grey;
                }
                button{
                    border:none;
                    background:transparent;
                }
            }
        }
    }   
    
}
</style>