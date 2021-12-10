<template>
    <nav class="navbar  navbar-light border border-dark" style='background:#242C2B'>
        <div class='nav justify-content-start w-25'>
            <h1 style='color:orange;font-weight: bold;'>{{ username }}</h1>
        </div>
        <ul class="nav justify-content-end w-75 p-1" >
            <div  class="d-flex parent-nav">
                <li style="margin:0px 30px">
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
</style>
