<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps({
    product: Object,
});

const formatPrice = (price) => {
    return new Intl.NumberFormat('es-CO', {
        style: 'currency',
        currency: 'COP',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
    }).format(price);
};

const formatDate = (dateString) => {
    const date = new Date(dateString);
    return date.toLocaleDateString() + ' ' + date.toLocaleTimeString([], {hour: '2-digit', minute: '2-digit'});
};
</script>

<template>
    <Head title="Product Details"/>

    <AppLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Product Details
                </h2>
                <div class="flex space-x-2">
                    <Link :href="route('products.edit', product.id)"
                          class="px-4 py-2 bg-blue-600 dark:bg-blue-700 text-white rounded-md hover:bg-blue-700 dark:hover:bg-blue-600">
                        Edit Product
                    </Link>
                    <Link :href="route('products.index')"
                          class="px-4 py-2 bg-gray-800 dark:bg-gray-700 text-white rounded-md hover:bg-gray-700 dark:hover:bg-gray-600">
                        Back to Products
                    </Link>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6">
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white">Product Information</h3>

                            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">ID</p>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ product.id }}</p>
                                </div>

                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Product Name</p>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ product.product_name }}</p>
                                </div>

                                <div class="md:col-span-2">
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Description</p>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ product.product_description }}</p>
                                </div>

                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Price</p>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-white font-semibold">{{ formatPrice(product.product_price) }}</p>
                                </div>

                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Stock</p>
                                    <p class="mt-1 text-sm font-semibold" :class="{
                                        'text-red-600 dark:text-red-400': product.product_stock < 10,
                                        'text-yellow-600 dark:text-yellow-400': product.product_stock >= 10 && product.product_stock < 50,
                                        'text-green-600 dark:text-green-400': product.product_stock >= 50
                                    }">
                                        {{ product.product_stock }} units
                                    </p>
                                </div>

                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</p>
                                    <p class="mt-1">
                                        <span :class="{
                                            'px-2 inline-flex text-xs leading-5 font-semibold rounded-full': true,
                                            'bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100': product.product_status,
                                            'bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100': !product.product_status
                                        }">
                                            {{ product.product_status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </p>
                                </div>

                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Category</p>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                        {{ product.category ? product.category.category_name : 'No category assigned' }}
                                    </p>
                                </div>

                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Created At</p>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ formatDate(product.created_at) }}</p>
                                </div>

                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Updated At</p>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ formatDate(product.updated_at) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
