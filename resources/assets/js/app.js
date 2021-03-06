
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

Vue.component('categories-component', require('./components/hitching-categories/FormCategoriesComponent.vue'));
Vue.component('refactory-component', require('./components/refactory-categories/RefactoryComponent.vue'));
Vue.component('review-component', require('./components/review-categories/ReviewComponent'));


const app = new Vue({
    el: '#app'
});
