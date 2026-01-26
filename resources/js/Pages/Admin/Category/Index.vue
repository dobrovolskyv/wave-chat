<template>
    <div v-for="category in categories" class="mb-4 bg-white p-4 border border-gray-200 ">
        <h3 class="text-bold text-2xl mb-2">{{ category.title }}</h3>
    </div>
    
</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';

export default {
    name: "Index",
    layout: AdminLayout,
    props: {
        categories: {
            required: false,
            type: Array
        }
    }
}

</script>

<style scoped></style>