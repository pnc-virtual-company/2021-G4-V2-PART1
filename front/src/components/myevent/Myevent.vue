<template>
  <div>
    <Menu></Menu>
    <div class="background">
      <div class="title1">
          <h2>Welcome To Cambodia</h2>
      </div>
    </div>
        <div class="event_title">
          <h1>My Event</h1>
    </div>
    <div class="event_view">
      <event-form @add-event='add_Event'></event-form>
    <!-- <div class="card_events"> -->
      <event-card 
      @delete_Event='deleteEvent'
        v-for="(event,index) in allEvents" 
        :key='index' 
        :eventId='event.id' 
        :userId='event.user_id' 
        :cateId='event.category_id'
        :title='event.title'
        :description='event.description'
        :departureDate='event.departureDate'
        :arrivalDate='event.arrivalDate'
        :country='event.country'
        :city='event.city'
        :img='event.imagename'
        :firstName='event.firstname'
        :categoryName='event.name'
        :event='event'
      ></event-card>
    </div>
  <!-- </div> -->
    </div>
</template>

<script>
import axios from 'axios';
import Menu from '../menu/Menu.vue';
const URL = "http://127.0.0.1:8000/api/";
export default {
  components:{ Menu}, 
  data(){
    return {
      allEvents:[],
    }
  },
  methods: {
    add_Event(new_event){
      console.log('yes')
      let data = new_event;
      axios.post(URL + 'events', data)
        .then(res => {
            console.log(res.data);
            this.getEvents();
        })
        .catch(error => {
            console.log(error.response.data.message);
            this.error = error.response.data.message;
        });
      
    },
    getEvents(){
      axios.get(URL+'events')
      .then(res=>{
        this.allEvents = res.data;
      })
      
    },
    deleteEvent(id){
          console.log(id);
          axios.delete(URL+'events/'+ id).then(res => {
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
  background-image: url("../../assets/category_bg.jpg");
  display: flex;
  justify-content: center;
  align-items: center;
}
.event_title{
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

