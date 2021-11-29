<template>
    <section>
        <router-view @signup="addUser"></router-view>
    </section>
</template>

<script>
import axios from 'axios';

export default {
  methods: {
    addUser(firstname, lastname, email, password, confirm_password){
      let data = {
        firstname: firstname,
        lastname: lastname,
        email: email,
        password: password,
        password_confirmation: confirm_password
      }
      axios.post('http://eventme.com:3000/api/signup', data)
        .then((res) => {
          console.log(res.data);
        });
    }
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
</style>
