<template>
    <div class="mb-4">
        <Link :href="route('admin.posts.index')" class="inline-block px-3 py-2 bg-sky-700 border border-sky-800 text-white">
            Posts
        </Link>
    </div>
    <div class="">
        <div class="mb-4 bg-white p-4 border border-gray-200">
            <h3 class="text-bold text-2xl mb-2">{{ post.title }}</h3>
            <div v-for="image in post.images">
               <img :src="image.url" :alt="post.title">
            </div>
            <p class="text-gray-500">{{ post.content }}</p>

        </div>
    </div>
</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from "@inertiajs/vue3";

export default { 
    name: "Show",
    layout: AdminLayout,
    props: {
        post: {
            required: true,
            type: Object
        }
    },
    components: {
        Link
    }
}

</script>

<style scoped></style>