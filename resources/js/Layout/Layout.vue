
<script setup>
    import Sidebar from '../Components/Sidebar.vue';
    import logo from '../../../public/img/budgetbuddy_logo.jpg';

</script>


<template>

    <Head>
        <link rel="icon" href="/img/budgetbuddy_logo.jpg" type="image/x-icon">
    </Head>

    <div>
        <Sidebar />

        <div class="w-full flex justify-end h-28">
            <div class="flex items-center w-[73%] h-full justify-between p-5">
                <h1 class="font-semibold text-2xl uppercase">Budget Buddy {{ $page.component }}</h1>

                <div class="flex items-center gap-2 hover:cursor-pointer">
                    <img :src="logo" alt="User Profile Picture" class="w-12 rounded-full">
                    <h1 class="font-semibold text-lg">{{ $page.props.auth.user.name }}</h1>

                </div>
            </div>
        </div>

        <main class="p-4">
            <slot />
        </main>
    </div>
</template>