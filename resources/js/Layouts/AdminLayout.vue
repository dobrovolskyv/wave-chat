<template>
    <section class="bg-white w-full">
        <header class="p-4">
            <h1>ADMIN PANEL</h1>
        </header>
    </section>
    <section class="w-full">
        <div class="flex items-start">
            <div class="w-1/4 bg-sky-700 min-h-screen">
                <nav class="text-lg text-white flex flex-col">
                    <Link class="border-b border-sky-800 p-4 border-t border-t-sky-300"
                        :href="route('admin.dashboard.index')">Dashboard</Link>
                    <Link class="border-b border-sky-800 p-4 border-t border-t-sky-300"
                        :href="route('admin.posts.index')">POSTS</Link>
                </nav>
            </div>
            <div class="w-3/4 bg-gray-100 p-4">
                <article>
                    <slot />
                </article>
            </div>
        </div>
    </section>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
    name: "AdminLayout",
    components: {
        Link
    }
}

</script>

<style scoped></style>