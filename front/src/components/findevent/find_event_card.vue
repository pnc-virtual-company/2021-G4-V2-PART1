<template>
  <div class="event_container">
    <div class="select-group">
      <select class="filter_category" @change="SortEvent('category_id',category)" v-model="category">
        <option disabled value="">Categories</option>
        <option
        v-for="(category, index) in list_category"
        :key="index"
        :value="category.id">
              {{ category.name }}
        </option>
      </select>
      <select  class="filter_country" @change="SortEvent('country',country)" v-model="country">
        <option disabled value="">Countries</option>
        <option
        v-for="(country, index) in list_Contries"
        :key="index"
        :value="country">
              {{ country }}
        </option>
      </select>
      <select class="filter_city" @change="SortEvent('city',city)" v-model="city">
        <option disabled value="">Cities</option>
        <option
        v-for="(city, index) in list_Cites"
        :key="index"
        :value="city">
              {{ city }}
      </option>
      </select>
    </div>
  <div class="container_card">
    <div v-for="(event, index) of  ListEvents" :key="index">
      <div class="event-card" v-show="event.user.firstname != username" >
        <div class="card-img">
          <img class="img" :src="this.pathImage+event.imagename" alt="photo" />
        </div>
        <div class="main-card">
          <div class="category-header">
            <h1 class="orange">{{event.title}} </h1>
            <h3 class="orange">{{event.category.name}}</h3>
          </div>
          <div class="card-body">
            <div class="description">
              <p>{{event.description}}</p>
            </div>
            <div class="date">
              <div>
                <span class="orange">Start Date: </span>
                <span id="small_space"></span>
                <span> {{event.departureDate}} XX</span>
              </div>
              <div>
                <span class="orange">End Date:</span>
                <span id="small_space"></span>
                <span>{{event.arrivalDate}} XX</span>
              </div>
            </div>
            <div class="location">
              <div id='location_width'>
                <span class="orange">Location: </span>
                <span>{{event.city}} , {{event.country}}</span>
              </div>
              <span id="space"> | </span>
              <div  id='location_width'>
                <span class="orange">Member Remain:</span>
                <span id="small_space"></span>
                <span>{{getremain(event.join)}}</span>
                <span class="orange"> People.</span>
              </div>
            </div>
            <div class="progress_bar d-flex">
              <div class="member">
              <div class="profile" >
                <img
                  src="https://image.flaticon.com/icons/png/512/64/64572.png"
                  alt="profile"
                  />
              </div>
            </div>
            <div class="progress m-2 w-100 mt-4" style="height: 5px" >
                <div
                  class="progress-bar"
                  role="progressbar"
                  :style="progress"
                  aria-valuenow="25"
                  aria-valuemin="0"
                  aria-valuemax="100"
                >
                </div>
            </div>
            </div>
          </div>
        </div>
        <div class="card-btn">
          <div class="card-btn-top">
            <h2 id="username" class="orange">{{event.user.firstname}}</h2>
          </div>
          <div class="group_btn " >
            <button v-if="isJoin(event.id)" @click='QuitEvent(event.id)' class="button">Quit</button>
            <button v-else class="button" @click='JoinEvent(event.id)'>Join</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>

import json from "../myevent/json/countries.json";
import axios from '../../axios-http.js';

