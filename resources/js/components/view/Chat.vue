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
                        v-on:messagesent="addMessage"
                        :user="user"
                    ></chat-form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
export default {
    data(){
        user:localStorage.getItem('name')
    },
    created(){
        axios.get('/messages/' + user_id).then(response => {
            this.conversation = response.data;
            Echo.private('chat.' + this.conversation.conversation_id)
                .listen('MessageSent', (e) => {
                    this.conversation.messages.push({
                    conversation_id: e.message.conversation_id,
                    message: e.message.message,
                    name: e.user.firstname
                });
                });
});
    }
}
</script>
<style lang="stylus" scoped>

</style>