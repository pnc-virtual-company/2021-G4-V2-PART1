<template>
    <section>
        <router-view @categories='Categories' @signup="addUser"></router-view>
    </section>
</template>

<script>
import axios from 'axios';
const URL = "http://127.0.0.1:8000/api/";
export default {
  data(){
    return {
        categories:[],
      error: {
        firstnameError: '',
        lastnameError: '',
        emailError: '',
        passwordError: '',
        confirm_passwordError: ''
      },
      isSignup: ''
    }
  },
  provide(){
    return {
      list_category:this.categories,
      error: this.error,
      isSignup: this.isSignup
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
      axios.post(URL+'signup', data)
        .then((res) => {
          console.log(res.data);
          localStorage.setItem('username', firstname);
          localStorage.setItem('id', res.data.user.id);
          this.isSignup = this.$router.push('/');
        })
        .catch(error => {
          console.log(error.response.status)
          if (error.response.status === 422) {
            this.error.firstnameError = error.response.data.errors.firstname;
            this.error.lastnameError = error.response.data.errors.lastname;
            this.error.emailError = error.response.data.errors.email;
            this.error.passwordError = error.response.data.errors.password;
            this.error.confirm_passwordError = error.response.data.errors.password;
            this.isSignup = this.$router.push('/signup');
          }
        });
    },
    Categories(Categories){
      console.log(Categories);
      this.categories = Categories;
    }

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
