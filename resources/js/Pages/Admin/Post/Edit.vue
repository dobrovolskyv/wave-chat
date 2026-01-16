<template>
    <div class="mb-4">
        <Link :href="route('admin.posts.index')"
            class="inline-block px-3 py-2 bg-sky-700 border border-sky-800 text-white text-xs">ПОСТЫ
        </Link>
    </div>
    <div v-if="isSuccess" class="mb-4 text-xs bg-green-700 border border-green-800 text-white p-4">
        SUCCESS!
    </div>
    <div class="mb-4 bg-white p-4 border border-gray-200">
        <div class="mb-4">
            <input v-model="entries.post.title" class="w-full p-4 border border-gray-200" type="text"
                placeholder="title" />
            <div v-if="errors['post.title']" class="text-red-600 text-xs">
                <p v-for="error in errors['post.title']" class="mb-2">{{ error }}</p>
            </div>
        </div>
        <div class="mb-4">
            <input v-model="entries.post.published_at" class="w-full p-4 border border-gray-200" type="date"
                placeholder="published_at" />
        </div>
        <div class="mb-4">
            <select v-model="entries.post.category_id" class="w-full p-4 border border-gray-200">
                <option value="null" disabled>Choose your category</option>
                <option v-for="category in categories" :value="category.id">{{ category.title }}</option>
            </select>
            <div v-if="errors['post.category_id']" class="text-red-600 text-xs">
                <p v-for="error in errors['post.category_id']" class="mb-2">{{ error }}</p>
            </div>
        </div>
        <div class="mb-4">
            <input @change="setImages" multiple ref="image_input" class="w-full p-4 border border-gray-200" type="file"
                placeholder="file" />
        </div>
        <div class="mb-4">
            <div class="flex gap-4">
                <div v-for="image in entries.post.images">
                    <img :src="image.url" :alt="post.title" class="border border-gray-200">
                    <a @click.prevent="destroyImage(image)" href="#"
                        class="block py-2 text-center text-white bg-indigo-600 border border-indigo-700">УДАЛИТЬ</a>
                </div>
            </div>
        </div>
        <div class="mb-4">
            <textarea v-model="entries.tags" class="w-full p-4 border border-gray-200" placeholder="tags" />
        </div>
        <div class="mb-4">
            <textarea v-model="entries.post.content" class="w-full p-4 border border-gray-200" placeholder="content" />
        </div>

        <div class="mb-4">
            <a @click.prevent="updatePost" href="#"
                class="inline-block px-3 py-2 bg-teal-700 border border-teal-800 text-white text-xs">СОХРАНИТЬ</a>
        </div>
    </div>
</template>
<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/vue3";
import axios from "axios";

export default {
    name: "Edit",

    layout: AdminLayout,
    props: {
        post: {
            required: false,
            type: Object
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
                images: [],
                tags: this.post.tags_as_string,
                _method: 'PATCH'
            },
            errors: [],
            isSuccess: false,
        }
    },

    methods: {
        updatePost() {
            axios.post(route('admin.posts.update', this.post.id), this.entries, {
                headers: {
                    "Content-Type": "multipart/form-data"
                }
            })
                .then(res => {
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
                .catch(e => {
                    this.errors = e.response.data.errors
                    console.log(this.errors);
                })
        },

        setImages(e) {
            this.entries.images = e.target.files;
        },
        destroyImage(image) {
            axios.delete(route('admin.images.destroy', image.id))
                .then(res => {
                    const index = this.entries.post.images.indexOf(image)
                    this.entries.post.images.splice(index, 1)
                })
        }
    },

    watch: {
        entries: {
            handler(new_val, old_val) {
                this.errors = []
                this.isSuccess = false
            },
            deep: true,
        }
    }
}
</script>
<style scoped></style>