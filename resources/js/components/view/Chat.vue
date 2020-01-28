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
    </div>
</div>
</template>
<script>
import chatform from './chat/ChatForm'
import message from './chat/ChatMessages'
export default {
    data(){
        return{
            
            user:localStorage.getItem('name'),
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
        this.user = User.get
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