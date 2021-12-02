<template>
     <div class="category-card">
          <div class="category_title">
              <h3>{{title}}</h3>
          </div>
          <div class="group_button">
              <button class="category-btn">Delete</button>
              <button class="category-btn">Edit</button>
          </div>
      </div>
</template>

<script>
    export default {
        data() {
            return {
                title:"hello"
            }
        },
        
    }

</script>

<style scoped>
 body{
      background: rgba(0, 0, 0, 0.493);
  }
  .category-card{
      margin: 20px;
      height: 65px;
      width: 90%;
      display: flex;
      margin-left: 5%;
      background: rgba(0, 0, 0, 0.582);
      border-radius: 5px;
      border: solid 1px rgb(255, 255, 255);
  }
  .category_title{
      color: orange;
      margin-left: 30px;
      margin-top: 15px;
      width: 30%;
  }
  h3{
      font-weight: bold;
  }
  .group_button{
      display: none;
  }
  .category-card:hover{
    
     margin-left: 4%;
     box-shadow: 0px 3px 18px 4px orange;
    -webkit-box-shadow: 0px 3px 18px 4px orange;
    -moz-box-shadow: 0px 3px 18px 4px orange;
  }
    .category-card:hover .group_button{
        margin: 0;
        padding: 0;
        display: flex;
        width: 70%;
        justify-content: end;
        cursor: pointer;
    }
  .category-card 
  .category-btn{
      color: white;
      cursor: pointer;
      padding: 10px 20px;
      margin:10px ;
      background: rgba(0, 0, 0, 0.644);
      border: solid 1px orange;
      border-radius: 5px;
      height: 7vh;
  }
  .title h1 {
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: auto;
    width: 30%;
    background: orange;
    border: solid 1px rgb(255, 255, 255);
    border-radius: 5px;
    height: 12vh;
    margin-bottom: 40px;
    margin-top: 80px;
  }
  .title{
    margin: 20px 0;
  }
</style>