require('./bootstrap');

window.Vue = require('vue');

import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
import 'material-design-icons-iconfont/dist/material-design-icons.css';
Vue.use(Vuetify);


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('add-user-image-form', require('./components/AddUserImageForm.vue').default);
Vue.component('favorite-component', require('./components/FavoriteComponent.vue').default);

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify({
        icons: {
            iconfont: 'mdi',
        },
    }),
});
