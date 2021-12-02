<template>
  <header>     
    <div class="wrapper">
        <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">+Add Categories</button>
        <div class="modal fade" id="staticBackdrop">
          <div class="modal-dialog">
            <div class="modal-content"> 
              <div class="modal-body">
                <input type="text" placeholder="Name" v-model="categoryName"/>
                <button class="buttonadd" role="button" data-bs-dismiss="modal" @click.prevent="addCategory">+Add</button>
              </div>
            </div>
          </div>
        </div>  
    </div>
  </header>
</template>

<script>
const URL = "http://eventme.com:3000/api/";
import axios from 'axios';
export default {
    data(){
        return {
            categoryName: '',
            // error: ''
        }
    },
    methods: {
        addCategory(categoryName){
            axios.post(URL + 'categorys', categoryName)
                .then(res => {
                    console.log(res.data);
                })
                .catch(error => {
                    if (error.response.status === 422){
                        console.log(error.response.data.message);
                    }
                });
        },
        getCategory(){
            axios.get(URL + 'categorys')
                .then(res => {
                    console.log(res.data);
                });
        }
    },
    mounted(){
        this.getCategory();
    }
}
</script>

<style scoped>
  .btn {
    background: #f7a223;
    float:right;
    font-weight: bold;
    height: 50px;
    border-radius: 10px;
  }
  button{
    margin: 30px;
  }
  .modal{
    width: 250px;
    margin: auto;
  }
  .modal-content{
    background-color: rgba(24, 22, 22, 0.507);
    margin-top: 128%;
    border:solid 1px white;
  }
  .buttonadd {
    background: #f7a223;
    margin-top: 25px;
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
</style>