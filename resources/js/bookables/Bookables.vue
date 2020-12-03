<template>
    <div>
        <!-- <div>Rows is {{ rows }}</div> -->
        <div v-if="loading">
            Data is Loading...
        </div>
        <div v-else>
            <div class="row mb-4" v-for="row in rows" :key="'row'+row">
                <!-- row is comuted property - v-for iterate number one by one -->
                <!-- <div class="col" 
                    v-for="(bookable, column) in bookables.slice((row-1)*columns, row*columns)"
                    :key="'row'+row+column"
                > -->
                <div class="col d-flex align-items-stretch" 
                    v-for="(bookable, column) in bookablesInRow(row)"
                    :key="'row'+row+column"
                >
                    <!-- <bookable-list-item
                        :title="bookable.title"  
                        :description="bookable.description" 
                        v-bind:id="bookable.id"
                    ></bookable-list-item> -->
                    <bookable-list-item
                        v-bind="bookable"
                    ></bookable-list-item>
                    
                </div>
                <div class="col" 
                    v-for="p in placeholdersInRow(row)" 
                    :key="'placeholder'+row+p"
                >
                    <!-- placeholder -->
                </div>
            </div>
        </div>
       
        
    </div>
</template>


<script>
import BookableListItem from "./BookableListItem";

export default {
    components: {
        BookableListItem,
    },
    data() {
        return {
            bookables: null,
            loading: false,
            columns: 3,
        }
    },
    computed: {
        rows(){
            return this.bookables === null 
            ? 0 
            : Math.ceil(this.bookables.length / this.columns);
        }
    },
    methods: {
        bookablesInRow(row) {
            return this.bookables.slice((row-1)*this.columns, row*this.columns);
        },
        placeholdersInRow(row){
            return this.columns - this.bookablesInRow(row).length;
        }
    },
    created() {
        this.loading = true;

        const p = new Promise((resolve, reject) =>{
            console.log(resolve);
            console.log(reject);
            setTimeout(() => resolve("Hello"), 3000);
        })
            .then(result => "Helo again-> " + result)
            .then(result => 
                {
                    console.log(result);
                    this.loading = false;
                })
            .catch(result => console.log(`Error ${result}`));
        console.log(p);

        const request = axios.get("/api/bookables")
            .then(responce => 
                {
                    this.bookables = responce.data.data;
                   //this.bookables.push({title:'x', description:'x'});
                    this.loading = false;
                });

           
    },    
}
</script>