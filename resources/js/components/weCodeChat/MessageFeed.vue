<template>
    <div class="feed">
        <ul v-if="contact">
            <li v-for="message in messages" :class="`message$(message.to == contact.id ? 'sent' : 'reviced'}`" :key="message.id">
                {{message.text}}
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props:{
            contact:{
                type:Object,
            },
            messages:{
                type:Array,
                required:true,
            },
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
