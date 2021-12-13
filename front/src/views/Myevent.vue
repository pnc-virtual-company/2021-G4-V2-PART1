<template>
  <div>
    <div class="background">
      <div class="title1">
          <h2>Welcome To Event me!</h2>
      </div>
    </div>
    <div class="event_title">
      <h1>My Event</h1>
    </div>
    <div class="event_view">
      <event-form @add-event='add_Event'></event-form>
      <event-card @delete_Event='deleteEvent' @update-event='updateEvent' :allEvents='allEvents'></event-card>
    </div>
    </div>
</template>

<script>

import event_card from '../components/myevent/event_card.vue'
import Eventform from '../components/myevent/Eventform.vue'
import axios from '../axios-http.js';
export default {
  components:{ 
    'event-form': Eventform,
    'event-card': event_card
  }, 
  data(){
    return {
      UserProfile:localStorage.getItem("imgname"),
      user_id:localStorage.getItem("id"),
      newEvent_id:'',
      allEvents:[],
      event_error: {
        title_error: '',
        description_error: '',
        arrivalDate_error: '',
      }
    }
  },
  provide(){
    return {
      eventError: this.event_error,
    }
  },
  methods: {
     // ___________________get_event______________________ //
    getEvents(){
      axios.get('events')
      .then(res=>{
        this.allEvents = res.data;
      })
      .catch(error => {
        console.log(error.response.data.message);
      })
    },
 // ___________________add_event______________________ //
    add_Event(new_event){
      let data = new_event;
      
      axios.post('events', data)
        .then(res => {
            console.log(res.data);
            this.newEvent_id = res.data.data.id;
            console.log(this.newEvent_id);
            this.getEvents();
            let Join={
              'event_id':this.newEvent_id,
              'user_id':this.user_id,
              'user_role':'creator',
              'profile_path':this.UserProfile
            }
            axios.post('joinevent',Join)
              .then(res=>{
                console.log(res.data);
              })
              .catch(error => {
                console.log(error.response.data.message);
              })

        })
        .catch(error => {
            console.log(error.response.data.message);
            if (error.response.status === 422){
              this.event_error.title_error = error.response.data.errors.title;
              this.event_error.description_error = error.response.data.errors.description;
              this.event_error.arrivalDate_error = error.response.data.errors.arrivalDate;
            }
        });
    },
 // ___________________update event______________________ //
    updateEvent(update_event,id){
      let data = update_event;
      console.log(data);
      axios.put('events/'+id, data)
        .then(res => {
            console.log(res.data);
            this.getEvents();
        })
        .catch(error => {
            console.log(error.response.data.message);
        });
    },
 // ___________________delete event______________________ //
    deleteEvent(id){
          console.log(id);
          axios.delete('events/'+ id).then(res => {
            this.allEvents.push(res.data);
            this.getEvents();
          });
        },
        
  },
  mounted() {
    this.getEvents();
  },
};
</script>

<style scoped>
.background{
  width: 100%;
  height:550px;
  background-image: url("../assets/category_bg.jpg");
  display: flex;
  justify-content: center;
  align-items: center;
}
.event_title{
  position:sticky;
  top: 77px;
  background: #000;
  padding:10px;
  display: flex;
  justify-content: center;
}
h1{
  margin-top: 10px;
  border-radius: 10px;
  width: 300px;
  padding: 10px;
  display: flex;
  justify-content: center;
  background: orange;
  color: white;
  font-weight: bold;
}
.title1 h2{
  color: white;
  font-weight: bold;
  font-size: 4rem;
}
event-form{
  display: flex;
  justify-content: center;
  height: 200px;
}
.card_events{
  padding: 0px;
  /* border: 2px solid white; */
  border-radius: 10px;
/* margin-top: 100px; */
}
.event_view{
  display: grid;
}
</style>

