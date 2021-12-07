<template>
  <div class="wrapper" v-if="username != 'Guest'">
        <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">+Add Event</button>
        <div class="modal fade" id="staticBackdrop">
          <div class="modal-dialog">
            <div class="modal-content"> 
              <div class="modal-body">
                <div class="container">  
            <form class="container-form" action="">
                <div>
                  <input id="title" placeholder="Title" v-model="title" type="text">
                </div>

                <div>
                  <textarea id= "description" placeholder="Description" v-model="description" type="text"></textarea>
                </div>
              <div class="date">
                <div class="Departure_Date" >
                  <label id='label' for="Departure_Date">Departure Date</label>
                  <input id="Departure_Date" v-model="departuredate" type="date">
                </div>
                <div class="Arrival_Date">
                  <label id='label' for="Arrival_Date">Arrival Date</label>
                  <input id="Arrival Date" v-model="arrivaldate" type="date">
                </div>
              </div>
                <div >
                  <div class='label'>
                  </div>
                  <select v-model="category" class="category">
                   
                    <option disabled value="">Category Type</option>
                    <option v-for="(category, index) in list_category" :key="index" value="Er Deepak Bhusan">{{category.name}}</option>
                  </select>   
                    <select  @change="getcity" v-model="country" class='country'>
                      <option disabled value="">Country</option>
                      <option v-for="(country,index) in list_Contries" :key='index'  :value="country">{{country}}</option>
                    </select>
                    <select v-model="city" class="city">
                      <option disabled value="">City</option>
                      <option v-for="(city,index) in list_Cites" :key="index" :value="city">{{city}}</option>
                    </select>
                </div>
                <div>
                  <button @click.prevent="addEvent" type="add">+Add</button>
                </div>
            </form>
        </div>
                <!-- <input type="text" placeholder="Name" v-model="categoryName"/>
                <strong class="text-danger"> {{ errorAlert }} </strong>
                <button class="buttonadd" role="button" data-bs-dismiss="modal" @click.prevent="emitCategories">+Add</button> -->
              </div>
            </div>
          </div>
        </div>
    </div>
        
</template>
<script>
import json from '../myevent/json/countries.json';
import axios from 'axios';
// const URL = "http://eventme.com:3000/api/";
const URL = "http://127.0.0.1:8000/api/";
  export default {    
    inject:['username'],
    emits:['add-event'],                       
    data() {
            return {
              list_Location:json,
              list_Contries:[],
              list_category:[],
              list_Cites:[],
              Countries:[],
              title: '',
              description: '',
              departuredate: '',
              arrivaldate: '',
              location:'',
              category:'',
              city:'',
              country:''
            };
          },
          methods: {
            addEvent(){
               let newEvent = {
                 title: this.title,
                 description: this.description,
                 departuredate: this.departuredate,
                 arrivaldate: this.arrivaldate,
                 location: this.location,
                 category: this.category,
               } 
               this.$emits('add-event',newEvent)   
            },
            getLocation(){
                let countries = this.list_Location
                for(let key in countries){
                  this.list_Contries.push(key)
                }
            },
            getcity(){
              let countries = this.list_Location;
              for(let country in countries){
                if(country === this.country){
                  this.list_Cites = countries[country]
                }
              }
            },
            getCategory(){
              axios.get(URL + 'categories')
                .then(res => {
                    this.list_category = res.data;
                    
                });
            },
          },
          mounted() {
            this.getLocation();
            this.getCategory();
          },
          

  };
</script>
<style scoped>
    * {
    box-sizing: border-box;
  }
  body{
    background: rgb(129, 128, 128);
  }
  .wrapper{
    margin: 20px;
  }
  .container {
    max-width: 600px;
    margin: auto;
  }
  .container-form {
    background: #0707079f;
    padding: 15px;
    border-radius: 10px;
    margin-top: 0px;
    border: solid 1px white;
  }
  .container-form input,
  .container-form textarea,
  .location,
  .category,
  .country,
  .city{
    width: 98.5%;
    border: none;
    border-radius: 5px;
    background: rgba(255, 255, 255, 0.61);
    margin: 5px;
    padding: 10px;
    border:solid 1px black;
  }
  ::placeholder{
    text-align: center;
    color: rgb(0, 0, 0);
  }
  textarea::placeholder{
    text-align: left;
  }
  .date{
    display: flex;
  }
  #label{
    display: flex;
    justify-content: center;
    color: white;
  }
  .Departure_Date,
  .Arrival_Date{
    width: 49%;
  }
  .Departure_Date{
    margin-right: 5px;

  }
  .Arrival_Date{
    margin-left: 5px;

  }
  .container-form textarea {
    height: 120px;
  }
  button{
    font-size: 15px;
    margin: 5px;
    margin-top: 10px;
    width:40%;
    height: 35px;
    border-radius: 5px;
    background: orange;
    border:1px solid black;
  }
  input{
    border-radius: 5px;
  }
  .select_group{
    display: grid;
  }
  .btn {
    background: #f7a223;
    float:right;
    font-weight: bold;
    height: 50px;
    width: 10%;
    border-radius: 10px;
  }
  
</style>