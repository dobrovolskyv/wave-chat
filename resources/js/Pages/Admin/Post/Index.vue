<template>
    <div class="w-1/2 mx-auto my-10">
        <div v-for="post in posts" class="mb-4 bg-white p-4 border border-gray-200">
            <h3 class="text-bold text-2xl mb-2">{{ post.title }}</h3>
            <p class="text-gray-500">{{ post.content }}</p>

        </div>
    </div>
</template>

<script>
export default {
    name: "Index",
    props: {
        posts: {
            required: false,
            type: Array
        }
    }
}

</script>

<style scoped></style>