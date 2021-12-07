<template>
    <div class="signup-form">
        <form class="sign-in-form" action="#">
            <div>
                <h1>Sign Up</h1>
                <div id="intro-text">
                <span>Already have account?
                    <router-link class="link" to="/signin">Sign in</router-link>
                </span>
                </div>
            </div>
            <div id="text"><b> or</b></div>
            <div>
                <hr id="hr" />
            </div>
            <div class="devide">
                <input type="text" id="left" placeholder="Firstname" required v-model="firstname"/>
                <strong class="text-danger" v-if="error.firstnameError"> {{error.firstnameError[0]}} </strong>
                <input type="text" id="right" placeholder="Lastname" v-model="lastname"/>
                <strong class="text-danger" v-if="error.lastnameError"> {{error.lastnameError[0]}} </strong>
            </div>
            <div>
                <input type="email" placeholder="Email" required v-model="email"/>
                <strong class="text-danger" v-if="error.emailError"> {{error.emailError[0]}} </strong>
            </div>
            <div>
                <input type="password" placeholder="Password" required v-model="password"/>
                <strong class="text-danger" v-if="error.passwordError"> {{error.passwordError[0]}} </strong>
            </div>
            <div>
                <input type="password" placeholder="Confirm Password" required v-model="confirm_password"/>
                <strong class="text-danger" v-if="error.confirm_passwordError"> {{error.confirm_passwordError[1]}} </strong>
            </div>
            <button id="signup-btn" @click.prevent="signUp"><router-link to="/" class="sign-up-btn"> Sign up </router-link></button>
        </form>
    </div>
</template>
<script>
export default {
    emits: ['signup'],
    inject: ['error', 'isSignup'],
    data(){
        return {
            firstname: '',
            lastname: '',
            email: '',
            password: '',
            confirm_password: '',
        }
    },
    methods: {
        signUp(){
            this.$emit('signup', this.firstname, this.lastname, this.email, this.password, this.confirm_password);
        }
    },
};
</script>
<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    .signup-form{
        border: 1px solid black;
        background: #313736c0;
        width: 350px;
        height: 100%;
        padding: 20px;
        border-radius: 10px;
        margin: auto;
        margin-top: 130px;
        font-family: 'Arial';
    }
    .signup-form h1{
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
        font-weight: bolder;
        font-weight: bold;
    }
    .link:hover{
        border-bottom: 1.5px solid rgb(0, 0, 0);
        margin-left: 7px;
    }
    .sign-up-btn{
        color: black;
        text-decoration: none;
    }
    input,button{
        background: rgba(255, 255, 255, 0.349);
        width:100%;
        margin: 5px 0px;
        padding: 7px;
        border-radius: 50px;
        border: 1px solid black;
    }
    button:hover,  input:hover{
        box-shadow: 0px 0px 16px -5px rgba(0,0,0,1);
        -webkit-box-shadow: 0px 0px -5px 0px rgba(0,0,0,1);
        -moz-box-shadow: 0px 0px 16px -5px rgba(0,0,0,1);
        background: rgba(255, 255, 255, 0.123);
    }
    .devide{
        display: flex;
        width:100%;
    }
    input[type="text"], #left{
        margin-left: 0;
        margin-right: 5px;
    }
    input[type="text"], #right{
        margin-right: 0;
        margin-left: 5px;
    }
    button:hover,  input:hover{
        box-shadow: 0px 0px 16px -5px rgba(0,0,0,1);
        -webkit-box-shadow: 0px 0px -5px 0px rgba(0,0,0,1);
        -moz-box-shadow: 0px 0px 16px -5px rgba(0,0,0,1);
        background: rgba(255, 255, 255, 0.123);
    }
    ::placeholder{
        color: black;
        text-align: center;
    }
    button{
        width:100%;
    }
    button{
    background: orange;
    }
    button:hover{
        background: rgb(185, 122, 4);
        color: white;
    }
    #hr{
        background: white;
        height: 2px;
        border: none;
        margin-top: 27px;
        margin-bottom: 15px;
    }
    #text{
        margin-left:135px;
        position:absolute;
        border-radius: 40px;
        width: 40px;
        padding: 8px;
        background: #ffffff;
    }
    #signup-btn{
        background:#FFA800;
    }
</style>
