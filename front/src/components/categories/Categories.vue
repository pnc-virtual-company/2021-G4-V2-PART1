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
    <category-form></category-form> 
    <category-card></category-card>
    <category-card></category-card>
    <category-card></category-card>
    <category-card></category-card>
  </div>

  
</template>

<script>
import Menu from '../menu/Menu.vue'
export default {
  components:{ Menu}, 
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
