<script setup>
    import { useForm } from '@inertiajs/vue3';
import logo from '../../../../public/img/budgetbuddy_logo.jpg';
    import TextInput from '../../Components/TextInput.vue';


    const formData = useForm({
        email: null,
        password: null,
        remember: null
    });


    const errors = [
        {error: formData.errors.email},
        {error: formData.errors.password},
    ]


    const onSubmit = () => {
        formData.post('/login', {
            preserveScroll: true,

            onSuccess: () => formData.reset(),
            onError: () => formData.reset('password'),
        })
    }


</script>

<template>
    <Head :title="`| Login`">
        <link rel="icon" href="/img/budgetbuddy_logo.jpg" type="image/x-icon">
    </Head>

    <div class="w-full h-screen flex justify-around items-center login-page-bg">
        
        <section class="w-[40%] bg-gray-50 dark:bg-gray-900 rounded-md">
            <div class="flex flex-col items-center justify-center px-12 py-12 mx-auto md:h-[90vh] lg:py-0">
                <a href="#" class="flex items-center mb-6 text-3xl font-semibold text-gray-900 dark:text-white">
                    <img class="w-12 h-12 mr-2" :src="logo" alt="logo">
                    Budget Buddy    
                </a>

                <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Login to your account
                        </h1>

                        <div class="flex flex-col gap-2 font-semibold text-red-500 ">
                            <small v-if="formData.errors.email">
                                {{ formData.errors.email }}
                            </small>
                            
                            <small v-if="formData.errors.password">
                                {{ formData.errors.password }}
                            </small>

                        </div>



                        <form @submit.prevent="onSubmit" class="space-y-4 flex flex-col gap-2" action="#">
                            <TextInput
                                name="Email" 
                                type="text"
                                placeholder="Enter your Email"
                                v-model="formData.email" 
                                :message="formData.errors.email" 
                            />

                            <TextInput
                                name="Password" 
                                type="password"
                                placeholder="Enter your Password"
                                v-model="formData.password" 
                                :message="formData.errors.password" 
                            />
                           
                            <div class="flex gap-2">
                                <input type="checkbox" v-model="formData.remember" id="remember">
                                <label for="remember">Remember Me</label>
                            </div>

                            <button type="submit" class="w-full text-white bg-blue-600 hover:opacity-75 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </section>       
    </div>
</template>


<style scoped>
    .login-page-bg{
        background-image: url('/img/budgetbuddy_bg.jpg');
        background-size: cover;      
        background-position: center;
        background-repeat: no-repeat;
    }

</style>