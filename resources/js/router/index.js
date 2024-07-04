import { createRouter, createWebHistory } from "vue-router";
import ContactListComponent from '../views/ContactListComponent.vue';

const routes = [
    {
        path: '/',
        component: ContactListComponent
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;