window.Vue = require('vue');
import Fragment from 'vue-fragment'
Vue.use(Fragment.Plugin)

Vue.component('edit-table', require('./components/admin/EditTable.vue').default);
Vue.component('edit-row', require('./components/admin/EditRow.vue').default);
Vue.component('contact-person', require('./components/admin/ContactPerson.vue').default);
Vue.component('contact-person-table', require('./components/admin/ContactPersonTable.vue').default);
Vue.component('page-header', require('./components/admin/PageHeader.vue').default);
Vue.component('page-row', require('./components/admin/PageRow.vue').default);
Vue.component('footer-link-header', require('./components/admin/FooterLinkHeader.vue').default);
Vue.component('footer-link-row', require('./components/admin/FooterLinkRow.vue').default);
Vue.component('sortable-table', require('./components/admin/SortableTable.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
