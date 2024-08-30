
<script setup>
    import Sidebar from '../Components/Sidebar.vue';
    import logo from '../../../public/img/budgetbuddy_logo.jpg';
    import { ref } from 'vue';

    const props = defineProps({
        flash: Object
    })

    const flashMessage = ref(props.flash.message);
    setTimeout(() => flashMessage.value = null, 5000);
</script>


<template>

    <Head>
        <link rel="icon" href="/img/budgetbuddy_logo.jpg" type="image/x-icon">
    </Head>

    <div class="w-full fixed top-2 z-[9999] flex justify-center">
        <p 
            v-if="flashMessage"
            class="w-[50%] p-5 bg-blue-600 rounded-md text-white font-semibold text-center ml-5"
            >

            {{ $page.props.flash.message }} {{ $page.props.auth.user.name }} <font-awesome-icon :icon="['fas', 'face-smile']" />
        </p>
    </div>

    <div>
        <Sidebar />

        <div class="w-full flex justify-end h-28">
            <div class="flex items-center w-[73%] h-full justify-between p-5">
                <h1 class="font-semibold text-2xl uppercase">Budget Buddy {{ $page.component }}</h1>

                <div class="flex items-center gap-3 hover:cursor-pointer">
                    <img :src="logo" alt="User Profile Picture" class="w-12 rounded-full">
                    <h1 class="font-semibold text-lg">{{ $page.props.auth.user.name }}</h1>

                    <Link 
                        type="button"
                        method="post"
                        as="button"
                        :href="route('logout')"
                    >
                        <font-awesome-icon 
                            :icon="['fas', 'right-from-bracket']"
                            class="text-xl" 
                        />
                    </Link>
                    
                </div>

            </div>
        </div>

        <main class="p-4">
            <slot />
        </main>
    </div>
</template>