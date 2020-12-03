<template>
    <div style="padding: 1.25rem">
        <h6 class="text-uppercase text-secondary font-weight-bolder pt-3">Review list</h6>

        <div v-if="loading">Loading...</div>
        <div v-else>
            <div class="border-bottom pt-4" v-for="(review, index) in reviews" :key="index">
                <div class="row">
                    <div class="col-md-6">Autor name</div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <!-- <star-rating :raiting="review.raiting" class="fa-lg"></star-rating> -->
                        <star-rating :value="review.raiting" class="fa-lg"></star-rating>
                        <!-- {{review.raiting}} -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">{{ review.created_at | fromNowGlobal }}</div>
                </div>
                <div class="row py-3">
                    <div class="col md-12">{{review.content}}</div>
                </div>
            </div>
        </div>

      
    </div>
</template>

<script>
import moment from "moment"; 

export default {
    props: {
        bookableId: String,
    },
    data(){
        return {
            loading: false,
            reviews: null,
        }
    },
    created() {
        this.loading = true;
        // axios.get(`/api/bookables/${this.$route.params.id}/reviews`)
        axios.get(`/api/bookables/${this.bookableId}/reviews`)
        .then(responce =>{
            this.reviews = responce.data.data;
        })
        .catch(error=>{

        })
        .then(()=>this.loading=false);
        
    },
    filters: {
        fromNow(value){
            return moment(value).fromNow();
        },
    },
}
</script>