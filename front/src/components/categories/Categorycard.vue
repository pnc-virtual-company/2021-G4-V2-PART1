<template>
    <section>
        <div class="category-card" v-for="(category, index) of categories" :key="index">
            <div class="category_title">
                <h3>{{ category.name }}</h3>
                <span v-if="category.user_id != userid"> Created By : {{ category.firstname }} </span>
                <span v-else> Created By : You </span>
            </div>
            <div class="group_button" v-show="category.user_id == userid && username != 'Guest'">
                <button class="btn category-btn" type="button" data-bs-toggle="modal" data-bs-target="#deleteCategory"  @click="deleteCategoryAction(category.id)">Delete</button>
                <button class="btn category-btn" type="button" data-bs-toggle="modal" data-bs-target="#editcategory" @click='editCategory(category.id)'>Edit</button>
            </div>
        </div>
        <!-- Update -->
        <div class="wrapper">
            <div class="modal fade" id="editcategory">
                <div class="modal-dialog">
                    <div class="modal-content"> 
                        <div class="modal-body">
                            <input type="text" v-model="cate_title" placeholder="Name"/>
                            <button class="buttonadd" role="button" data-bs-dismiss="modal" @click='updateCategory'>Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Delete -->
        <div class="wrapper delete">
            <div class="modal fade delete delete_modal" id="deleteCategory">
                <div class="modal-dialog">
                    <div class="modal-content"> 
                        <div class="modal-body modal_delete">
                            <h4>Delete a category ?</h4>
                            <hr />
                            <strong>Are you sure you want to delete this category ?</strong>
                            <hr />
                            <div class="cancel_delete">
                                <button class="button_cancel" role="button" data-bs-dismiss="modal">Cancel</button>
                                <button class="button_delete" role="button" data-bs-dismiss="modal" @click="deleteCategory(delete_id)">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        emits: ['edit_category', 'delete_category'],
        props: ['categories'],
        data(){
            return{
                cate_title:'',
                category:'',
                username: localStorage.getItem('username'),
                userid: localStorage.getItem('id'),
                delete_id: null,
            }
        },
        methods: {
            // Edit and Update__________________________ //
            editCategory(id){
                for (let category of this.categories){
                    if(category.id === id){
                        this.category = category
                        this.cate_title = category.name
                    }
                }
            },
            updateCategory(){
                this.category.name = this.cate_title;
                console.log(this.category.name)
                this.$emit('edit_category', this.category)
            },

            // Delete____________________________________ //
            deleteCategoryAction(id){
                this.delete_id = id;
            },
            deleteCategory(id){
                this.$emit("delete_category", id);
            },
        }
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
    .category-btn:hover{
        background: orange;
        color: black;
        border: 1px solid white;
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
    span{
        color:orange;
        font-size: 10px;
    }

    /* Edit modal */
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
        margin-top: 85%;
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
    .delete_modal{
        width: 300px;
        margin: auto;
    }
    .modal_delete{
        color: white;
    }
    .modal_delete hr {
        color: white;
    }
    .delete{
        width: 20%;
        overflow: hidden;
    }
    .cancel_delete{
        display: flex;
        justify-content: center;
    }
    .cancel_delete button{
        margin: 10px;
        margin-bottom: 0;
        background: black;
        border: 1px solid orange;
        padding: 8px;
    }
    .button_cancel{
        border-radius: 5px;
        border: 2px solid white;
        padding: 7px;
        border: none;
        text-align: center;
        color: white;
    }
    .button_delete{
        border-radius: 5px;
        padding: 7px;
        border: none;
        text-align: center;
        color: white;
    }
    .button_cancel:hover, .button_delete:hover{
        background: orange;
        color: white;
        border: 1px solid black;
    }
</style>