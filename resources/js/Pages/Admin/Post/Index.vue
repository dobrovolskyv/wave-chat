<template>
    <div class="mb-4">
        <Link :href="route('admin.posts.create')"
            class="inline-block px-3 py-2 bg-sky-700 border border-sky-800 text-white">
        Создать
        </Link>
    </div>
    <div class="">
        <div v-for="post in posts" class="mb-4 bg-white p-4 border border-gray-200">
            <Link :href="route('admin.posts.show', post.id)">
            <h3 class="text-bold text-2xl mb-2 hover:text-gray-500">{{ post.title }}</h3>
            </Link>
            <p class="text-gray-500">{{ post.content }}</p>

        </div>
    </div>
</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from "@inertiajs/vue3";

export default {
    name: "Index",
    layout: AdminLayout,
    props: {
        posts: {
            required: false,
            type: Array
        }
    },
    components: {
        Link
    }
}

</script>

<style scoped></style>