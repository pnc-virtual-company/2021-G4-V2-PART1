<template>
  <div>
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
import Categorycard from '../components/categories/Categorycard.vue'
import Categoriesform from '../components/categories/Categoriesform.vue'
import axios from '../axios-http.js'
export default {
  components:{ 
    'category-form': Categoriesform,
    'category-card': Categorycard
  }, 
  data(){
    return{
      categoryData: [],
      error: '',
      category:'',
      path: 'categories'
    }
  },
  methods: {
    addCategory(name, id){
      let data = {
        name: name,
        user_id: id
      }
      axios.post(this.path, data)
        .then(() => {
            this.getCategories();
        })
        .catch(error => {
            console.log(error.response.data.message);
            this.error = error.response.data.message;
        });
        
    },    
    // ____________________Get_Category_______________________ //
    getCategories(){
      axios.get(this.path)
        .then(res => {
            this.categoryData = res.data;
            console.log(res.data);
        });
    },

    // ____________________Edit_Category______________________ //
    editCategory(category){
      axios.put(this.path + '/' + category.id, category).then(res => {
        console.log(res.data)
      });
    },

    // ____________________Delete_Category____________________ //
    deleteCategory(id){
      console.log(id);
      axios.delete(this.path + '/' + id).then(res => {
        this.categoryData.push(res.data);
        this.getCategories();
      });
    },

    // ____________________Search_Category____________________ //
    searchCategory(name) {
      if (name != '') {
        axios.get(this.path + "/search/" + name).then(res => {
            this.categoryData = res.data;
        })
      } else {
        this.getCategories();
      }
    },

    // ___________________Sort_Category______________________ //
    sort(){
      console.log('sorted');
      axios.get(this.path + '/sort/name').then(res => {
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
  background-image: url("../assets/category_bg.jpg");
  display: flex;
  justify-content: center;
  align-items: center;
}
.category_title{
  position:sticky;
  top: 77px;
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
