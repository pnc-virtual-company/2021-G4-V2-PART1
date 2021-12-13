<template>
  <div class="wrapper" v-if="username != 'Guest'">
    <button
      class="btn"
      type="button"
      data-bs-toggle="modal"
      data-bs-target="#staticBackdrop"
    >
      +Add Event
    </button>
    <div class="modal fade" id="staticBackdrop">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <div class="container">
              <form class="container-form" action="">
                <div>
                  <input
                    id="title"
                    placeholder="title"
                    v-model="title"
                    type="text"
                  />
                  <span>{{this.eventError.title_error[0]}}</span>
                </div>

                <div>
                  <textarea
                    id="description"
                    placeholder="Description"
                    v-model="description"
                    type="text"
                  ></textarea>
                  <span>{{this.eventError.description_error[0]}}</span>
                </div>
                <div class="date">
                  <div class="Departure_Date">
                    <label id="label" for="Departure_Date"
                      >Departure Date</label
                    >
                    <input
                      id="Departure_Date"
                      v-model="departuredate"
                      type="datetime-local"
                    />
                  </div>
                  <div class="Arrival_Date">
                    <label id="label" for="Arrival_Date">Arrival Date</label>
                    <input
                      id="Arrival Date"
                      v-model="arrivaldate"
                      type="datetime-local"
                    />
                  </div>
                </div>
                <span>{{this.eventError.arrivalDate_error[0]}}</span>
                <div>
                  <div class="label"></div>
                  <select v-model="category_id" class="category">
                    <option disabled value="">Category Type</option>

                    <option
                      v-for="(category, index) in list_category"
                      :key="index"
                      :value="category.id"
                    >
                      {{ category.name }}
                    </option>
                  </select>
                  <select @change="getcity" v-model="country" class="country">
                    <option disabled value="">Country</option>
                    <option
                      v-for="(country, index) in list_Contries"
                      :key="index"
                      :value="country"
                    >
                      {{ country }}
                    </option>
                  </select>
                  <select v-model="city" class="city">
                    <option disabled value="">City</option>
                    <option
                      v-for="(city, index) in list_Cites"
                      :key="index"
                      :value="city"
                    >
                      {{ city }}
                    </option>
                  </select>
                  <input @change="addEventImg" @change.prevent="addEvent" type="file" placeholder="" />
                </div>
                <div class="add_btn">
                  <button
                    data-bs-dismiss="modal"
                    type="add"
                    @click='clearForm'
                  >
                    +Add
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import json from "../myevent/json/countries.json";
import axios from "../../axios-http.js";

export default {
  emits: ["add-event"],
  inject: ['eventError'],

  data() {
    return {
      username: localStorage.getItem("username"),
      userid: localStorage.getItem("id"),
      list_Location: json,
      list_Contries: [],
      list_category: [],
      list_Cites: [],
      Countries: [],
      title: "",
      description: "",
      departuredate: "",
      arrivaldate: "",
      country: "",
      city: "",
      category_id: "",
      imageName: [],
    };
  },
  methods: {
    // ________________add event Img________________ //
    addEventImg(event) {
      this.imageName = event.target.files[0];
    },
    addEvent() {
      console.log( this.userid)
      let newevent = new FormData();
      newevent.append("title", this.title);
      newevent.append("description", this.description);
      newevent.append("departureDate", this.departuredate);
      newevent.append("arrivalDate", this.arrivaldate);
      newevent.append("city", this.city);
      newevent.append("country", this.country);
      newevent.append("category_id", this.category_id);
      newevent.append("imagename", this.imageName);
      newevent.append("user_id", this.userid);
      this.$emit("add-event", newevent);

    },
    clearForm(){
      
      this.userid='';
      this.category_id='';
      this.title='';
      this.description='';
      this.departuredate='';
      this.arrivaldate='';
      this.country='';
      this.city='';
      this.imageName=null;
    },
    // ________________get location________________ //
    getLocation() {
      let countries = this.list_Location;
      for (let key in countries) {
        this.list_Contries.push(key);
      }
    },
    // _______________get city________________ //
    getcity() {
      let countries = this.list_Location;
      for (let country in countries) {
        if (country === this.country) {
          this.list_Cites = countries[country];
        }
      }
    },
    // ________________get category________________ //
    getCategory() {
      axios.get("categories").then((res) => {
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
body {
  background: rgb(129, 128, 128);
}
.wrapper {
  margin: 20px;
}
.container {
  max-width: 600px;
  margin: auto;
}
.container-form {
  background: #000000c9;
  padding: 15px;
  border-radius: 10px;
  margin-top: 0px;
  border: solid 1px white;
}
.modal-content{
  background: rgba(177, 133, 133, 0);
  border: solid 1px orange;
}
.container-form input,
.container-form textarea,
.location,
.category,
.country,
.city {
  width: 98.5%;
  border: none;
  border-radius: 5px;
  background: rgba(255, 255, 255, 0.61);
  margin: 5px;
  padding: 10px;
  border: solid 1px black;
}
::placeholder {
  text-align: center;
  color: rgb(0, 0, 0);
}
textarea::placeholder {
  text-align: center;
}
.date {
  display: flex;
}
#label {
  display: flex;
  justify-content: center;
  color: white;
}
.Departure_Date,
.Arrival_Date {
  width: 49%;
}
.Departure_Date {
  margin-right: 5px;
}
.Arrival_Date {
  margin-left: 5px;
}
.container-form textarea {
  height: 120px;
}
button {
  font-size: 15px;
  margin: 5px;
  margin-top: 10px;
  width: 40%;
  height: 35px;
  border-radius: 5px;
  background: orange;
  border: 1px solid black;
}
input {
  border-radius: 5px;
}
.select_group {
  display: grid;
}
.btn {
  background: #f7a223;
  float: right;
  font-weight: bold;
  height: 50px;
  width: 10%;
  margin-right: 3.5%;
  border-radius: 10px;
}
.add_btn{
  text-align: center;
}
span{
  font-size: 13px;
  color: red;
  display:flex;
  justify-content: center;
}
</style>