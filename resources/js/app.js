import './bootstrap';
import { createApp } from "vue/dist/vue.esm-bundler";
import Vue from 'vue';
window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app'
});
