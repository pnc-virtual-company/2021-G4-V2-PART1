<template>
    <div class="login-form">
        <form class="sign-in-form">
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
            <input type="text" id="left" placeholder="Firstname" />
            <input type="text" id="right" placeholder="Lastname" />
        </div>
        <div>
            <input type="email" placeholder="Email" />
        </div>
        <div>
            <input type="password" placeholder="Password" />
        </div>
        <div>
            <input type="password" placeholder="Confirm Password" />
        </div>
        <button id="sign-in-btn">Sign up</button>
        </form>
    </div>
</template>

<script>
export default {};
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



