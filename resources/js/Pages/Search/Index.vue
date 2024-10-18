<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";

// Define props
defineProps({
    results: Array,
});

// Setup form state
const form = useForm({
    query: "",
});

// Perform search action
const performSearch = () => {
    form.post(route("search.perform"), {
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
            form.reset();
        },
    });
};

// document.addEventListener("keyup", (event) => {
//     performSearch();
// });
</script>

<template>
    <Head title="Search" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Search
            </h2>
        </template>
        <div class="search-page">
            <h1>Search</h1>
            <form @submit.prevent="performSearch">
                <input
                    type="text"
                    v-model="form.query"
                    placeholder="Search..."
                />
                <button type="submit">Search</button>
            </form>

            <!-- <div v-if="results.length > 0">
                <h2>Results for "{{ form.query }}"</h2>
                <ul>
                    <li v-for="result in results" :key="result.id">
                        {{ result.name }}
                    </li>
                </ul>
            </div> -->

            <!-- <div v-else-if="form.query">
                <p>No results found.</p>
            </div> -->
        </div>
    </AuthenticatedLayout>
</template>
