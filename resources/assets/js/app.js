
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';
import VueSweetalert2 from 'vue-sweetalert2';

Vue.use(VueSweetalert2);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    methods: {
        confirmAndRedirect(event) {
            let confirm = event.target.getAttribute('data-confirm');
            let action = event.target.getAttribute('data-action');

            this.$swal({
                title: confirm,
                showCancelButton: true
            }).then(function(result) {
                if (result.dismiss === 'cancel') {
                    return false;
                }

                window.location = action;
            }, function(dismiss) {
                if (dismiss === 'cancel') {
                    event.preventDefault();
                } else {
                    throw dismiss;
                }
            });
        },
        confirmAndSubmit(event) {
            let el = event.target;
            let confirm = el.getAttribute('data-confirm');

            this.$swal({
                title: confirm,
                showCancelButton: true
            }).then(function(result) {
                if (result.dismiss === 'cancel') {
                    return false;
                }

                debugger;

                el.parentElement.submit();
            }, function(dismiss) {
                if (dismiss === 'cancel') {
                    event.preventDefault();
                } else {
                    throw dismiss;
                }
            });
        }
    },
    mounted() {

    }
});
