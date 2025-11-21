<script setup>
import { useForm } from '@inertiajs/vue3';
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    category: Object,
});

const form = useForm({
    category_name: props.category.category_name,
    category_description: props.category.category_description,
    category_rating: props.category.category_rating,
    category_status: props.category.category_status,
});

const submit = () => {
    form.put(route('categories.update', props.category.id));
};
</script>

<template>
    <Head title="Edit Category" />

    <AppLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Edit Category</h2>
                <Link :href="route('categories.index')" class="px-4 py-2 bg-gray-800 dark:bg-gray-700 text-white rounded-md hover:bg-gray-700 dark:hover:bg-gray-600">
                    Back to Categories
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6">
                        <form @submit.prevent="submit">
                            <div class="mb-4">
                                <InputLabel for="category_name" value="Category Name" class="dark:text-gray-300" />
                                <TextInput
                                    id="category_name"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.category_name"
                                    required
                                    autofocus
                                />
                                <InputError class="mt-2" :message="form.errors.category_name" />
                            </div>

                            <div class="mb-4">
                                <InputLabel for="category_description" value="Category Description" class="dark:text-gray-300" />
                                <textarea
                                    id="category_description"
                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                    v-model="form.category_description"
                                    required
                                    rows="3"
                                ></textarea>
                                <InputError class="mt-2" :message="form.errors.category_description" />
                            </div>

                            <div class="mb-4">
                                <InputLabel for="category_rating" value="Category Rating" class="dark:text-gray-300" />
                                <TextInput
                                    id="category_rating"
                                    type="number"
                                    class="mt-1 block w-full"
                                    v-model="form.category_rating"
                                    required
                                    min="1"
                                    max="5"
                                    step="0.1"
                                    placeholder="1.0 to 5.0"
                                />
                                <InputError class="mt-2" :message="form.errors.category_rating" />
                            </div>

                            <div class="mb-4">
                                <div class="flex items-center">
                                    <input
                                        id="category_status"
                                        type="checkbox"
                                        class="rounded border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                        v-model="form.category_status"
                                    />
                                    <InputLabel for="category_status" value="Category Status (Active)" class="ml-2 dark:text-gray-300"/>
                                </div>
                                <InputError class="mt-2" :message="form.errors.category_status" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Update Category
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
