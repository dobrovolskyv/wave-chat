<template>
    Dashboard
</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';

export default {
    name: "Index",
    layout: AdminLayout,
    props: {
        posts: {
            required: false,
            type: Array
        }
    }
}

</script>

<style scoped></style>