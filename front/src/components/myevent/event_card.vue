<template>
  <div class="container_card">
    <div v-for="(event, index) of allEvents" :key="index">
      <div class="event-card" v-show="event.user.firstname === username">
        <div class="card-img">
          <img class="img" :src="this.pathImage + event.imagename" alt="" />
        </div>
        <div class="main-card">
          <div class="category-header">
            <h1 class="orange">{{ event.title }}</h1>
            <h3 class="orange">{{ event.category.name }}</h3>
          </div>
          <div class="card-body">
            <div class="description">
              <p>{{ event.description }}</p>
            </div>
            <div class="date">
              <div>
                <span class="orange">Start Date: </span>
                <span id="small_space"></span>
                <span>{{ event.departureDate }}</span>
              </div>
              <div>
                <span class="orange">End Date:</span>
                <span id="small_space"></span>
                <span>{{ event.arrivalDate }}</span>
              </div>
            </div>
            <div class="location">
              <div  id='location_width'>
                <span class="orange">Location: </span>
                <span>{{ event.city }} , {{ event.country }}</span>
              </div>
              <span id="space"> | </span>
              <div  id='location_width'>
                <span class="orange">Members Remain:</span>
                <span id="small_space"></span>
                <span>{{getremain(event.join)}} </span>
                <span class="orange"> People.</span>
              </div>
            </div>
              <div class="member"  >
              <div class="member" v-for="(join,index) of event.join" :key='index' >
              <div class="profile" >

                <img
                  :src="this.pathImagePro+join.profile_path"
                  alt="profile"
                  />
              </div>
            </div>
            </div>
          </div>
        </div>
        <div class="card-btn">
          <div class="card-btn-top">
            <h2 id="username" class="orange">{{ event.user.firstname }}</h2>
          </div>
          <div class="group_btn owner">
            <button
              class="button btn category-btn"
              type="button"
              data-bs-toggle="modal"
              data-bs-target="#editEvent"
              @click="editEventAction(event.id)"
            >
              Edit
            </button>
            <button
              class="button btn category-btn"
              type="button"
              data-bs-toggle="modal"
              data-bs-target="#deleteEvent"
              @click="deleteEventAction(event.id)"
            >
              Delete
            </button>
          </div>
        </div>
      </div>

    <!-- #delete comfirm -->
    <div class="wrapper delete">
      <div class="modal fade delete delete_modal" id="deleteEvent">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body modal_delete">
              <h4>Delete a category ?</h4>
              <hr />
              <strong>Are you sure you want to delete this event ?</strong>
              <hr />
              <div class="cancel_delete">
                <button
                  class="button_cancel"
                  role="button"
                  data-bs-dismiss="modal"
                >
                  Cancel
                </button>
                <button
                  class="button_delete"
                  role="button"
                  data-bs-dismiss="modal"
                  @click="deleteEvent(delete_id)"
                >
                  Delete
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- edit form  -->
    <div class="modal fade" id="editEvent">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <div class="container">
              <form class="edit-container-form" action="">
                <div>
                  <input
                    id="title"
                    placeholder="title"
                    v-model="title"
                    type="text"
                  />
                </div>

                <div class="edit_description">
                  <textarea
                    id="description"
                    placeholder="Description"
                    v-model="description"
                    type="text"
                  ></textarea>
                </div>
                <div class="edit_date">
                  <div class="edit_Departure_Date">
                    <label id="label" for="Departure_Date">Old Start Date:</label>
                    <div>
                        <span>Date :</span> <span>{{oldDepartureDate}}</span>
                    </div>
                    <input
                      id="Departure_Date"
                      v-model="departuredate"
                      type="datetime-local"
                    />
                  </div>
                  <div class="edit_Arrival_Date">
                    <label id="label" for="Arrival_Date">Old End Date:</label>
                    <div>
                        <span>Date :</span> <span>{{oldArrivalDate}}</span>
                    </div>
                    <input
                      id="Arrival Date"
                      v-model="arrivaldate"
                      type="datetime-local"
                    />
                  </div>
                </div>
                <div class="edit_label">
                  <div class="label"></div>
                  <select v-model="category_id" class="edit-category">
                    <option disabled value="">Category Type</option>

                    <option
                      v-for="(category, index) in list_category"
                      :key="index"
                      :value="category.id"
                    >
                      {{ category.name }}
                    </option>
                  </select>
                  <select
                    @change="getcity(country)"
                    v-model="country"
                    class="edit-country"
                  >
                    <option disabled value="">Country</option>
                    <option
                      v-for="(country, index) in list_Contries"
                      :key="index"
                      :value="country"
                    >
                      {{ country }}
                    </option>
                  </select>
                  <select v-model="city" class="edit-city">
                    <option disabled value="">City</option>
                    <option
                      v-for="(city, index) in list_Cites"
                      :key="index"
                      :value="city"
                    >
                      {{ city }}
                    </option>
                  </select>
                  <!-- <input @change="addEventImg" type="file" placeholder="" /> -->
                </div>
                <div class="edit_button">
                  <button
                    @click.prevent="updateEvent"
                    data-bs-dismiss="modal"
                    type="add"
                  >
                    Update
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";
import json from "../myevent/json/countries.json";
import axios from "../../axios-http.js";
export default {
  props: ["allEvents"],
  data() {
    return {
        list_Location: json,
        username:localStorage.getItem("username"),
        list_Contries: [],
        list_category: [],
        list_Cites: [],
        editEvent: [],
        delete_id: null,
        startDate: this.dateFormat(this.departureDate),
        endDate: this.dateFormat(this.arrivalDate),
        pathImage: "http://eventme.com:3000/storage/EventImages/",
        pathImagePro: "http://eventme.com:3000/storage/UserProfile/",
        oldArrivalDate:'',
        oldDepartureDate:'',
        eventid:"",
        userid:localStorage.getItem('id'),
        category_id:"",
        title: "",
        description: "",
        categoryType: "",
        departuredate: "",
        arrivaldate: "",
        country: "",
        city: "",
        imageName:""
    };
  },
  methods: {
    dateFormat(date) {
      return moment(date).format("YYYY-MM-DD hh:mm:ss");
    },
    // Delete on category card
    getEvent(id) {
      console.log(id);
      for (let event of this.allEvents) {
        if (event.id === id) {
          this.editEvent = event;
          console.log(event)
        }
      }
      console.log(this.editEvent);

      this.eventid = this.editEvent.id;
      this.userid = this.editEvent.user_id;
      this.category_id = this.editEvent.category_id;
      this.title = this.editEvent.title;
      this.description = this.editEvent.description;
      this.oldDepartureDate = this.editEvent.departureDate;
      this.oldArrivalDate = this.editEvent.arrivalDate;
      this.country = this.editEvent.country;
      this.city = this.editEvent.city;
      this.getcity(this.country);
    },
    addEventImg(event) {
      this.imageName = event.target.files[0];
    },
    updateEvent() {
      this.editEvent.title = this.title;
      this.editEvent.description = this.description;
      this.editEvent.departureDate = this.departuredate;
      this.editEvent.arrivalDate = this.arrivaldate;
      this.editEvent.city = this.city;
      this.editEvent.country = this.country;
      this.editEvent.category_id= this.category_id;
      console.log(this.editEvent);
      this.$emit("update-event", this.editEvent, this.eventid);

      this.userid = "";
      this.category_id = "";
      this.title = "";
      this.description = "";
      this.departuredate = "";
      this.arrivaldate = "";
      this.country = "";
      this.city = "";
      this.imageName = "";
    },
    deleteEventAction(id) {
      console.log(id);
      this.delete_id = id;
    },
    deleteEvent(id) {
      this.$emit("delete_Event", id);
    },
    editEventAction(id) {
      this.getEvent(id);
    },
    getLocation() {
      let countries = this.list_Location;
      for (let country in countries) {
        this.list_Contries.push(country);
      }
    },
    getcity(Country) {
      let countries = this.list_Location;
      for (let country in countries) {
        if (country === Country) {
          this.list_Cites = countries[country];
        }
      }
    },
    getCategory() {
      axios.get("categories").then((res) => {
        this.list_category = res.data;
      });
    },
    getremain(listJoin){
      return 15-listJoin.length
    },
  },
  mounted() {
    this.getLocation();
    this.getCategory();
    this.username = localStorage.getItem("username");
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
  border: 1px solid orange;
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
.category-header,
.location {
  display: flex;
}
.category-header h1 {
  margin: 0;
}
.category-header h3{
  margin-top: 6px;
}
.category-header {
  justify-content: space-between;
  margin: 0px 10px;
}
.orange {
  color: orange;
}
.member {
  display: flex;
  margin-top:5px 10px;
}

img {
  width: 32.5px;
  height: 32.5px;
  border-radius: 40px;
}
.profile {
  border-radius: 40px;
  margin: 0px 5px;
  background: rgb(255, 255, 255);
  border: 1px solid orange;
  width: 32.5px;
  height: 32.5px;
}
#space {
  margin: 0px 30px;
}
#small_space {
  margin: 0px 10px;
}
.description {
  height: 90px;
}
.location,
#username {
  margin: 0;
  text-align: center;
  padding: 0;
}
.card-btn-top {
  height: 60%;
}
.group_btn {
  height: 40%;
  margin-top: 0px;
  display: grid;
}
button {
  color: white;
  border-radius: 10px;
  padding: 10px;
  margin: 10px 7px;
  background: rgba(0, 0, 0, 0.796);
  border: 1px solid orange;
}
.button:hover {
  background: orange;
  border: 2px solid white;
  color: black;
  font-weight: bold;
  padding: 12px;
  margin: 8px 0px;
}

