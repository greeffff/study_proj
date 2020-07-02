<template>
    <div class="chat-window">
        <h1>{{contact ? contact.name : 'Выберите диалог'}}</h1>
        <MessageFeed :contact="contact" :messages="messages"/>
        <MessageComposer @send="sendMessage"/>
    </div>
</template>

<script>
    import MessageComposer from "./MessageComposer";
    import MessageFeed from "./MessageFeed";
    export default {
        props: {
            contact:{
                type: Object,
                default: null,
            },
            messages:{
                type: Array,
                default: [],
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
          sendMessage(text){
              if(this.contact == null){
                  alert('Choose contact');
                  return 0;
              }
            axios.post('/chat/send',{
                contact_id : this.contact.id,
                text : text
            }).then(response =>{
                this.$emit('pushMes',response.data);
            });
          },
        },
        components:{
            MessageComposer,
            MessageFeed,
        }
    }
</script>
<style lang="scss" scoped>
    .chat-window {
        flex: 5;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        h1 {
            font-size: 20px;
            padding: 10px;
            margin: 0;
            border-bottom: 1px dashed lightgray;
        }
    }
</style>
