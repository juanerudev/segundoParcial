<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    categories: Array,
    selectedCategory: [String, Number]
});

const form = useForm({
    product_name: '',
    product_description: '',
    product_price: '',
    product_stock: '',
    product_status: true,
    fk_category_product: props.selectedCategory || '',
});

const submit = () => {
    form.post(route('products.store'));
};
</script>

<template>
    <Head title="Create Product"/>

    <AppLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Create Product</h2>
                <Link :href="route('products.index')"
                      class="px-4 py-2 bg-gray-800 dark:bg-gray-700 text-white rounded-md hover:bg-gray-700 dark:hover:bg-gray-600">
                    Back to Products
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6">
                        <form @submit.prevent="submit">
                            <div class="mb-4">
                                <InputLabel for="product_name" value="Product Name" class="dark:text-gray-300"/>
                                <TextInput
                                    id="product_name"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.product_name"
                                    required
                                    autofocus
                                />
                                <InputError class="mt-2" :message="form.errors.product_name"/>
                            </div>

                            <div class="mb-4">
                                <InputLabel for="product_description" value="Product Description" class="dark:text-gray-300"/>
                                <textarea
                                    id="product_description"
                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                    v-model="form.product_description"
                                    required
                                    rows="3"
                                ></textarea>
                                <InputError class="mt-2" :message="form.errors.product_description"/>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <InputLabel for="product_price" value="Price" class="dark:text-gray-300"/>
                                    <TextInput
                                        id="product_price"
                                        type="number"
                                        class="mt-1 block w-full"
                                        v-model="form.product_price"
                                        required
                                        min="0"
                                        step="0.01"
                                        placeholder="0.00"
                                    />
                                    <InputError class="mt-2" :message="form.errors.product_price"/>
                                </div>

                                <div>
                                    <InputLabel for="product_stock" value="Stock" class="dark:text-gray-300"/>
                                    <TextInput
                                        id="product_stock"
                                        type="number"
                                        class="mt-1 block w-full"
                                        v-model="form.product_stock"
                                        required
                                        min="0"
                                        step="1"
                                        placeholder="0"
                                    />
                                    <InputError class="mt-2" :message="form.errors.product_stock"/>
                                </div>
                            </div>

                            <div class="mb-4">
                                <InputLabel for="fk_category_product" value="Category" class="dark:text-gray-300"/>
                                <select
                                    id="fk_category_product"
                                    v-model="form.fk_category_product"
                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                >
                                    <option value="">Select a Category</option>
                                    <option v-for="category in categories" :key="category.id" :value="category.id">
                                        {{ category.category_name }}
                                    </option>
                                </select>
                                <InputError class="mt-2" :message="form.errors.fk_category_product"/>
                            </div>

                            <div class="mb-4">
                                <div class="flex items-center">
                                    <input
                                        id="product_status"
                                        type="checkbox"
                                        class="rounded border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                        v-model="form.product_status"
                                    />
                                    <InputLabel for="product_status" value="Product Status (Active)" class="ml-2 dark:text-gray-300"/>
                                </div>
                                <InputError class="mt-2" :message="form.errors.product_status"/>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }"
                                               :disabled="form.processing">
                                    Create Product
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
