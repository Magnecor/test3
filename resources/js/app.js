
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('prob-component', require('./components/ProbComponent.vue'));
Vue.component('ajax-component', require('./components/AjaxComponent.vue'));
Vue.component('socketchat-component', require('./components/SocketChatComponent.vue'));
Vue.component('new-component', require('./components/NewComponent.vue'));
Vue.component('new1-component', require('./components/New1Component.vue'));
Vue.component('serversselect-component', require('./components/ServersSelectComponent.vue'));
Vue.component('gamesselect-component', require('./components/GamesSelectComponent.vue'));
Vue.component('daraden-component', require('./components/layouts/daradenComponent.vue'));
Vue.component('darkod-component', require('./components/layouts/darkodComponent.vue'));
const app = new Vue({
    el: '#app'
});
