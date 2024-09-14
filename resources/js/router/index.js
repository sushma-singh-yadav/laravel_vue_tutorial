import { createRouter, createWebHistory } from "vue-router";
import ContactListComponent from '../views/ContactListComponent.vue';
import ContactAddComponent from '../views/ContactAddComponent.vue';

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