<template>
    <div>
        <div class="form-group">
            <label for="" class="class-muted">Select star rating (1 is worst - 5 is best)</label>
            <!-- <star-rating 
                :raiting="review.raiting" 
                class="fa-3x"
                v-on:raiting-changed="onRatingChanged"
            ></star-rating> -->
            <!-- <star-rating 
                :raiting="review.raiting" 
                class="fa-3x"
                v-on:raiting-changed="review.raiting=$event"
            ></star-rating> -->
              <star-rating 
                class="fa-3x"
                v-model="review.raiting"
            ></star-rating>
        </div>
        <div class="form-group">
            <label for="content" class="tect-muted">Descrie yoyur experience with</label>
            <textarea 
                name="content" cols="30" rows="10" class="form-control"
                v-model="review.content"
            ></textarea>
        </div>
        <button class="btn-large btn-primary btn-block">Submit</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            review: {
                 raiting: 5,
                 content: null,
            }
        }
    },
    methods: {
        onRatingChanged(raiting){
            //console.log("Raiting:"+raiting);
            this.review.raiting=raiting;
        }
    },
}
</script>