<template>
    <div>
        <Navbar />
        <router-view />
    </div>
</template>
<script >
import Navbar from './layout/Navbar.vue';
export default {
    components: { Navbar}
}
</script>

<style>
</style>