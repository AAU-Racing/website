import Vue from 'vue/dist/vue'
import Fragment from 'vue-fragment'

window.Vue = Vue
Vue.use(Fragment.Plugin)

Vue.component('edit-table', require('./components/admin/EditTable.vue').default);
Vue.component('edit-row', require('./components/admin/EditRow.vue').default);
Vue.component('contact-person', require('./components/admin/ContactPerson.vue').default);
Vue.component('contact-person-table', require('./components/admin/ContactPersonTable.vue').default);
Vue.component('page-header', require('./components/admin/PageHeader.vue').default);
Vue.component('page-row', require('./components/admin/PageRow.vue').default);
Vue.component('footer-link-header', require('./components/admin/FooterLinkHeader.vue').default);
Vue.component('footer-link-row', require('./components/admin/FooterLinkRow.vue').default);
Vue.component('carousel-slide-header', require('./components/admin/CarouselSlideHeader.vue').default);
Vue.component('carousel-slide-row', require('./components/admin/CarouselSlideRow.vue').default);
Vue.component('sponsor-header', require('./components/admin/SponsorHeader.vue').default);
Vue.component('sponsor-row', require('./components/admin/SponsorRow.vue').default);
Vue.component('sortable-table', require('./components/admin/SortableTable.vue').default);
Vue.component('file-upload', require('./components/admin/FileUpload.vue').default);
Vue.component('danish-zip-code', require('./components/admin/DanishZipCode.vue').default);
Vue.component('press-post-header', require('./components/admin/PressPostHeader.vue').default);
Vue.component('press-post-row', require('./components/admin/PressPostRow.vue').default);
Vue.component('department-header', require('./components/admin/DepartmentHeader.vue').default);
Vue.component('department-row', require('./components/admin/DepartmentRow.vue').default);
Vue.component('department-assignment', require('./components/admin/DepartmentAssignment.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
