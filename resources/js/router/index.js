import { createRouter, createWebHistory } from "vue-router";
import ExampleComponent from '../components/ExampleComponent.vue';
import AboutComponent from '../components/AboutComponent.vue';

const routes = [
    {
        path: '/',
        component: ExampleComponent
    },
    {
        path: '/about',
        component: AboutComponent
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;