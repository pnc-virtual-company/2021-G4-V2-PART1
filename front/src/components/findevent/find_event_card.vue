<template>
  <div class="container_card">
    <div v-for="(event, index) of ListEvents" :key="index">
      <div class="event-card" v-show="event.user.firstname != username" >
        <div class="card-img">
          <img class="img" :src="this.pathImage+event.imagename" alt="photo" />
        </div>
        <div class="main-card">
          <div class="category-header">
            <h1 class="orange">{{event.title}} </h1>
            <h2 class="orange">{{event.category.name}}</h2>
          </div>
          <div class="card-body">
            <div class="description">
              <p>{{event.description}}</p>
            </div>
            <div class="date">
              <div>
                <span class="orange">Departure: </span>
                <span id="small_space"></span>
                <span> {{event.departureDate}} XX</span>
              </div>
              <div>
                <span class="orange">Arrival:</span>
                <span id="small_space"></span>
                <span>{{event.arrivalDate}} XX</span>
              </div>
            </div>
            <div class="location">
              <div>
                <span class="orange">Location: </span>
                <span>{{event.city}} , {{event.country}}</span>
              </div>
              <span id="space"> | </span>
              <div>
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
                  :src="this.pathImagePro+this.UserProfile"
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
</template>
<script>
import axios from '../../axios-http.js'
export default {
  props:['allEvents'],
  emits: ['join-event'],
  data() {
    return {
      bgProgress:'',
      widthProgress:0,
      List_Joins:[],
      ListEvents:null,
      username:localStorage.getItem("username"),
      user_id:localStorage.getItem("id"),
      UserProfile:localStorage.getItem("imgname"),
      pathImage: "http://127.0.0.1:8000/storage/EventImages/",
      pathImagePro: "http://127.0.0.1:8000/storage/UserProfile/",
    };
  },
  computed:{
    progress(){
      return{ width: this.widthProgress+'%', background: this.bgProgress}
    }
  },
  methods: {
    getEventList(){
        axios.get('events')
        .then(res=>{
          this.ListEvents= res.data;
          this.getListJoin()
        })
        .catch(error => {
          console.log(error.response.data.message);
        })
        return this.ListEvents
    },
    JoinEvent(event_id){
      let Join={
        'event_id':event_id,
        'user_id':this.user_id,
        'user_role':'member',
        'profile_path':this.UserProfile
      }
        axios.post('joinevent',Join)
        .then(res=>{
          this.getremain(res.data)
          this.getEventList()
        })
        .catch(error => {
          console.log(error.response.data.message);
        })
    },
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

    isJoin(event_id){
      for(let join of this.List_Joins){ 
        if(join.user_id == this.user_id && join.event_id == event_id){
          return true
        }
      }
      return false
    },

    getListJoin(){
      axios.get('joinevent')
        .then(res=>{
          this.List_Joins = res.data;
        })
        .catch(error => {
          console.log(error.response.data.message);
        })
    },
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
      return 15-listJoin.length
      
    },
  },
  mounted() {
    this.getListJoin();
    this.getEventList();
    // console.log(this.getEventList())
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
/* ----------- */
.category-header,
.location {
  display: flex;
}
.category-header h1,
.category-header h2 {
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
/* .location,
.date {
  margin: 20px 0px;
}
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
  border: 2px solid black;
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
}  */
</style>