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
            console.log(text);
          },
        },
        components:{
            MessageComposer,
            MessageFeed,
        }
    }
</script>
