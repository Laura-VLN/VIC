<template>
    <div class="container custom-cards px-5">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
            <div class="col mb-4 cds card-instance"  v-bind:class="pagetheme" v-for="logement in logements" :key="logement.id">
                <div id="card" class="card h-100 ">
                    <div class="imgctn">
                        <img :src="logement.img_link">
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-between">
                            <h6>{{logement.area}} m²</h6><h6>{{logement.price}} €</h6>
                        </div>
                        <hr>
                        <div class="slots mx-auto">
                            <p>{{logement.description}}</p>
                        </div>
                    </div>
                    <div class="card-bot">
                        <a v-bind:href="'/logement/show/'+logement.housing_id" class='btn' type="button" >Voir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            imgurl: {
                default:"../storage/img/noimage.png",
                type:String,
            },
            pagetheme:{
                default:"job",
                type:String,
            },
            title:{
                default:"title",
                type:String,
            },
            logements:{
            }
        }
    }
</script>

<style scoped lang="scss">
    @import "../../../../sass/app.scss";
    .custom-cards{
        *{
            border-radius:0 ;
        }
        .card-instance{
            height:450px;
            .imgctn{
                width:100%; 
                height:45%; 
                background-color:#470f37;
                display:flex;
                img{
                    max-width:100%; 
                    max-height:100%; 
                    margin:auto; 
                    display:block;
                }
            }
            .card-body{
                position:relative;
                .slots{
                    height:60%; 
                    overflow-y:scroll; 
                    width:95%;
                    white-space:pre-line;
                }
            }
            .card-bot{
                position:absolute; 
                bottom:0; 
                z-index:666; 
                width:100%; 
                height:28px; 
                background-color:transparent; 
                .btn{
                    height:28px;
                }
            }
        }
    }
    .logement{
        .card{
            border:2px solid $violet; 
        }
        hr{
            border:2px solid $violet;
        }
        .btn{
            border-top: 2px solid $violet;
            border-right: 2px solid $violet;
            border-bottom: 0px solid $violet;
            border-left: 0px solid $violet;
            background-color: $violet;
            color:white;
            &:hover{
                color:black;
                background-color:transparent;
            }
            
        }
        
        
    }
    .job{
        .card{
            border:2px solid $orange; 
        }
        hr{
            border:2px solid $orange;
        }
        .btn{
            border-top: 2px solid $orange;
            border-right: 2px solid $orange;
            border-bottom: 0px solid $orange;
            border-left: 0px solid $orange;
            background-color: $orange;
            color:white;
            &:hover{
                color:black;
                background-color:transparent;
            }
        }
    }
    .formations{
        .card{
            border:2px solid $green; 
        }
        hr{
            border:2px solid $green;
        }
        .btn{
            border-top: 2px solid $green;
            border-right: 2px solid $green;
            border-bottom: 0px solid $green;
            border-left: 0px solid $green;
            background-color: $green;
            color:white;
            &:hover{
                color:black;
                background-color:transparent;
            }
        }
    }
    .slots::-webkit-scrollbar {
            display:none;
        }

</style>