<template>
  <header>
    <div class="search">
      <input type="search" class="search_input" placeholder="Search ..." v-model="search" @keyup="searchCategory">
      <i class="fas fa-search"></i>
    </div>
    <div class="wrapper" v-if="username != 'Guest'">
        <div class="sort_add">
          <button class="btn" id="sort" @click="sortCategory">Sort</button>
          <button class="btn" id="add" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">+Add Categories</button>
        </div>
        <div class="modal fade" id="staticBackdrop">
          <div class="modal-dialog">
            <div class="modal-content"> 
              <div class="modal-body">
                <input type="text" placeholder="Name" v-model="categoryName"/>
                <strong class="text-danger text-center"> {{ errorAlert }} </strong>
                <button class="buttonadd" role="button" data-bs-dismiss="modal" @click.prevent="addCategories">+Add</button>
              </div>
            </div>
          </div>
        </div>
    </div>
  </header>
</template>

<script>
export default {
    emits: ['categoryName', 'search_category', 'sort_category'],
    props: ['errorAlert'],
    data(){
      return {
        categoryName: '',
        userid: localStorage.getItem('id'),
        username: localStorage.getItem('username'),
        search: '',
      }
    },
    methods: {
      // Add______________________________________ //
      addCategories() {
        this.$emit("categoryName", this.categoryName, this.userid);
        this.categoryName = ''
      },

      // Search___________________________________ //
      searchCategory() {
          this.$emit('search_category', this.search);
      },

      // Sort_____________________________________ //
      sortCategory() {
        this.$emit('sort_category');
        console.log('Yes');
      }
    },
}
</script>

<style scoped>
  .search{
    display: flex;
    width: 50%;
    margin-left: 25%;
    margin-top: 40px;
    color: white;
  }
  .search_input{
    height: 40px;
    border-radius: 7px;
    text-align: center;
    border: 2px solid orange;
    background: #313736;
    color: orange;
  }
  .search_input::placeholder{
    color: white;
  }
  i{
    display: flex;
    justify-content: center;
    align-items: center;
    background: orange;
    height: 40px;
    width: 60px;
    color: white;
    border-radius: 7px;
    margin-left: 5px;
  }
  i:hover{
    cursor: pointer;
    color: black;
  }
  .sort_add{
    display: flex;
    justify-content: space-between;
  }
  .sort_add .btn {
    background: #f7a223;
    float:right;
    font-weight: bold;
    height: 50px;
    border-radius: 10px;
  }
  .sort_add button{
    margin: 30px;
  }
  .wrapper>.btn {
    background: #f7a223;
    float:right;
    font-weight: bold;
    height: 50px;
    border-radius: 10px;
  }
  .wrapper>button{
    margin: 30px;
  }
  .modal{
    width: 250px;
    margin: auto;
  }
  .modal-content{
    background-color: rgba(24, 22, 22, 0.507);
    margin-top: 85%;
    border:solid 1px white;
  }
  .sort_add #add{
    color: white;
    margin-right: 5%;
  }
  .sort_add #add:hover{
    color: black;
  }
  .sort_add #sort{
    color: white;
    margin-left: 5%;
    width: 7%;
  }
  .sort_add #sort:hover{
    color: black;
  }
  .buttonadd {
    background: #f7a223;
    margin-top: 10px;
    margin-left: 47px;
    margin-bottom: 0;
    padding: 4px 40px;
    border-radius: 5px;
    border: none;
    text-align: center;
    font-weight: bold;
  }
  input {
    width: 100%;
  }
  input[type="text"] {
    background-color: rgba(163, 157, 157, 0.507);;
    text-align: center;
    border-radius: 10px;
    height: 40px;
  }
  ::placeholder {
    color: black;
  }
  strong{
    font-size: 10px;
    text-align: center;
  }
</style>