<template>
    <div class="login-form">
        <form class="sign-in-form">
            <div>
                <h1>Sign In</h1>
                <div id="intro-text">
                <span>Don't have an account yet?</span>
                    <router-link class="link" to="/signup">Sign up</router-link>
                </div>
            </div>
            <div class="form-group">
                <button>Go without account?</button>
                <div id="text"><b> or</b></div>
                <hr id="hr" />
            </div>
            <div class="form-group">
                <input type="email" placeholder="Email" v-model="email" required/>
                <input type="password" placeholder="Password" v-model="password" required/>
                <strong class="text-danger"> {{message_error}} </strong>
            </div>
            <button id="sign-in-btn"><router-link to="/" class="sign-in-btn" @click="signIn"> Sign In </router-link></button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data(){
        return{
            email: '',
            password: '',
            message_error: ''
        }
    },
    methods: {
        signIn(e){
            e.preventDefault();
            let users = {
                email: this.email,
                password: this.password
            }
            axios.post('http://eventme.com:3000/api/signin', users)
                .then((res) => {
                    console.log(res.data);
                    this.$router.push('/menu');
                })
                .catch(error => {
                    this.message_error = error.response.data.message;
                });
        }   
    }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    .login-form{
        border: 1px solid black;
        background: #B0F0EC;
        width: 300px;
        height: 100%;
        padding: 20px;
        border-radius: 10px;
        margin: auto;
        margin-top: 100px;
        font-family: 'Arial';
    }
    #intro-text{
        margin-left: 10px;
        font-size: 14px;
        margin-bottom: 10px;
    }
    .link{
        text-decoration: none;
        color: rgb(201, 110, 7);
        font-weight: bold;
    }
    .sign-in-btn{
        color: black;
        text-decoration: none;
    }
    input,button{
        background: rgb(255, 239, 239);
        width:100%;
        margin: 5px 0px;
        padding: 7px;
        border-radius: 50px;
        border: 1px solid black;
    }
    input:hover{
        background: white;
    }
    ::placeholder{
        text-align: center;
    }
    button{
        width:100%;
    }
    button{
    background: #5fb6b6;
    }
    button:hover{
        background: #3d7575;
        color: white;
    }
    #hr{
        background: #000;
        height: 1px;
        border: none;
        margin:18px 0px;
    }
    #text{
        margin-left:110px;
        position: absolute;
        border-radius: 40px;
        width: 38px;
        padding: 8px;
        background: white;
    }
</style>
