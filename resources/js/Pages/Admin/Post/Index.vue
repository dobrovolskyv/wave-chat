<template>
    <div class="mb-4">
        <Link :href="route('admin.posts.create')"
            class="inline-block px-3 py-2 bg-sky-700 border border-sky-800 text-white">
        Создать
        </Link>
    </div>
    <div class="mb-4">
        <div class="flex items-center ">
            <div>
                <input v-model="filter.title" class="border border-gray-200 p-4" type="text" placeholder="title">
            </div>
            <div>
                <input v-model="filter.publishad_at_from" class="border border-gray-200 p-4" type="number"
                    placeholder="views from">
            </div>
            <div>
                <input v-model="filter.views_from" class="border border-gray-200 p-4" type="date" placeholder="date">
            </div>
            <div>
                <a @click.prevent="getPosts" href="#"
                    class="border border-emerald-800 p-4 inline-block  bg-emerald-700 text-white">Применить фильтр</a>
            </div>
            <div v-if="Object.keys(filter).length > 0">
                <a @click.prevent="filter = {}" href="#"
                    class="border border-red-800 p-4 inline-block  bg-red-700 text-white">Отменить фильтр</a>
            </div>
        </div>
    </div>
    <div class="mb-4">
        <div v-for="post in postsData"
            class="mb-4 bg-white p-4 border  border-gray-200 flex justify-between items-center">
            <Link :href="route('admin.posts.show', post.id)" class="text-bold max-w-[45 0px] w-full">
            <h3 class="text-bold text-2xl max-w-[400px] mb-2 hover:text-gray-500" v-html="link.label"></h3>
            </Link>
            <!-- <p class="text-gray-500">{{ post.content }}</p> -->
            <div class="w-[200px]">
                <div class="flex items-center gap-8">
                    {{ post.views }}
                    {{ post.published_at }}
                </div>
            </div>
            <div class="flex items-center gap-2">
                <Link :href="route('admin.posts.edit', post.id)">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4 text-gray-500 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>
                </Link>

                <svg @click="destroyPost(post)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="size-4 text-red-600 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>

            </div>

        </div>
    </div>
    <div> 
        <div>
            <a class="inline-block mr-2 p-2 border border-gray-200 bg-white text-gray-600" 
            v-for="link in postsData.meta.links" 
            @click="filter.page = link.label"
            href="#" v-html="link.label"></a>
        </div>
    </div>
</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from "@inertiajs/vue3";
import axios from "axios";
 
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
            postsData: this.posts,
            filter: {},
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
        },
        getPosts() {
            axios.get(route('admin.posts.index'), {
                params: this.filter
            })
                .then(res => {
                    this.postsData = res.data
                })
        }

    },
    watch: {
        filter: {
            handler() {
                this.getPosts()
            },
            deep: true
        }
    }
}

</script>

<style scoped></style>