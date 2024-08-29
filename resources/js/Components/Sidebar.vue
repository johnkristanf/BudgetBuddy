<script setup>

    const links = [
        {route: 'dashboard', component: 'Dashboard'},
        {route: 'transactions', component: 'Transactions'},
    ]
</script>

<template>
    <div class="flex flex-col">
        <Link 
            v-for="link in links"
            :key="link.route"
            :href="route(link.route)"
            :class="{'bg-red-800': $page.component == link.component}"
            >
               {{ link.component }}
        </Link>
    </div>
</template>