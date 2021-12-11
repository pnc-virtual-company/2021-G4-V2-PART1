<template>
  <div class="container_card">
    <div >
      <div class="event-card" >
        <div class="card-img">
          <img class="img" src="" alt="photo" />
        </div>
        <div class="main-card">
          <div class="category-header">
            <h1 class="orange">event.title </h1>
            <h2 class="orange">event.name</h2>
          </div>
          <div class="card-body">
            <div class="description">
              <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facere deleniti harum sint maiores illo, voluptatem aperiam possimus. Temporibus earum vero esse, minus harum totam sit repellat nostrum nisi facilis architecto consectetur nulla iure quo culpa. Ex maxime suscipit veritatis placeat, amet, excepturi accusamus repudiandae incidunt, quas a earum aliquam labore!</p>
            </div>
            <div class="date">
              <div>
                <span class="orange">Departure: </span>
                <span id="small_space"></span>
                <span> event.departureDate XX</span>
              </div>
              <div>
                <span class="orange">Arrival:</span>
                <span id="small_space"></span>
                <span>arrivalDate XX</span>
              </div>
            </div>
            <div class="location">
              <div>
                <span class="orange">Location: </span>
                <span>city , country</span>
              </div>
              <span id="space"> | </span>
              <div>
                <span class="orange">Members:</span>
                <span id="small_space"></span>
                <span>15 </span>
                <span class="orange"> People.</span>
              </div>
            </div>
            <div class="progress_bar d-flex">
              <div class="member">
              <div class="profile">
                <img
                  src="https://www.directive.com/images/easyblog_shared/July_2018/7-4-18/b2ap3_large_totw_network_profile_400.jpg"
                  alt="profile"
                  />
                
              </div>
            </div>
            <div class="progress m-2 w-100 mt-4" style="height: 5px">
                <div
                  class="progress-bar bg-info"
                  role="progressbar"
                  style="width: 6.66%"
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
            <h2 id="username" class="orange">Username</h2>
          </div>
          <div class="group_btn " >
            <button class="button">Join</button>
            <button class="button">Exit</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["allEvents"],
  data() {
    return {
    };
  },
  methods: {
  },
  mounted() {
  },
};
</script>

<style scoped>
.container_card {
  margin: 10px 70px;
  border: solid 2px orange;
  border-radius:20px;
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
  margin: 10px 0px;
}
.group_btn {
  height: 40%;
  margin-top: 0px;
  display: grid;
}
.card-btn-top {
  height: 60%;
}
button {
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