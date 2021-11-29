<template>
    <div class="login-form">
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
                <input type="text" id="left" placeholder="Firstname" v-model="firstname"/>
                <span class="text-danger" v-if="error.firstnameError !== 'undefined' "> {{error.firstnameError}} </span>
                <input type="text" id="right" placeholder="Lastname" v-model="lastname"/>
                <span class="text-danger" v-if="error.lastnameError !== 'undefined' "> {{error.lastnameError}} </span>
            </div>
            <div>
                <input type="email" placeholder="Email" v-model="email"/>
                <span class="text-danger" v-if="error.emailError !== 'undefined' "> {{error.emailError}} </span>
            </div>
            <div>
                <input type="password" placeholder="Password" v-model="password"/>
                <span class="text-danger" v-if="error.passwordError !== 'undefined' "> {{error.passwordError}} </span>
            </div>
            <div>
                <input type="password" placeholder="Confirm Password" v-model="confirm_password"/>
                <span class="text-danger" v-if="error.confirm_passwordError !== 'undefined' "> {{error.confirm_passwordError}} </span>
            </div>
            <button id="sign-in-btn" @click.prevent="signUp">Sign up</button>
        </form>
    </div>
</template>

<script>
export default {
    emits: ['signup'],
    inject: ['error'],
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
        },
    },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    .login-form{
        border: 1px solid black;
        background: #B0F0EC;
        width: 350px;
        height: 100%;
        padding: 20px;
        border-radius: 10px;
        font-family: 'Arial';
        margin: auto;
        margin-top:100px;
    }
    #intro-text{
        margin-left: 10px;
        font-size: 14px;
        margin-bottom: 10px;
    }
    .link{
        text-decoration: none;
        color: rgb(201, 110, 7);
        font-weight: bolder;
    }
    input,button{
        background: rgb(211, 211, 211);
        width:100%;
        margin: 5px 0px;
        padding: 7px;
        border-radius: 50px;
        border: 1px solid black;
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
</style>
