<template>
  <header>     
    <div class="wrapper">
        <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">+Add Categories</button>

        <div class="modal fade" id="staticBackdrop">
          <div class="modal-dialog">
            <div class="modal-content"> 
              <div class="modal-body">
                <input type="text" placeholder="Category Name" />
                <button class="buttonadd" role="button" data-bs-dismiss="modal">+Add</button>
              </div>
            </div>
          </div>
        </div>
        
    </div>
  </header>
</template>


<style scoped>
  
  .btn {
    background: #f7a223;
    margin-left: 75%;
    border-radius: 10%;
    
  }
  button{
    margin-top: 300px;
  }
  .modal{
    width: 20%;
    margin: auto;
    margin-left: 40%;
  }
  .modal-content{
    background-color: rgba(49, 48, 48, 0.219);
    margin-top: 150%;
  }
  .buttonadd {
    background: #f7a223;
    margin: 0%;
    margin-top: 5%;
    border-radius: 10%;
  }
  input{
    width: 100%;
    text-align: center; 
  }

  @media (max-width: 880px) {
    .wrapper {
      display: block;
    }
  }

</style>