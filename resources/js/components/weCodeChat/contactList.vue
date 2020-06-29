<template>
    <div class="contact-list">
        <ul>
            <li v-for="contact in contacts" :key="contact.id">
                <div class="avatar-image">
                    <img :src="contact.profile_image" :alt="contact.name">
                </div>
                <div class="contact">
                    <p class="name">{{contact.name}}</p>
                    <p class="email">{{contact.email}}</p>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props:[
            'contacts',
        ],
        mounted() {
            // console.log(this.contacts);
            console.log('Component mounted.')
        }
    }
</script>
