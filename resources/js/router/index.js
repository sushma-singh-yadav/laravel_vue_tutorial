import { createRouter, createWebHistory } from "vue-router";
import ExampleComponent from '../components/ExampleComponent.vue';
import AboutComponent from '../components/AboutComponent.vue';
import ContactListComponent from '../views/ContactListComponent.vue';
import ContactEditComponent from '../views/ContactEditComponent.vue';

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
        name: 'contact-list',
        path: '/contact-list',
        component: ContactListComponent
    },
    {
        path: '/contact-edit/:id',
        component: ContactEditComponent
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;