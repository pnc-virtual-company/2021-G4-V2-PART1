<template>
    <nav class="navbar  navbar-light border border-dark" style='background:#242C2B'>
        <div class='nav justify-content-start w-25'>
            <img id="pro_img" v-if="username != 'Guest'" :src="this.imgpath+this.imgname" alt="">
            <img id="pro_img" v-else src="https://icon-library.com/images/user-512_10381.png" alt="">
            <h1 style='color:orange;font-weight: bold;'>{{ username }}</h1>
        </div>
        <ul class="nav justify-content-end w-75 p-1" >
            <div  class="d-flex parent-nav">
                <li v-if="username != 'Guest'" style="margin:0px 30px">
                    <router-link class='nav-link text-light font-weight-bold' to="/myevent">My events</router-link>
                </li>
                <li style="margin:0px 30px">
                    <router-link class='nav-link text-light font-weight-bold' to="/findevent">Explore Event</router-link>
                </li>
                <li style="margin:0px 30px;margin-right:40px">
                    <router-link class='nav-link active text-light font-weight-bold' to="/categories">Categories</router-link>
                </li>
            </div>
            <li>
                <router-link class="button btn border border-dark" to="/" @click="signOut" style="background:orange">Sign Out</router-link>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    emits: ['isNotHidden'],
    data(){
        return {
            username: '',
            userid: '',
            imgpath:'http://eventme.com:3000/storage/UserProfile/',
            imgname:localStorage.getItem('imgname'),
        }
    },
    methods: {
        // ________________Signout________________ //
        signOut(){
            localStorage.clear();
            this.$emit('isNotHidden', false);
        }
    },
    mounted() {
        // _______________Get username and id__________________ //
        this.username = localStorage.getItem('username');
        this.userid = localStorage.getItem('id');
    },
};
</script>

<style scoped>
    nav{
        position: sticky;
        top: 0;
        z-index: 1;
    }
    .nav-link{
        border-radius:5px;
    }
    .nav-link:hover{
        background: orange;
        
    }
    .router-link-active {
        background: orange;
    }
    #pro_img{
        border: 2px solid rgb(255, 255, 255);
        margin: 0;
        padding: 2px;
        margin-left: 20px;
        width: 60px;
        height: 60px;
        border-radius: 50px;
        margin-right: 20px;
    }
</style>
