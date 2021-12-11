<template>
    <section>
        <div class="select-group">
            <select class="filter_category" v-model="category">
                <option disabled value="">Categories</option>
                <option
                      v-for="(category, index) in list_category"
                      :key="index"
                      :value="category.id"
                    >
                      {{ category.name }}
                    </option>
            </select>
            <select @change="getcity" class="filter_country" v-model="country">
                <option disabled value="">Countries</option>
                <option
                      v-for="(country, index) in list_Contries"
                      :key="index"
                      :value="country"
                    >
                      {{ country }}
                    </option>
            </select>
            <select class="filter_city" v-model="city">
                <option disabled value="">Cities</option>
                <option
                      v-for="(city, index) in list_Cites"
                      :key="index"
                      :value="city"
                    >
                      {{ city }}
                    </option>
            </select>
        </div>
    </section>
</template>

<script>
import json from "../myevent/json/countries.json";
import axios from "../../axios-http.js";
export default{
    data(){
        return {
            list_Location: json,
            list_Contries: [],
            list_category: [],
            list_Cites: [],
            Countries: [],
            country: '',
            category: '',
            city: ''
        }
    },
    methods: {
        getLocation() {
            let countries = this.list_Location;
            for (let key in countries) {
                this.list_Contries.push(key);
            }
        },
        getcity() {
            console.log('yes');
            let countries = this.list_Location;
            for (let country in countries) {
                if (country === this.country) {
                    this.list_Cites = countries[country];
                }
            }
        },
        getCategory() {
            axios.get("categories").then((res) => {
                this.list_category = res.data;
            });
        },
    },
    mounted(){
        this.getLocation();
        this.getCategory();
    }
}
</script>

<style scoped>
    .select-group{
        display: flex;
        justify-content: space-evenly;
        margin-top: 30px;
        margin-bottom: 30px;
    }
    .filter_category,.filter_country,.filter_city{
        width: 20%;
        height: 55px;
        border-radius: 5px;
        background: orange;
        border: 1px solid white;
    }

    select{
        text-align: center;
        color: white;
        font-size: 24px;
        font-weight: bold;
    }
    option{
        background:rgb(214, 214, 214);
        color:black
    }
</style>