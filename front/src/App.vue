<template>
    <section>
        <navbar v-if="isNotHidden" @isNotHidden="navHidden"></navbar>
        <router-view @signup="addUser" @isNotHidden="navHidden"></router-view>
    </section>
</template>

<script>
import axios from './axios-http.js'
import Menu from './components/menu/Menu.vue';
export default {
  components: {
    'navbar':Menu,
  },
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
      isSignup: '',
      isNotHidden: false,
    }
  },
  provide(){
    return {
      error: this.error,
      isSignup: this.isSignup,
    }
  },
  methods: {
    navHidden(isHidden){
      console.log(isHidden);
      this.isNotHidden = isHidden;
    },
    // _____________________Add new user to database_________________________ //
    addUser(data){
      let userdata = data;
      console.log(data.get('password','password_confirmation'));
      axios.post('signup', userdata)
        .then((res) => {
          console.log(res.data);
          localStorage.setItem('username', userdata.firstname);
          localStorage.setItem('id', res.data.user.id);
          this.isSignup = this.$router.push('/');
        })
        .catch(error => {
          console.log(error)
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
  },
  mounted(){
    this.isNotHidden = localStorage.getItem('isNotHidden');
    // localStorage.clear();
    // console.log('yes')
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
