<template>
    <div class="mb-4">
        <Link :href="route('admin.posts.create')"
            class="inline-block px-3 py-2 bg-sky-700 border border-sky-800 text-white">
        Создать
        </Link>
    </div>
    <div class="">
        <div v-for="post in postsData" class="mb-4 bg-white p-4 border border-gray-200 flex justify-between items-center">
            <Link :href="route('admin.posts.show', post.id)">
            <h3 class="text-bold text-2xl mb-2 hover:text-gray-500">{{ post.title }}</h3>
            </Link>
            <!-- <p class="text-gray-500">{{ post.content }}</p> -->

            <div>
                <svg @click="destroyPost(post)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="size-4 text-red-600 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>

            </div>

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
    data() {
        return {
            postsData: this.posts
        }
    },
    components: {
        Link
    },
    methods: {
        destroyPost(post) {
            axios.delete(route('admin.posts.destroy', post.id))
                .then(res => {
                    this.postsData = this.postsData.filter(postItem => postItem.id !== post.id)
                })
        }
    }
}

</script>

<style scoped></style>