<template>
    <div class="chat-app">
        <chatWindow :contact="selectContact" :messages="messages"></chatWindow>
        <contactList :contacts="contacts"></contactList>
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
        components:{
            contactList,
            chatWindow
        }
    }
</script>
