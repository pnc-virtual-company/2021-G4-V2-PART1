<template>
  <header>
    <div class="wrapper" v-if="username != 'Guest'">
        <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">+Add Categories</button>
        <div class="modal fade" id="staticBackdrop">
          <div class="modal-dialog">
            <div class="modal-content"> 
              <div class="modal-body">
                <input type="text" placeholder="Name" v-model="categoryName"/>
                <strong class="text-danger"> {{ errorAlert }} </strong>
                <button class="buttonadd" role="button" data-bs-dismiss="modal" @click.prevent="emitCategories">+Add</button>
              </div>
            </div>
          </div>
        </div>
    </div>
  </header>
</template>

<script>
export default {
    emits: ['categoryName'],
    props: ['errorAlert'],
    data(){
      return {
        categoryName: '',
        userid: localStorage.getItem('id'),
        username: localStorage.getItem('username')
      }
    },
    methods: {
      emitCategories() {
        this.$emit("categoryName", this.categoryName, this.userid);
      },
    },
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