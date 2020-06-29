/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('image-upload', require('./components/progress.vue').default);
Vue.component('data-send', require('./components/dataComponent.vue').default);
Vue.component('request-data', require('./components/RequestData.vue').default);
Vue.component('ajax-chart', require('./components/LineChart.vue').default);
Vue.component('realtime-chart', require('./components/chartRealtime.vue').default);
Vue.component('chat', require('./components/chat.vue').default);
Vue.component('country-filter', require('./components/filterCountries.vue').default);
Vue.component('private-chat', require('./components/privateChat.vue').default);
Vue.component('chat-echo', require('./components/chatEcho.vue').default);
Vue.component('private-echo', require('./components/privateEchoChat.vue').default);
Vue.component('private-echo-room', require('./components/privateRoomChat.vue').default);
Vue.component('we-code-message', require('./components/weCodeChat/weCodeMessager.vue').default);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
