
<script setup>
    import SideBar from '../Components/Sidebar.vue'
</script>


<template>
    <div>
        <SideBar />
        <div class="container">
            <slot />
        </div>
    </div>
</template>