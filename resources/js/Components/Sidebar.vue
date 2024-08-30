<script setup>
    import logo from '../../../public/img/budgetbuddy_logo.jpg';

    const links = [
        { route: 'dashboard', component: 'Dashboard', icon: ['fas', 'gauge'] },
        { route: 'transactions', component: 'Transactions', icon: ['fas', 'money-bill'] },
        { route: 'notifications', component: 'Notifications', icon: ['fas', 'gear'] },
        { route: 'settings', component: 'Settings', icon: ['fas', 'gear'] },
    ];

</script>

<template>
    <div 
        class="w-[25%] h-screen fixed top-0 left-0 bg-blue-600 flex flex-col gap-5 items-center font-semibold text-white p-8"
    >
        <a href="#" class="flex items-center mb-6 mt-10 text-3xl font-semibold text-white dark:text-white">
            <img class="w-12 h-12 mr-2 rounded-full" :src="logo" alt="logo">
            Budget Buddy    
        </a>

        <div class="flex flex-col gap-12 w-full uppercase mt-3">
            <Link 
                v-for="link in links"
                :key="link.route"
                :href="$page.component == link.component ? null : route(link.route)"
                :class="[
                    'p-2 rounded-md w-full text-center',
                    $page.component == link.component ? 'bg-white text-black' : 'hover:bg-black hover:text-white'
                ]"
            >
                <font-awesome-icon :icon="link.icon" class="text-xl"/>
                {{ link.component }}
            </Link>
        </div>
    </div>
</template>
