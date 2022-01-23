require('./bootstrap');

window.Vue = require('vue').default;

import store from './store'

Vue.component('article-component', require('./components/ArticleComponent.vue').default);
Vue.component('views-component', require('./components/ViewsComponent.vue').default);
Vue.component('likes-component', require('./components/LikesComponent.vue').default);
Vue.component('comments-component', require('./components/CommentsComponent.vue').default);

const app = new Vue({
    el: '#app',
    store,
    created() {
        const id = document.getElementById('app').getAttribute('data-article-id');
        this.$store.dispatch('article/getArticleData', id);
        this.$store.dispatch('article/incrementViews');
    }
});
