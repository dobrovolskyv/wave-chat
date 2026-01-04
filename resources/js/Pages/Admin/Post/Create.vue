<template>
    <div class="mb-4">
        <Link :href="route('admin.posts.index')">
        Посты
        </Link>
    </div>
    <div class="">
        <div class="mb-4 bg-white p-4 border border-gray-200">
            <div class="mb-4">
                <input v-model="entries.post.title" class="w-full p-4 border border-gray-400" type="text"
                    placeholder="title">
            </div>
            <div class="mb-4">
                <input v-model="entries.post.published_at" class="w-full p-4 border border-gray-400" type="date"
                    placeholder="published at">
            </div>
            <div class="mb-4">
                <select v-model="entries.post.category_id" class="w-full p-4 border border-gray-400">
                    <option value="null" disabled>Выбери категрии</option>
                    <option v-for="category in categories" :value="category.id">{{ category.title }}</option>
                </select>
            </div>
            <div class="mb-4">
                <input @change="setImages" ref="image_input" multiple class="w-full p-4 border border-gray-400"
                    type="file" placeholder="file">
            </div>
            <div class="mb-4">
                <textarea v-model="entries.tags" class="w-full p-4 border border-gray-400 resize-none"
                    type="text" placeholder="tags" />
            </div>
            <div class="mb-4">
                <textarea v-model="entries.post.content" class="w-full p-4 border border-gray-400 resize-none"
                    type="text" placeholder="content" />
            </div>
            <div class="mb-4">
                <a @click.prevent="storePost" href="#"
                    class="inline-block px-3 py-2 bg-emerald-700 border border-emerald-800 text-white">Создать</a>
            </div>
        </div>
    </div>
</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from "@inertiajs/vue3";
import axios from 'axios';

export default {
    name: "Index",
    layout: AdminLayout,
    props: {
        posts: {
            required: false,
            type: Array
        },
        categories: {
            required: true,
            type: Array
        }
    },
    components: {
        Link
    },
    data() {
        return {
            entries: {
                post: {
                    title: '',
                    content: '',
                    published_at: '',
                    category_id: null,
                },
                images: [],
                tags: '',
            }
        }
    },
    methods: {
        storePost() {
            axios.post(route('admin.posts.store'), this.entries, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(() => {
                    this.entries.post = {
                        title: '',
                        content: '',
                        published_at: '',
                        category_id: null,

                    }

                    this.$refs.image_input.value = null
                })
                .catch(() => {

                })

        },
        setImages(e) {
            this.entries.images = e.target.files;
        }
    }
}

</script>

<style scoped></style>