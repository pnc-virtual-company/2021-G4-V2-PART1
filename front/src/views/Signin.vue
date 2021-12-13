<template>
    <div class="signin-form">
        <form >
            <div>
                <h1>Sign In</h1>
                <div id="intro-text">
                <span>Don't have an account yet?</span>
                    <router-link class="link" to="/signup">Sign up</router-link>
                </div>
            </div>
            <div class="form-group">
                <button> <router-link class="sign_in_as_guest" to="/myevent" @click="signInAsGuest"> without account? </router-link></button>
                <div id="text"><b> or</b></div>
                <hr id="hr" />
            </div>
            <div class="form-group">
                <input type="email" placeholder="Email" v-model="email" required/>
                <input type="password" placeholder="Password" v-model="password" required/>
                <p class="text-danger"> {{ message_error }} </p>
            </div>
            <button id='signin-btn'><router-link to="/" @click="signIn" id="sign-in-btn"> Sign In </router-link></button>
        </form>
    </div>
</template>

<script>
import axios from '../axios-http.js'
export default {
    emits: ['signin', 'isNotHidden'],
    data(){
        return{
            username: '',
            userid: '',
            email: '',
            password: '',
            message_error: '',
        }
    },
    methods: {
        // ___________________Sign_in_________________________ //
        signIn(e){
            e.preventDefault();
            let users = {
                email: this.email,
                password: this.password
            }
            axios.post('signin', users)
                .then((res) => {
                    localStorage.setItem('imgname', res.data.user.imageprofile);
                    localStorage.setItem('id', res.data.user.id);
                    localStorage.setItem('username', res.data.user.firstname);
                    this.$router.push('/myevent');
                    this.$emit('isNotHidden', true);
                    localStorage.setItem('isNotHidden', true);
                })
                .catch(error => {
                    this.message_error = error.response.data.message;
                });
        },
         // ___________________sign In As Guest______________________ //
        signInAsGuest(){
            localStorage.setItem('username', 'Guest');
            this.$emit('isNotHidden', true);
        },
    },
    mounted(){
        
    }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    .signin-form{
        border: 1px solid black;
        background: #313736c0;
        width: 300px;
        height: 100%;
        padding: 20px;
        border-radius: 10px;
        margin: auto;
        margin-top: 130px;
        font-family: 'Arial';
        box-shadow: 1px 1px 4px 4px white;
    }
    .signin-form h1{
        font-weight: bold;
        color: white;
    }
    span{
        color: white;
    }
    #intro-text{
        margin-left: 10px;
        font-size: 14px;
        margin-bottom: 10px;
    }
    .link{
        text-decoration: none;
        color: orange;
        margin-left: 5px;
        font-weight: bold;
    }
    .link:hover{
        border-bottom: 1.5px solid rgb(0, 0, 0);
        margin-left: 7px;
    }
    
    input,button{
        background: rgba(255, 255, 255, 0.349);
        width:100%;
        margin: 5px 0px;
        padding: 7px;
        border-radius: 50px;
        border: 1px solid black;
    }
    .sign_in_as_guest{
        color: black;
    }
    ::placeholder{
        color: rgba(0, 0, 0, 0.664);
        text-align: center;
    }
    button:hover,  input:hover{
        box-shadow: 0px 0px 16px -5px rgba(0,0,0,1);
        -webkit-box-shadow: 0px 0px -5px 0px rgba(0,0,0,1);
        -moz-box-shadow: 0px 0px 16px -5px rgba(0,0,0,1);
        background: rgba(255, 255, 255, 0.123);
    }
    #sign-in-btn{
        color: black;
        text-decoration: none;
    }
    #hr{
        color: white;
        height: 2px;
        border: none;
        margin:18px 5px;
    }
    #text{
        margin-left:110px;
        position: absolute;
        border-radius: 40px;
        width: 38px;
        padding:7px 8px;
        background: rgb(255, 255, 255);
        color:black
    }
    #signin-btn{
        background:#FFA800;
    }
    p{
        text-align: center;
        font-size: 12px;
    }
</style>
