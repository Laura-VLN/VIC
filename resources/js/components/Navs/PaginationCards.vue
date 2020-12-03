<template>
    <div class="container-fluid">
        <div class="row">
            <ul class="pagination ml-3 mt-3">
                <li class="page-item"><a class="btn btn-outline-secondary"  :href="decrement"><i class="fas fa-arrow-left"></i></a></li>
                <li class="page-item"><a class="btn btn-outline-secondary  ml-1"  :href="increment"><i class="fas fa-arrow-right"></i></a></li>
            </ul>
        </div>
    </div>
</template>

<script>
	export default {

	computed: {
		decrement () {
            let url=window.location.href
            let reg=new RegExp('[^/]+$')
            let number=parseInt(url.match(reg)[0])
            if(number>1){
                number-=1
                return url.replace(reg,number)
            }
		},
		increment () {
            let url=window.location.href
            let reg=new RegExp('[^/]+$')
            let number=parseInt(url.match(reg)[0])
            number+=1
            return url.replace(reg,number)
	}
}}

</script>
<style scoped lang="scss">
//changer le chemin selon la position du component
@import '../../../sass/variables';
</style>
