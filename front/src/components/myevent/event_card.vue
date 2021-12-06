<template>
        <div class="container_card">
        <div class="cate-card">
            <div class="card-img">
                <img class='img' src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSmn0jMj0pE5atCT2s9nQ4u3GgmaDNRcvqj8g&usqp=CAU" alt="">

            </div>
            <div class="main-card">
                <div class="category-header">
                    <h1 class='orange'>{{title}}</h1>
                    <h2 class='orange'>{{categoryType}}</h2>
                </div>
                <div class="card-body">
                    <div class="description">
                        <p>{{description}}</p>
                    </div>
                    <div class="date">
                        <div>
                            <span class='orange'>Departure: </span>
                            <span id='small_space'></span>
                            <span>{{departure}} XX</span>
                        </div>
                        <div>
                            <span class='orange'>Arrival:</span>
                            <span id='small_space'></span>
                            <span>{{arrival}} XX</span>
                        </div>
                    </div>
                    <div class="location">
                        <div>
                            <span class='orange'>Location: </span>
                            <span>{{location[0]}} , {{location[1]}}</span>
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
                        <div class="profile">
                            <img src="https://www.directive.com/images/easyblog_shared/July_2018/7-4-18/b2ap3_large_totw_network_profile_400.jpg" alt="profile">
                        </div>
                        <div class="profile">
                            <img src="https://www.directive.com/images/easyblog_shared/July_2018/7-4-18/b2ap3_large_totw_network_profile_400.jpg" alt="profile">
                        </div>
                        <div class="profile">
                            <img src="https://www.directive.com/images/easyblog_shared/July_2018/7-4-18/b2ap3_large_totw_network_profile_400.jpg" alt="profile">
                        </div>
                        <div class="profile">
                            <img src="https://www.directive.com/images/easyblog_shared/July_2018/7-4-18/b2ap3_large_totw_network_profile_400.jpg" alt="profile">
                        </div>
                        <div class="profile">
                            <img src="https://www.directive.com/images/easyblog_shared/July_2018/7-4-18/b2ap3_large_totw_network_profile_400.jpg" alt="profile">
                        </div>
                        <div class="profile">
                            <img src="https://www.directive.com/images/easyblog_shared/July_2018/7-4-18/b2ap3_large_totw_network_profile_400.jpg" alt="profile">
                        </div>
                        <div class="profile">
                            <img src="https://www.directive.com/images/easyblog_shared/July_2018/7-4-18/b2ap3_large_totw_network_profile_400.jpg" alt="profile">
                        </div>
                        <div class="profile">
                            <img src="https://www.directive.com/images/easyblog_shared/July_2018/7-4-18/b2ap3_large_totw_network_profile_400.jpg" alt="profile">
                        </div>
                        <div class="profile">
                            <img src="https://www.directive.com/images/easyblog_shared/July_2018/7-4-18/b2ap3_large_totw_network_profile_400.jpg" alt="profile">
                        </div>
                        <div class="profile">
                            <img src="https://www.directive.com/images/easyblog_shared/July_2018/7-4-18/b2ap3_large_totw_network_profile_400.jpg" alt="profile">
                        </div>
                        <div class="profile">
                            <img src="https://www.directive.com/images/easyblog_shared/July_2018/7-4-18/b2ap3_large_totw_network_profile_400.jpg" alt="profile">
                        </div>
                        <div class="profile">
                            <img src="https://www.directive.com/images/easyblog_shared/July_2018/7-4-18/b2ap3_large_totw_network_profile_400.jpg" alt="profile">
                        </div>
                        <div class="profile">
                            <img src="https://www.directive.com/images/easyblog_shared/July_2018/7-4-18/b2ap3_large_totw_network_profile_400.jpg" alt="profile">
                        </div>
                        <div class="profile">
                            <img src="https://www.directive.com/images/easyblog_shared/July_2018/7-4-18/b2ap3_large_totw_network_profile_400.jpg" alt="profile">
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-btn">
                <div >
                    <h2 id="username" class='orange'>username</h2>
                </div>
                <div class="group_btn">
                    <button>Edit</button>
                    <button>Delete</button>
                    <button>Join Event</button>
                    <button>Exit</button>
                </div>

            </div>
        </div>
        <div class="progress m-2" style="height: 5px;">
            <div class="progress-bar bg-info" role="progressbar" style="width: 6.66%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            title:'v2-p1-group4',
            description:"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, ",
            categoryType:'VisualCompany',
            departure:'10/12/2021',
            arrival:'01/01/2022',
            location:['Phnom Penh','Cambodia'],

        }
    }

}
</script>

<style scoped>

.container_card{
    margin:20px 60px;
    padding: 10px;
    border-radius: 20px;
    border: 2px solid rgb(255, 255, 255);
}

.cate-card{
    display: flex;
    justify-content: center;
    border: 2px solid rgba(0, 0, 0, 0.612);
    background: rgba(255, 255, 255, 0.183);
    height: auto;
    padding: 10px;
    border-radius:20px  
}
.card-img{
    width: 35%;
    padding: 10px;
}
.img{
    width: 100%;
    height: 100%;
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
    /* padding: 0; */
}

.group_btn{
    margin-top: 0px;
    display: grid;
}
button{
    color: white;
    border-radius: 10px;
    padding: 10px;
    margin: 10px 0px;
    background: #000;
    border: 1px solid orange;
}


</style>