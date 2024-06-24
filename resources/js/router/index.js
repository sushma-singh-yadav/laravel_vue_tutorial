import { createRouter, createWebHistory } from "vue-router";
import ExampleComponent from '../components/ExampleComponent.vue';
import AboutComponent from '../components/AboutComponent.vue';
import ContactComponent from '../components/ContactComponent.vue';
import WebDesignComponent from '../components/WebDesignComponent.vue';
import MobileDevelopmentComponent from '../components/MobileDevelopmentComponent.vue';
import AwsComponent from '../components/AwsComponent.vue';

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
    {
        name: 'Web Design',
        path: '/web-design',
        component: WebDesignComponent
    },
    {
        name: 'Mobile Development',
        path: '/mobile-development',
        component: MobileDevelopmentComponent
    },
    {
        name: 'AWS',
        path: '/aws',
        component: AwsComponent
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;