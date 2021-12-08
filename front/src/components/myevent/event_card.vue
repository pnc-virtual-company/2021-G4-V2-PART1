<template>
            <div class="container_card">
            <div class="cate-card">
                <div class="card-img">
                    <img class='img' :src="this.pathImage+img" alt="">
                </div>
                <div class="main-card">
                    <div class="category-header">
                        <h1 class='orange'>{{title}}</h1>
                        <h2 class='orange'>{{categoryName}}</h2>
                    </div>
                    <div class="card-body">
                        <div class="description">
                            <p>{{description}}</p>
                        </div>
                        <div class="date">
                            <div>
                                <span class='orange'>Departure: </span>
                                <span id='small_space'></span>
                                <span>{{startDate}} XX</span>
                            </div>
                            <div>
                                <span class='orange'>Arrival:</span>
                                <span id='small_space'></span>
                                <span>{{endDate}} XX</span>
                            </div>
                        </div>
                        <div class="location">
                            <div>
                                <span class='orange'>Location: </span>
                                <span>{{city}} , {{country}}</span>
                            </div>
                            <span id="space"> | </span>
                            <div>
                                <span class='orange'>Member:</span>
                                <span id='small_space'></span>
                                <span>15</span>
                                <span class='orange'>People.</span>
                            </div>
                        </div>
                        <div class="member">
                            <div class="profile">
                                <img src="https://www.directive.com/images/easyblog_shared/July_2018/7-4-18/b2ap3_large_totw_network_profile_400.jpg" alt="profile">
                            </div>
                            
                        </div>
                    </div>

                </div>
                <div class="card-btn">
                    <div class='card-btn-top'>
                        <h2 id="username" class='orange'>{{firstName}}</h2>
                    </div>
                        <div class="group_btn owner" v-if="firstName===username">
                            <button class='button'>Edit</button>
                            <button class="button btn category-btn" type="button" data-bs-toggle="modal" data-bs-target="#deleteEvent"  @click="deleteEventAction(eventId)">Delete</button>
                        </div>
                        <div class="group_btn guest" v-else>
                            <button class='button'>Join</button>
                            <button class='button'>Exit</button>
                        </div>
                </div>
            </div>
            <div class="progress m-2" style="height: 5px;">
                <div class="progress-bar bg-info" role="progressbar" style="width: 6.66%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="wrapper delete">
                <div class="modal fade delete delete_modal" id="deleteEvent">
                    <div class="modal-dialog">
                        <div class="modal-content"> 
                            <div class="modal-body modal_delete">
                                <h4>Delete a category ?</h4>
                                <hr />
                                <strong>Are you sure you want to delete this event ?</strong>
                                <hr />
                                <div class="cancel_delete">
                                    <button class="button_cancel" role="button" data-bs-dismiss="modal">Cancel</button>
                                    <button class="button_delete" role="button" data-bs-dismiss="modal" @click="deleteEvent(delete_id)">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    
</template>

<script>
import moment from 'moment';
export default {
    props:['eventId','userId','cateId','title','description','departureDate','arrivalDate','country','city','img','firstName','categoryName','event'],
    data(){
        return{
            delete_id:'',
            startDate:this.dateFormat(this.departureDate),
            endDate:this.dateFormat(this.arrivalDate),
            pathImage:'http://127.0.0.1:8000/storage/EventImages/',
            username:'',
            eventTitle:'',
            eventDescription:'',
            categoryType:'',
            departure:'',
            arrival:'',
            location:'',
        }
    },
    methods: {
        dateFormat(date){
            return moment(date).format('YYYY-MM-DD hh:mm:ss')
        },
        // Delete on category card

            deleteEventAction(id){
                console.log(id)
                this.delete_id = id;
            },
            deleteEvent(id){
                console.log(id)
                this.$emit("delete_Event", id);
            },
    },
    mounted(){
        this.username=localStorage.getItem('username')
    }
}
</script>

<style scoped>
.container_card{
margin: 10px 70px;
}
.cate-card{
    color: white;
    display: flex;
    justify-content: center;
    border: 2px solid rgb(0, 0, 0);
    background: rgba(255, 255, 255, 0.183);
    height: auto;
    padding: 10px;
    border-radius:20px ;
    
}
.card-img{
    width: 35%;
    padding: 10px;
}
.img{
    width: 100%;
    height: 310px;
    background: rgb(221, 205, 205);
    border-radius:10px

}
.main-card{
    padding: 10px;
    border-right: 3px solid orange;
    width: 50%;

}
.card-btn{
    padding: 10px;
    border-left: 3px solid orange;
    width: 15%;
}
/* ----------- */
.category-header,.location{
    display: flex;
}
.category-header h1, .category-header h2{
    margin: 0;
}
.category-header{
    justify-content: space-between;
    margin: 0px 10px;
}
.orange{
    color: orange;
}
.member{
    margin-top: 10px;
    display: flex;
}
img{
    width: 32.5px;
    height: 32.5px;
    border-radius: 40px;
}
.profile{
    border-radius: 40px;
    margin: 0px 5px;
    background: rgb(255, 255, 255);
    border:1px solid orange;
    width: 32.5px;
    height: 32.5px;
}
#space {
    margin: 0px 30px;
}
#small_space{
    margin: 0px 10px;
}
.description{
    margin: 10px 0px;
}
.location, .date{
    margin: 20px 0px;
}
#username{
    margin: 0;
    text-align: center;
    padding: 0;
}
.card-btn-top{
    height: 60%;
}
.group_btn{
    height: 40%;
    margin-top: 0px;
    display: grid;
}
button{
    color: white;
    border-radius: 10px;
    padding: 10px;
    margin: 10px 7px;
    background: rgba(0, 0, 0, 0.796);
    border: 1px solid orange;
}
.button:hover{
    background: orange;
    border: 2px solid black;
    color: black;
    font-weight: bold;
    padding: 12px;
    margin: 8px 0px;
}

    .cancel_delete{
        display: flex;
        justify-content: center;
    }
    .button_cancel,.button_delete{
        width: 100px;
        margin:0px 20px;
        padding: 10px;
    }
    .button_cancel:hover,.button_delete:hover{
        background: orange;
        color: black;
        border: 1px solid black;
    }
    .delete{
        background: rgba(0, 0, 0, 0.428);
    }
    .modal-content{
        background: rgba(0, 0, 0, 0.578);
        color:white;
        border:1px solid white;
    }
    .modal-body{
        text-align: center;
    }


</style>