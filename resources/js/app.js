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
Vue.component('navbar', require('./components/Navs/Navbar.vue').default);
Vue.component('profile', require('./components/Navs/ProfileDropdown.vue').default); 
Vue.component('dashboard', require('./components/Navs/Dashboard.vue').default);
Vue.component('job-card', require('./components/User/job/JobCard.vue').default);
Vue.component('logement-card', require('./components/User/logement/LogementCard.vue').default);
Vue.component('user-layout', require('./components/User/LayoutUser.vue').default);
Vue.component('profile-card', require('./components/User/profile/ProfileCard.vue').default);
Vue.component('profile-document', require('./components/User/profile/DocumentCard.vue').default);
Vue.component('agenda', require('./components/Utils/Agenda.vue').default);
Vue.component('title-sec', require('./components/Utils/TitleSec.vue').default);
Vue.component('title-simple', require('./components/Utils/TitleSimple.vue').default);
Vue.component('job-desc', require('./components/User/job/JobDesc.vue').default);
Vue.component('job-post', require('./components/User/job/JobPostuler.vue').default);
Vue.component('job-coord', require('./components/User/job/JobCoord.vue').default);
Vue.component('job-filter', require('./components/User/job/JobFilter.vue').default);
Vue.component('logement-filter', require('./components/User/logement/LogementFilter.vue').default);
Vue.component('logement-gallery', require('./components/User/logement/LogementGallery.vue').default);
Vue.component('logement-desc', require('./components/User/logement/LogementDesc.vue').default);
Vue.component('logement-coord', require('./components/User/logement/LogementCoord.vue').default);
Vue.component('pagination-cards', require('./components/Navs/PaginationCards.vue').default);
Vue.component('formation-card', require('./components/User/formation/FormationCard.vue').default);
Vue.component('formation-filter', require('./components/User/formation/FormationFilter.vue').default);
Vue.component('formation-desc', require('./components/User/formation/FormationDesc.vue').default);
Vue.component('agenda-create', require('./components/Utils/AgendaCreate.vue').default); 







Vue.component('dashboardadmin', require('./components/Navs/DashboardAdmin.vue').default);
Vue.component('admin-layout', require('./components/Admin/LayoutAdmin.vue').default);
Vue.component('admin-agenda-list', require('./components/Admin/AdminAgenda/LayoutAgendaList.vue').default);
Vue.component('admin-user-list', require('./components/Admin/AdminUser/LayoutUserList.vue').default);
Vue.component('admin-formation-list', require('./components/Admin/AdminFormation/LayoutFormationList.vue').default); 
Vue.component('admin-job-list', require('./components/Admin/AdminJob/LayoutJobList.vue').default); 
Vue.component('admin-housing-list', require('./components/Admin/AdminHousing/LayoutHousingList.vue').default); 
Vue.component('user-input-text', require('./components/Admin/AdminUser/UserEditInputText.vue').default);
Vue.component('user-input-dropdown', require('./components/Admin/AdminUser/UserEditInputDropdown.vue').default);
Vue.component('user-input-textarea', require('./components/Admin/AdminUser/UserEditInputTextarea.vue').default);
Vue.component('user-input-images', require('./components/Admin/AdminHousing/UserEditInputImages.vue').default);
Vue.component('user-input-agenda', require('./components/Admin/AdminAgenda/InputUserAgenda.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


