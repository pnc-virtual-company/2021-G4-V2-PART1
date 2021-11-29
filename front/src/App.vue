<template>
  <section>
    <Menu v-show="isSignin"></Menu>
    <router-view @add-user='Adduser'></router-view>

  </section>
</template>

<script>
import Menu from './components/menu/Menu.vue';
export default {
  components:{Menu},
  data() {
    return {
      isSignin:false,
      users:[
        {id:1,firstname:'bunsal',lastname:'hul',email:'bunsal@gmail.com',password:'123A123'},
        {id:2,firstname:'sara',lastname:'vey',email:'sara@gmail.com',password:'123B123'},
        {id:3,firstname:'sreyhon',lastname:'khim',email:'sreyhon@gmail.com',password:'123A123'}
      ]
    };
  },
  methods: {
    Issignin(){
      let signIn = localStorage.getItem('username');
      if(signIn!=""){
      this.isSignin = !this.isSignin;
      }
    },
    Adduser(firstname,lastname,email,password){
      let username = firstname + ' ' + lastname
      let user = {
        'firstname':firstname,
        'lastname':lastname,
        'email':email,
        'password':password
      };
      // localstorage.setItem("username",username)
      this.users.push(user);
    }
  },
  provide(){
    return{users:this.users}
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
