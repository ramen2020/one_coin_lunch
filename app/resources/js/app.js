require('./bootstrap');

window.Vue = require('vue');

import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
import 'material-design-icons-iconfont/dist/material-design-icons.css';
import InfiniteLoading from 'vue-infinite-loading';

Vue.use(Vuetify);
Vue.use(InfiniteLoading);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('add-user-image-form', require('./components/AddUserImageForm.vue').default);
Vue.component('add-restaurant-image-form', require('./components/AddRestaurantImage.vue').default);
Vue.component('favorite-component', require('./components/FavoriteComponent.vue').default);
Vue.component('restaurants-list-component', require('./components/RestaurantsListComponent.vue').default);
Vue.component('restaurant-component', require('./components/RestaurantComponent.vue').default);

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify({
        icons: {
            iconfont: 'mdi',
        },
    }),
});
