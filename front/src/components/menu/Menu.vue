<template>
    <nav class="navbar  navbar-light border border-dark text-dark light" style='background:#B0F0EC'>
        <div class='nav justify-content-start w-25'>
            <h1>{{ username }}</h1>
        </div>
        <ul class="nav justify-content-end w-75 p-3 ">
            <li>
                <router-link class='nav-link active text-dark font-weight-bold' to="/myevent">My events</router-link>
            </li>
            <li class="nav-item mr-2 ml-2">
                <router-link class='nav-link active text-dark font-weight-bold' to="/findevent">Find Event</router-link>
            </li>
            <li class="nav-item dropdown font-weight-bold">
                <router-link class='nav-link active text-dark font-weight-bold' to="/categories">Categories</router-link>
            </li>
            <li>
                <router-link class="button btn btn-info border border-dark" to="/" @click="signOut">Sign Out</router-link>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    data(){
        return {
            username: '',
            userid: ''
        }
    },
    mounted() {
        this.username = localStorage.getItem('username');
        this.userid = localStorage.getItem('id');
    },
    methods: {
        signOut(){
            localStorage.clear();
        }
    }
};
</script>

<style>

</style>
