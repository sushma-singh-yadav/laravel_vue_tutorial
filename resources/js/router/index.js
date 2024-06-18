import { createRouter, createWebHistory } from "vue-router";
import ExampleComponent from '../components/ExampleComponent.vue';
import AboutComponent from '../components/AboutComponent.vue';
import ContactComponent from '../components/ContactComponent.vue';

const routes = [
    {
        name: 'Home',
        path: '/',
        component: ExampleComponent
    },
    {
        name: 'About',
        path: '/about',
        component: AboutComponent
    },
    {
        name: 'Contact',
        path: '/contact',
        component: ContactComponent
    },
    {
        name: 'Services',
        path: '/contact',
        component: ContactComponent
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;