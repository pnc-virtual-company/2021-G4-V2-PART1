<template>
    <nav class="navbar  navbar-light border border-dark text-dark light" style='background:#B0F0EC'>
        <div class='nav justify-content-start w-25'>
            <h1>Username</h1>
        </div>
        <ul class="nav justify-content-end w-75 p-3 ">
            <li class="nav-item mr-3 ml-2">
                <router-link class='nav-link active text-dark font-weight-bold' to="/myevent">My events</router-link>
            </li>
            <li class="nav-item mr-2 ml-2">
                <router-link class='nav-link active text-dark font-weight-bold' to="/findevent">Find Event</router-link>
            </li>
            <li class="nav-item dropdown font-weight-bold">
                <router-link class='nav-link active text-dark font-weight-bold' to="/categories">Categories</router-link>
            </li>
            <li>
                <router-link class="button btn btn-info border border-dark" to="/signin">Sign Out</router-link>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    data(){
        return {
            // username:localstorage.getItem('username')

        }
    },
    methods:{
        submitData(){
            console.log(this.firstname, this.lastname, this.email, this.password,this.confirmpassword)
            if(this.password===this.confirmpassword){
                this.$emit(
                    "add-user",
                    this.firstname,
                    this.lastname,
                    this.email,
                    this.password
                );
            }
            else{
                this.mss="Your Password doesn't match!"
            }
            
        }
    }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.button{
    border-radius: 40px;
}
</style>
