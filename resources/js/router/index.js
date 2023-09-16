import { createRouter, createWebHistory } from "vue-router";
import ExampleComponent from '../components/ExampleComponent.vue';
import AboutComponent from '../components/AboutComponent.vue';
import ContactListComponent from '../views/ContactListComponent.vue';

const routes = [
    {
        path: '/',
        component: ExampleComponent
    },
    {
        path: '/about',
        component: AboutComponent
    },
    {
        path: '/contact-list',
        component: ContactListComponent
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;