export default {

  emits: ['join-event'],

  data() {
    return {
      Events:[],
      list_Location: json,
      list_Contries: [],
      list_category: [],
      list_Cites: [],
      Countries: [],
      country: '',
      category: '',
      city: '',
      bgProgress:'',
      widthProgress:0,
      ListEvents : null,
      user_id:localStorage.getItem("id"),
      UserProfile:localStorage.getItem("imgname"),
      pathImage: "http://127.0.0.1:8000/storage/EventImages/",
    };
  },
  computed:{
    progress(){
      return{ width: this.widthProgress+'%', background: this.bgProgress}
    }
  },
  watch:{
    // ________________get list city speicify by a country________________ //
    country(){
      let countries = this.list_Location;
        for (let country in countries) {
            if (country === this.country) {
                this.list_Cites = countries[country];
            }
        }

    }

  },
  methods: {
    // ________________location from file json________________ //
    getLocation() {
        let countries = this.list_Location;
        for (let key in countries) {
            this.list_Contries.push(key);
        }
    },
    // ________________get category________________ //
    getCategory() {
        axios.get("categories").then((res) => {
            this.list_category = res.data;
        });
    },
    // ________________get event list________________ //
    getEventList(){
        axios.get('events')
        .then(res=>{
          this.ListEvents= res.data;
          this.Events = res.data;
          this.getListJoin()
        })
        .catch(error => {
          console.log(error.response.data.message);
        })
        return this.ListEvents;
    },
    // ________________sort event________________ //
    SortEvent(typeofsort,key){
      let listSort = [];
      if(typeofsort === 'category_id'){
        for( let event of this.Events){
          if(event.category_id === key){   
            listSort.push(event);
          }
        }
      }
      else if(typeofsort === 'country'){
        for( let event of this.Events){
          if(event.country == key){
            listSort.push(event);
          }
        }
      }
      else{
        for( let event of this.Events){
          if(event.city == key){
            listSort.push(event);
          }
        }
      }
      this.ListEvents = listSort
    },
    // ________________join event________________ //
    JoinEvent(event_id){
      let Join={
        'event_id':event_id,
        'user_id':this.user_id,
        'user_role':'member',
        'profile_path':this.UserProfile
      }
        axios.post('joinevent',Join)
        .then(res=>{
          this.getremain(res.data);
          this.getEventList();
        })
        .catch(error => {
          console.log(error.response.data.message);
        })
    },
    // ________________quit event________________ //
    QuitEvent(event_id){
      for(let join of this.List_Joins){ 
        if(join.user_id == this.user_id && join.event_id == event_id){
          axios.delete('joinevent/'+join.id)
          .then(res=>{
            this.List_Joins = res.data;
            this.getEventList()
          })
          .catch(error => {
            console.log(error);
          })
        }
      }
      
    },
    // ________________validate btn________________ //
    isJoin(event_id){
      for(let join of this.List_Joins){ 
        if(join.user_id == this.user_id && join.event_id == event_id){
          return true;
        }
      }
      return false;
    },
    // ________________get list join________________ //
    getListJoin(){
      axios.get('joinevent')
        .then(res=>{
          this.List_Joins = res.data;
        })
        .catch(error => {
          console.log(error.response.data.message);
        })
    },
    // ________________set remain________________ //
    getremain(listJoin){
      if(listJoin.length<=3){
        this.bgProgress = 'blue';
      }
      else if(listJoin.length>3 && listJoin.length<=6){
        this.bgProgress = 'green';
      }
      else if(listJoin.length>6 && listJoin.length<=9){
        this.bgProgress = 'yellow';
      }
      else if(listJoin.length>9 && listJoin.length<=12){
        this.bgProgress = 'orange';
      }
      else{
        this.bgProgress = 'red';
      }
      this.widthProgress= listJoin.length*6.66;
      return 15-listJoin.length;
      
    },
  },
  mounted() {

    this.getListJoin();
    this.getEventList();
    this.getLocation();
    this.getCategory();
  },
};
</script>

<style scoped>
.container_card {
  margin: 10px 70px;
  border: solid 2px orange;
  border-radius: 20px;
}
.event-card {
  color: white;
  display: flex;
  justify-content: center;
  border: 2px solid rgb(0, 0, 0);
  background: rgba(255, 255, 255, 0.183);
  height: auto;
  padding: 5px;
  border-radius: 20px;
  margin: 15px;
}
.card-img {
  width: 35%;
  padding: 10px;
}
.img {
  width: 100%;
  height: 310px;
  background: rgb(221, 205, 205);
  border-radius: 10px;
}
.main-card {
  padding: 10px;
  border-right: 3px solid orange;
  width: 50%;
}
.card-btn {
  padding: 10px;
  border-left: 3px solid orange;
  width: 15%;
}
#username {
  margin: 0;
  text-align: center;
  padding: 0;
}
.card-btn-top {
  height: 60%;
}
/* ----------- */
.category-header,
.location {
  display: flex;
}
.category-header h3{
  margin-top: 6px;
}
.category-header h1 {
  margin: 0;
}
.category-header {
  justify-content: space-between;
  margin: 0px 10px;
}
.orange {
  color: orange;
}
.member {
  margin-top: 10px;

}
img {
  background: white;
  border: 1px solid orange;
  width: 32.5px;
  height: 32.5px;
  border-radius: 40px;
}
.profile {
  border-radius: 40px;
  /* margin: 0px 5px; */
  width: 32.5px;
  height: 32.5px;
}
.location{
   width: 98.5%;
  border-radius: 5px;
  background: rgba(48, 47, 47, 0.61);
  margin: 5px;
  padding: 10px;
  border: solid 1px black;
}
#location_width{
  width: 49%;;
}
#space {
  margin: 0px 30px;
}
#small_space {
  margin: 0px 10px;
}
.description {
  height: auto;
  margin: 10px 0px;
}
.group_btn {
  height: 20%;
  margin-top: 0px;
  display: grid;
}
.card-btn-top {
  height: 80%;
}
button {
  height: 50px;
  color: white;
  border-radius: 10px;
  padding: 10px;
  margin: 10px 7px;
  background: rgba(0, 0, 0, 0.796);
  border: 1px solid orange;
}
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