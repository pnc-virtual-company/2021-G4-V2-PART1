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
    <event-form></event-form>
    <event-card></event-card>
  </div>
</template>

<script>
import Menu from '../menu/Menu.vue';
export default {
  components:{ Menu}, 
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
  justify-content: end;

}
</style>

