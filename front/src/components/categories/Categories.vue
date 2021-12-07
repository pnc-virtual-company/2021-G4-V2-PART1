<template>
  <div>
    <Menu></Menu>
    <div class="background">
      <div class="title1">
          <h2>Welcome To Cambodia</h2>
      </div>
    </div>
    <div class="category_title">
          <h1>CATEGORY</h1>
    </div>
    <category-form @categoryName="addCategory" :errorAlert="error" @search_category="searchCategory" @sort_category="sort"></category-form> 
    <category-card @edit_category="editCategory"  @delete_category="deleteCategory" :categories="categoryData" :name='category.name' :category='category'></category-card>
  </div>
</template>

<script>
const URL = "http://eventme.com:3000/api/";
import axios from 'axios';
import Menu from '../menu/Menu.vue';
export default {
  components:{ Menu }, 
  data(){
    return{
      path:'categories',
      categoryData: [],
      error: '',
      category:'',
      // search_found: ''
    }
  },
  methods: {
    // __________________Create_Category_______________________ //
    addCategory(name, id){
      let data = {
        name: name,
        user_id: id
      }
      axios.post(URL +this.path, data)
        .then(res => {
            console.log(res.data);
            this.getCategories();
        })
        .catch(error => {
            this.error = error.response.data.message;
        });
    },
    
    // ____________________Get_Category_______________________ //
    getCategories(){
      axios.get(URL + this.path)
        .then(res => {
            this.categoryData = res.data;
        });
    },

    // ____________________Edit_Category______________________ //
    editCategory(category){
      axios.put(URL + this.path +'/' + category.id, category).then(res => {
        console.log(res.data)
      });
    },

    // ____________________Delete_Category____________________ //
    deleteCategory(id){
      console.log(id);
      axios.delete(URL + this.path + '/' + id).then(res => {
        console.log(res.data);
        window.location.reload();
      });
    },

    // ____________________Search_Category____________________ //
    searchCategory(name) {
      if(name !== '') {
        axios.get(URL + this.path + "/search/" + name).then(res => {
            this.categoryData = res.data;
        })
      }else {
        this.getCategories();
      }
    },

    // ___________________Sort_Category______________________ //
    sort(){
      console.log('sorted');
      axios.get(URL + this.path + '/sort/name').then(res => {
        this.categoryData = res.data;
      });
    }
  },
  mounted() {
    this.getCategories();
  },
};
</script>

<style scoped>
.background{
  width: 100%;
  height:550px;
  background-image: url("../../assets/category_bg.jpg");
  display: flex;
  justify-content: center;
  align-items: center;
}
.category_title{
  background: #000;
  padding:10px;
  display: flex;
  justify-content: center;
}
h1{
  margin-top: 10px;
  border-radius: 10px;
  width: 300px;
  padding: 10px;
  display: flex;
  justify-content: center;
  background: orange;
  color: white;
  font-weight: bold;
}
.title1 h2{
  color: white;
  font-weight: bold;
  font-size: 4rem;
}
</style>