.cancel_delete {
  display: flex;
  justify-content: center;
}
.button_cancel,
.button_delete {
  width: 100px;
  margin: 0px 20px;
  padding: 10px;
}
.button_cancel:hover,
.button_delete:hover {
  background: orange;
  color: black;
  border: 1px solid black;
}
.delete {
  background: rgba(0, 0, 0, 0.428);
}
.modal-content {
  background: rgba(255, 255, 255, 0);
  border: 1px solid orange;
  color: white;
}
.modal-body {
  text-align: center;
}

.edit-container-form {
  background: #0000009f;
  padding: 15px;
  border-radius: 10px;
  margin-top: 0px;
  border: solid 1px white;
}
.edit-container-form input,
.edit-container-form textarea,
.edit-category,
.edit-country,
.edit-city {
  width: 98.5%;
  border: none;
  border-radius: 5px;
  background: rgba(255, 255, 255, 0.61);
  margin: 5px;
  padding: 10px;
  border: solid 1px black;
}
.location {
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
::placeholder {
  text-align: center;
  color: rgb(0, 0, 0);
}
.edit_description textarea::placeholder {
  text-align: center;
}
.edit_date {
  display: flex;
}
.edit_label #label {
  display: flex;
  justify-content: center;
  color: white;
}
.edit_Departure_Date,
.edit_Arrival_Date {
  width: 49%;
}
.edit_Departure_Date {
  margin-right: 5px;
}
.edit_Arrival_Date {
  margin-left: 5px;
}

.edit_button button {
  font-size: 15px;
  margin: 5px;
  margin-top: 10px;
  width: 40%;
  height: 35px;
  border-radius: 5px;
  background: orange;
  border: 1px solid black;
}
</style>