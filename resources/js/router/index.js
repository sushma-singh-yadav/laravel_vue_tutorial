import { createRouter, createWebHistory } from "vue-router";
import ContactListComponent from '../views/ContactListComponent.vue';
import ContactAddComponent from '../views/ContactAddComponent.vue';

const routes = [
    {
        path: '/',
        component: ContactAddComponent
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;