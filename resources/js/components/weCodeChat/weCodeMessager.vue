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
            }
        },
        mounted() {
            axios.get('/users').then((response)=>{
               this.contacts = response.data;
               console.log(this.contacts);
            });
        },
        methods:{
            pushNewMessage(text) {
                console.log(text);
                this.messages.push(text);
            },
            startChatContact:function (contact) {
                axios.get(`/chat/messages/${contact.id}`).then(response =>{
                    this.messages = response.data;
                    this.selectContact = contact;
                });
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
