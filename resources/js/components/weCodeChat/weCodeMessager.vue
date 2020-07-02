<template>
    <div class="chat-app">
        <contactList :contacts="contacts" @selected="startChatContact"></contactList>
        <chatWindow :contact="selectContact" :messages="messages" @pushMes="pushNewMessage"></chatWindow>
    </div>
</template>

<script>
    import chatWindow from "./chatWindow";
    import contactList from "./contactList";
    export default {
        props:{
          user:{
              type: Object,
              required: true
          }
        },
        data:function(){
            return{
                messages: [],
                contacts: [],
                selectContact: null,
                typingTimer: false,
            }
        },
        computed:{
            channel(){
                return window.Echo.private('channel-chat.' + this.user.id);
            }
        },
        mounted() {
            axios.get('/chat/contacts').then((response)=>{
               this.contacts = response.data;
            });
            this.channel
                .listen('EventMessager',({body})=>{
                    this.handleIncoming(body);
                    // this.messages.push(body);
                    // this.isActive = false;
                }).listenForWhisper('typing',(e)=>{
                // this.isActive = e;
                if(this.typingTimer) clearTimeout(this.typingTimer);
                this.typingTimer = setTimeout(() => {
                    // this.isActive = false;
                },2000);
            });
        },
        methods:{
            pushNewMessage(text) {
                this.messages.push(text);
            },
            startChatContact:function (contact) {
                this.updateUnreadCount(contact, true);
                axios.get(`/chat/messages/${contact.id}`).then(response =>{
                    this.messages = response.data;
                    this.selectContact = contact;
                });
            },
            handleIncoming(message){
                if(this.selectContact && message.from === this.selectContact.id){
                    this.pushNewMessage(message);
                }
                // console.log(message);
                this.updateUnreadCount(message.from_user, false);
            },
            updateUnreadCount(contact,reset){
                this.contacts = this.contacts.map((single)=>{
                    if(single.id != contact.id){
                        return single;
                    }
                    if(reset){
                        single.unread = 0;
                    }else{
                        single.unread += 1;
                    }
                    return single;
                })
            },
        },
        components:{
            contactList,
            chatWindow
        }
    }
</script>
<style lang="scss" scoped>
    .chat-app {
        display: flex;
    }
</style>
