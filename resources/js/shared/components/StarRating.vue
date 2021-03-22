<template>
    <div class="d-flex">
        <!-- <i 
            v-for="star in fullStars"  
            :key="'full'+star"
            @click="$emit('raiting-changed', star)"  
            class="fas fa-star"
        ></i>
        <i v-if="halfStars" class="fas fa-star-half-alt"></i>
        <i 
            v-for="star in emptyStars"  
            :key="'empty'+star" 
            @click="$emit('raiting-changed', fullStars+star)"  
            class="far fa-star"
        ></i> -->

        <i 
            v-for="star in fullStars"  
            :key="'full'+star"
            @click="$emit('input', star)"  
            class="fas fa-star"
        ></i>
        <i v-if="halfStars" class="fas fa-star-half-alt"></i>
        <i 
            v-for="star in emptyStars"  
            :key="'empty'+star" 
            @click="$emit('input', fullStars+star)"  
            class="far fa-star"
        ></i>
        <!-- <span v-for="(star, index) in raiting" :key="index">
            <i class="fas fa-star text-warning"></i>
        </span> -->
    </div>
</template>

<script>

//import '@fortawesome/fontawesome-free/css/all.css';
//import '@fortawesome/fontawesome-free/js/all.js' ;

export default {
    //use value when need to bind prop as v-model in parent component  
    props:{
        //raiting: Number,
        value: Number
    },
    computed: {
        halfStars(){
            //ceil: 4.0(0) 4.3(1) 4.5(0)
            //floor 4.0(0) 4.3(0) 4.5(1)
            // var ceil =  Math.ceil(this.raiting) - Math.round(this.raiting);
            // var floor = Math.round(this.raiting) - Math.floor(this.raiting);
            // return (ceil - floor) === 1 ? true : false; 
            ////const fraction = Math.floor((this.raiting - Math.floor(this.raiting))*100);
            const fraction = Math.floor((this.value - Math.floor(this.value))*100);
            //console.log("Fraction:" + fraction);
            return fraction < 50 && fraction > 10 ? true : false;
        },
        fullStars(){
            // > 4.5 = 5 stars
            // 4.3 = 4 and half stars
            ////return Math.round(this.raiting);
            return Math.round(this.value);
        },
        emptyStars(){
            ////return 5 - (Math.round(this.raiting) + this.halfStars); //po-dobro!!
            return 5 - (Math.round(this.value) + this.halfStars); //po-dobro!!
            //return 5 - Math.ceil(this.raiting);
        }
    },
}
</script>