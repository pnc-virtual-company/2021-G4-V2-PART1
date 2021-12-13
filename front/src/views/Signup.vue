<template>
    <div class="signup-form">
        <form class="sign-in-form" action="#">
            <div class="header">
                <div id='header-left'>
                    <h1>Sign Up</h1>
                    <div id="intro-text">
                        <span>Already have account?
                            <router-link class="link" to="/signin">Sign in</router-link>
                        </span>
                    </div>
                </div>
                <div id='header-right'>
                    <img id="pro_img" :src="imageView" alt="">
                </div>
            </div>
            <div id="text"><b> or</b></div>
            <div>
                <hr id="hr" />
            </div>
            <div class="devide">
                <input type="text" id="left" placeholder="Firstname" required v-model="firstname"/>
                <p class="text-danger" v-if="error.firstnameError"> {{error.firstnameError[0]}} </p>
                <input type="text" id="right" placeholder="Lastname" v-model="lastname"/>
                <p class="text-danger" v-if="error.lastnameError"> {{error.lastnameError[0]}} </p>
            </div>
            <div>
                <input type="email" placeholder="Email" required v-model="email"/>
                <p class="text-danger" v-if="error.emailError"> {{error.emailError[0]}} </p>
            </div>
            <div>
                <input type="password" placeholder="Password" required v-model="password"/>
                <p class="text-danger" v-if="error.passwordError"> {{error.passwordError[0]}} </p>
            </div>
            <div>
                <input type="password" placeholder="Confirm Password" required v-model="confirm_password"/>
                <p class="text-danger" v-if="error.confirm_passwordError"> {{error.confirm_passwordError[1]}} </p>
            </div>
            <div class="choose-file d-flex ml-2">
              <label for="photo">
                  <i class="fa fa-image text-warning  m-2" style="font-size: 26px; " aria-hidden="true"></i>
              </label>
                <input id="photo" class="d-none" type="file" name='file' @change="setProfile" accept="image/*">
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
            img_pro:'',
            file_name:'',
            imageView: 'https://icon-library.com/images/user-512_10381.png',
        }
    },
    methods: {
         // ___________________set profile______________________ //
        setProfile(event) {
            this.img_pro = event.target.files[0];
            this.imageView = URL.createObjectURL(this.img_pro);
            },
         // ___________________singup______________________ //
        signUp(){
            let newuser = new FormData();
            newuser.append('firstname',this.firstname);
            newuser.append('lastname',this.lastname);
            newuser.append('email',this.email);
            newuser.append('password',this.password);
            newuser.append('password_confirmation',this.confirm_password);
            newuser.append('imageprofile',this.img_pro);
            this.$emit('signup',newuser);
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
        box-shadow: 1px 1px 4px 4px white;
    }
    .signup-form h1{
        font-weight: bold;
        color: white;
    }
    .header{
        display: flex;
    }
    #header-left{
        width: 70%;
    }
    #header-right{
        width: 30%;
    }
    #pro_img{
        border: 2px solid rgb(255, 255, 255);
        margin-left: 20px;
        width: 80px;
        height: 80px;
        border-radius: 50px;
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
    p{
        font-size: 12px;
        text-align: center;
    }
</style>
