<script setup>
    const model = defineModel({
        type: null,
        required: true
    });

    defineProps({
        name: {
            type: String,
            required: true
        },

        type: {
            type: String,
            default: 'text'
        },

        placeholder: {
            type: String,
            required: true
        },

        message: String
    })

</script>

<template> 
    <div class="flex flex-col justify-center">
        <label :for="name">{{ name }}</label>
        <input 
            :type="type" 
            v-model="model"
            :class="{'border !border-red-500': message}"
            class="p-2 rounded-md focus:outline-blue-500 mt-1"
            :placeholder="placeholder"
        />
    </div>
</template>