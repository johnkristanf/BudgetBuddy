
<script setup>
    import Sidebar from '../Components/Sidebar.vue';
</script>


<template>

    <Head>
        <link rel="icon" href="/img/budgetbuddy_logo.jpg" type="image/x-icon">
    </Head>

    <div>
        <Sidebar />
        <main class="p-4">
            <slot />
        </main>
    </div>
</template>