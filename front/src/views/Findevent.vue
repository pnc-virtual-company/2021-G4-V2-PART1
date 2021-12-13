<template>
    <div>
      <div class="background">
        <div class="title1">
            <h2>Welcome To Cambodia</h2>
        </div>
      </div>
          <div class="event_title">
            <h1>Explore Event</h1>
      </div>
    <find-event-card @join-event='JoinEvent'></find-event-card>
    <!--  -->
    </div>
</template>

<script>
import find_event_card from '../components/findevent/find_event_card.vue';
export default {
 
  components: {
      // 'filter-event': filter_events,
      'find-event-card': find_event_card
    },
    data(){
      return {
        allEvents:[]
      }
    },
    provide(){
      return{
        List_events:this.allEvents
      }
    },
    methods: {
    },
    mounted() {
    }
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
  border-radius: 10px;
}
.event_view{
  display: grid;
}
</style>