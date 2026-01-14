<template>
    <div class="mb-4">
        <Link :href="route('admin.posts.index')"
            class="inline-block px-3 py-2 bg-sky-700 border border-sky-800 text-white">
        Посты
        </Link>
    </div>
    <div v-if="isSuccess" class="bg-green-800 my-4 max-w-md">
        <div class="text-white p-4 ">Success!</div>
    </div>
    <div class="">
        <div class="mb-4 bg-white p-4 border border-gray-200">
            <div class="mb-4">
                <input v-model="entries.post.title" class="w-full p-4 border border-gray-400" type="text"
                    placeholder="title">
                <div v-if="errors['post.title']" class="text-red-600 text-xs">
                    <p v-for="error in errors['post.title']" class="mb-2">{{ error }}</p>
                </div>
            </div>
            <div class="mb-4">
                <input v-model="entries.post.published_at" class="w-full p-4 border border-gray-400"
                    type="datetime-local" placeholder="published at">
            </div>
            <div class="mb-4">
                <select v-model="entries.post.category_id" class="w-full p-4 border border-gray-400">
                    <option value="null" disabled>Выбери категрии</option>
                    <option v-for="category in categories" :value="category.id">{{ category.title }}</option>
                </select>
                <div v-if="errors['post.category_id']" class="text-red-600 text-xs">
                    <p v-for="error in errors['post.category_id']" class="mb-2">{{ error }}</p>
                </div>
            </div>
            <div class="mb-4">
                <input @change="setImages" ref="image_input" multiple class="w-full p-4 border border-gray-400"
                    type="file" placeholder="file">
            </div>
            <div class="mb-4">
                <div class="flex items-center gap-4">
                    <div v-for="image in entries.post.images" class="border border-gray-200">
                        <img :src="image.url" :alt="post.title">
                        <a @click.prevent="destroyImage(image)" href="#"
                            class="block py-2 text-center text-white bg- -400 border border-indigo-700">УДАЛИТЬ</a>
                    </div>

                </div>
            </div>
            <div class="mb-4">
                <textarea v-model="entries.tags" class="w-full p-4 border border-gray-400 resize-none" type="text"
                    placeholder="tags" />
            </div>
            <div class="mb-4">
                <textarea v-model="entries.post.content" class="w-full p-4 border border-gray-400 resize-none"
                    type="text" placeholder="content" />
            </div>
            <div class="mb-4">
                <a @click.prevent="updatePost" href="#"
                    class="inline-block px-3 py-2 bg-emerald-700 border border-emerald-800 text-white">Сохранить</a>
            </div>
        </div>
    </div>
</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from "@inertiajs/vue3";
import axios from 'axios';

export default {
    name: "Edit",
    layout: AdminLayout,
    props: {
        post: {
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
                post: this.post,
                // post: {
                //     title: '',
                //     content: '',
                //     published_at: '',
                //     category_id: null,
                // },
                images: [],
                // tags: '',
                tags: this.post.tags_as_string,
                _method: 'PATCH'
            },
            errors: [],
            isSuccess: false
        }
    },
    methods: {
        updatePost() {
            axios.post(route('admin.posts.update', this.post.id), this.entries, {
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
                    this.entries.tags = ''

                    this.$refs.image_input.value = null
                    this.$nextTick(() => {
                        this.isSuccess = true
                    })
                })
                .catch((e) => {
                    this.errors = e.response.data.errors
                })

        },
        setImages(e) {
            this.entries.images = e.target.files;
        },
        destroyImage(image) {
            axios.delete(route('admin.posts.destroy', image.id))
                .then(() => { 
                    const index = this.entries.post.images.indexOf(image)
                    this.entries.post.images.splice(index, 1)
                })
                .catch((e) => {

                })
        }
    },
    watch: {
        entries: {
            handler(newValue, oldValue) {
                this.errors = []
                this.isSuccess = false
            },
            deep: true
        }
    }
}

</script>

<style scoped></style>