window.Vue = require('vue');
import Fragment from 'vue-fragment'
Vue.use(Fragment.Plugin)

Vue.component('edit-table', require('./components/EditTableComponent.vue').default);
Vue.component('edit-row', require('./components/EditRowComponent.vue').default);
Vue.component('contact-person', require('./components/ContactPersonComponent.vue').default);
Vue.component('contact-person-table', require('./components/ContactPersonTableComponent.vue').default);
Vue.component('pages-table', require('./components/PagesTableComponent.vue').default);
Vue.component('file-upload', require('./components/FileUpload.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
