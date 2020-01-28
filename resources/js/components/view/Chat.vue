<template>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Chats</div>

                <div class="panel-body">
                    <chat-messages :messages="messages"></chat-messages>
                </div>
                <div class="panel-footer">
                    <chat-form
                        :addMessage="addMessage"
                        :user="user"
                    ></chat-form>
                </div>
            </div>
        </div>
        <div v-show="flag" class="col-md-4">
            <ul class="dropdown-menu Notifications">
                <li class="head text-light bg-dark">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                            <a href="" class="text-light mr-1">Notifications (3)</a>
                            <a href="" class="float-right text-light">Mark all as read</a>
                        </div>
                    </div>
                </li>
                <li class="notification-box">
                <div class="row">
                    <div class="col-lg-3 col-sm-3 col-3 text-center">
                        <img src="img/avatar-1.png" class="w-50 rounded-circle">
                    </div>    
                    <div class="col-lg-8 col-sm-8 col-8">
                        <strong class="text-info">David John</strong>
                        <div>
                            Lorem ipsum dolor sit amet, consectetur
                        </div>
                        <small class="text-warning">27.11.2015, 15:00</small>
                    </div>    
                </div>
                </li>
                <li class="notification-box bg-gray">
                    <div class="row">
                        <div class="col-lg-3 col-sm-3 col-3 text-center">
                            <img src="img/avatar-1.png" class="w-50 rounded-circle">
                        </div>    
                        <div class="col-lg-8 col-sm-8 col-8">
                            <strong class="text-info">David John</strong>
                            <div>
                                Lorem ipsum dolor sit amet, consectetur
                            </div>
                            <small class="text-warning">27.11.2015, 15:00</small>
                        </div>    
                    </div>
                </li>
                <li class="notification-box">
                    <div class="row">
                        <div class="col-lg-3 col-sm-3 col-3 text-center">
                        <img src="img/avatar-1.png" class="w-50 rounded-circle">
                        </div>    
                        <div class="col-lg-8 col-sm-8 col-8">
                            <strong class="text-info">David John</strong>
                            <div>
                                Lorem ipsum dolor sit amet, consectetur
                            </div>
                            <small class="text-warning">27.11.2015, 15:00</small>
                        </div>    
                    </div>
                </li>
                <li class="drop-footer bg-dark text-center">
                    <a href="" class="text-light">View All</a>
                </li>
            </ul>
        </div>
    </div>
</div>
</template>
<script>
import chatform from './chat/ChatForm'
import message from './chat/ChatMessages'
export default {
    data(){
        return{
            messages:[],
            user:null,
            project_id:null,
            t_id:null,
            t_name:null
        }

    },
    components:{
        'chat-messages': message,
        'chat-form': chatform
    },
    created(){
        this.user = this.$route.params('u_name')
        this.project_id = this.$route.params('p_id')
        this.t_id = this.$route.params('t_id')
        this.t_name = this.$route.params('t_name')
        // this.fetchMessages;
        axios.get('/messages/' + project_id).then(response => {
            this.messages = response.data;
            Echo.private('chat.' + this.project_id)
                .listen('MessageSent', (e) => {
                    this.messages.push({
                        message: e.message,
                        user: e.user
                    });
                });
            });
    },
    methods:{
        addMessage(message) {
            this.messages.push(message);

            axios.post('/api/message', message).then(response => {
              console.log(response.data);
            });
        }
    }

}
</script>
<style lang="stylus" scoped>

</style>