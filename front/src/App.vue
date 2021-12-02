<template>
    <section>
        <router-view @signup="addUser"></router-view>

    </section>
</template>
<script>
import axios from 'axios';
export default {
  data(){
    return {
      error: {
        firstnameError: '',
        lastnameError: '',
        emailError: '',
        passwordError: '',
        confirm_passwordError: ''
      }
    }
  },
  provide(){
    return {
      error: this.error
    }
  },
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
        })
        .catch(error => {
          this.error.firstnameError = error.response.data.errors.firstname;
          this.error.lastnameError = error.response.data.errors.lastname;
          this.error.emailError = error.response.data.errors.email;
          this.error.passwordError = error.response.data.errors.password;
          this.error.confirm_passwordError = error.response.data.errors;
        });
    },
  }
}
</script>

<style scoped>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

</style>
