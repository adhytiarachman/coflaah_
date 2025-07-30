<template>
    <UserLayout>
        <div
            class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-gray-50"
        >
            <!-- Hero Section with Animated Header -->
            <div
                class="relative overflow-hidden bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 text-white"
            >
                <div class="absolute inset-0 bg-black/20"></div>
                <div
                    class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16"
                >
                    <div class="text-center">
                        <h1
                            class="text-4xl md:text-6xl font-bold mb-6 animate-fade-in-up"
                        >
                            <span
                                class="bg-gradient-to-r from-yellow-400 to-orange-400 bg-clip-text text-transparent"
                            >
                                Koleksi Premium
                            </span>
                        </h1>
                        <p
                            class="text-xl md:text-2xl text-gray-200 animate-fade-in-up animation-delay-200"
                        >
                            Temukan produk terbaik pilihan kami
                        </p>
                    </div>
                </div>
                <!-- Animated waves -->
                <div class="absolute bottom-0 left-0 w-full overflow-hidden">
                    <svg
                        class="relative block w-full h-16"
                        viewBox="0 0 1200 120"
                        preserveAspectRatio="none"
                    >
                        <path
                            d="M1200 120L0 16.48 0 0 1200 0 1200 120z"
                            class="fill-white animate-wave"
                        ></path>
                    </svg>
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <!-- Enhanced Filter Section -->
                <div class="mb-12">
                    <div
                        class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 animate-slide-in-down"
                    >
                        <h2
                            class="text-2xl font-bold mb-8 text-gray-800 flex items-center"
                        >
                            <span
                                class="w-8 h-8 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mr-3"
                            >
                                <svg
                                    class="w-4 h-4 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"
                                    ></path>
                                </svg>
                            </span>
                            Filter Kategori
                        </h2>
                        <div class="flex flex-wrap gap-4">
                            <button
                                @click="selectedCategory = null"
                                :class="[
                                    'group relative px-6 py-3 rounded-full text-sm font-semibold transition-all duration-300 transform hover:scale-105',
                                    selectedCategory === null
                                        ? 'bg-gradient-to-r from-purple-600 to-pink-600 text-white shadow-lg shadow-purple-500/25'
                                        : 'bg-white text-gray-700 hover:bg-gray-50 border-2 border-gray-200 hover:border-purple-300',
                                ]"
                            >
                                <span class="relative z-10"
                                    >Semua Kategori</span
                                >
                                <span
                                    :class="[
                                        'ml-2 px-3 py-1 rounded-full text-xs font-bold transition-all duration-200',
                                        selectedCategory === null
                                            ? 'bg-white/20 text-white'
                                            : 'bg-gradient-to-r from-purple-100 to-pink-100 text-purple-700',
                                    ]"
                                >
                                    {{ products.length }}
                                </span>
                                <div
                                    v-if="selectedCategory === null"
                                    class="absolute inset-0 rounded-full bg-gradient-to-r from-purple-600 to-pink-600 blur opacity-30 group-hover:opacity-50 transition-opacity duration-300"
                                ></div>
                            </button>

                            <button
                                v-for="category in categories"
                                :key="category.name"
                                @click="selectedCategory = category.name"
                                :class="[
                                    'group relative px-6 py-3 rounded-full text-sm font-semibold transition-all duration-300 transform hover:scale-105',
                                    selectedCategory === category.name
                                        ? 'bg-gradient-to-r from-purple-600 to-pink-600 text-white shadow-lg shadow-purple-500/25'
                                        : 'bg-white text-gray-700 hover:bg-gray-50 border-2 border-gray-200 hover:border-purple-300',
                                ]"
                            >
                                <span class="relative z-10">{{
                                    category.name
                                }}</span>
                                <span
                                    :class="[
                                        'ml-2 px-3 py-1 rounded-full text-xs font-bold transition-all duration-200',
                                        selectedCategory === category.name
                                            ? 'bg-white/20 text-white'
                                            : 'bg-gradient-to-r from-purple-100 to-pink-100 text-purple-700',
                                    ]"
                                >
                                    {{ category.count }}
                                </span>
                                <div
                                    v-if="selectedCategory === category.name"
                                    class="absolute inset-0 rounded-full bg-gradient-to-r from-purple-600 to-pink-600 blur opacity-30 group-hover:opacity-50 transition-opacity duration-300"
                                ></div>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Product Info -->
                <div class="mb-8">
                    <div
                        class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-xl p-6 border border-blue-100"
                    >
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div
                                    class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center"
                                >
                                    <svg
                                        class="w-6 h-6 text-white"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"
                                        ></path>
                                    </svg>
                                </div>
                                <div>
                                    <p
                                        class="text-lg font-semibold text-gray-800"
                                    >
                                        {{ filteredProducts.length }} dari
                                        {{ products.length }} produk
                                    </p>
                                    <p class="text-sm text-gray-600">
                                        <span
                                            v-if="selectedCategory"
                                            class="font-medium"
                                        >
                                            dalam kategori "{{
                                                selectedCategory
                                            }}"
                                        </span>
                                        <span v-else>tersedia untuk Anda</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Products Grid -->
                <div
                    v-if="filteredProducts.length > 0"
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8"
                >
                    <div
                        v-for="(product, index) in filteredProducts"
                        :key="product.id"
                        class="group bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 animate-fade-in-up"
                        :style="{ 'animation-delay': `${index * 100}ms` }"
                    >
                        <!-- Product Image -->
                        <div class="relative overflow-hidden">
                            <div v-if="product.image_url" class="relative">
                                <img
                                    :src="product.image_url"
                                    :alt="product.name"
                                    class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700"
                                />
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                                ></div>
                            </div>
                            <div
                                v-else
                                class="w-full h-64 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center"
                            >
                                <div class="text-center">
                                    <svg
                                        class="w-12 h-12 text-gray-400 mx-auto mb-2"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                        ></path>
                                    </svg>
                                    <p class="text-sm text-gray-400">
                                        Tidak ada gambar
                                    </p>
                                </div>
                            </div>

                            <!-- Category Badge -->
                            <div class="absolute top-4 left-4">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gradient-to-r from-purple-600 to-pink-600 text-white shadow-lg"
                                >
                                    {{ product.category }}
                                </span>
                            </div>

                            <!-- Stock Badge -->
                            <div class="absolute top-4 right-4">
                                <span
                                    :class="[
                                        'inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold shadow-lg',
                                        product.stock > 10
                                            ? 'bg-green-500 text-white'
                                            : product.stock > 0
                                            ? 'bg-yellow-500 text-white'
                                            : 'bg-red-500 text-white',
                                    ]"
                                >
                                    {{
                                        product.stock > 0
                                            ? `${product.stock} tersisa`
                                            : "Habis"
                                    }}
                                </span>
                            </div>
                        </div>

                        <!-- Product Details -->
                        <div class="p-6">
                            <h3
                                class="text-xl font-bold text-gray-900 mb-3 group-hover:text-purple-600 transition-colors duration-300"
                            >
                                {{ product.name }}
                            </h3>

                            <div class="flex items-center justify-between mb-4">
                                <div class="flex flex-col">
                                    <span
                                        class="text-2xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent"
                                    >
                                        Rp
                                        {{
                                            product.price.toLocaleString(
                                                "id-ID"
                                            )
                                        }}
                                    </span>
                                    <span class="text-sm text-gray-500"
                                        >Per item</span
                                    >
                                </div>
                                <div class="flex items-center space-x-1">
                                    <svg
                                        class="w-4 h-4 text-yellow-400"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                        ></path>
                                    </svg>
                                    <span class="text-sm text-gray-600"
                                        >4.8</span
                                    >
                                </div>
                            </div>

                            <!-- Action Button -->
                            <button
                                @click="addToCart(product)"
                                :disabled="product.stock === 0"
                                :class="[
                                    'w-full py-3 px-6 rounded-xl font-semibold text-sm transition-all duration-300 transform hover:scale-105',
                                    product.stock > 0
                                        ? 'bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white shadow-lg shadow-purple-500/25 hover:shadow-xl hover:shadow-purple-500/40'
                                        : 'bg-gray-300 text-gray-500 cursor-not-allowed',
                                ]"
                            >
                                <span
                                    class="flex items-center justify-center space-x-2"
                                >
                                    <svg
                                        v-if="product.stock > 0"
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 2.5M7 13l2.5 2.5m6-2.5v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"
                                        ></path>
                                    </svg>
                                    <span>{{
                                        product.stock > 0
                                            ? "Tambah ke Keranjang"
                                            : "Stok Habis"
                                    }}</span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Empty State -->
                <div v-else class="text-center py-20">
                    <div class="max-w-md mx-auto">
                        <div
                            class="w-24 h-24 bg-gradient-to-br from-purple-100 to-pink-100 rounded-full flex items-center justify-center mx-auto mb-8"
                        >
                            <svg
                                class="w-12 h-12 text-purple-500"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"
                                ></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">
                            Tidak ada produk ditemukan
                        </h3>
                        <p class="text-gray-600 mb-8">
                            Coba ubah filter kategori atau lihat semua produk
                            yang tersedia
                        </p>
                        <button
                            @click="selectedCategory = null"
                            class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold rounded-xl hover:from-purple-700 hover:to-pink-700 transition-all duration-300 transform hover:scale-105 shadow-lg shadow-purple-500/25"
                        >
                            <svg
                                class="w-5 h-5 mr-2"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                                ></path>
                            </svg>
                            Lihat Semua Produk
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </UserLayout>
</template>

<script setup>
import UserLayout from "@/Layouts/UserLayout.vue";
import { router } from "@inertiajs/vue3";
import { ref, computed } from "vue";

const props = defineProps({
    products: Array,
});

const selectedCategory = ref(null);

const categories = computed(() => {
    const categoryCount = {};
    props.products.forEach((product) => {
        if (categoryCount[product.category]) {
            categoryCount[product.category]++;
        } else {
            categoryCount[product.category] = 1;
        }
    });
    return Object.entries(categoryCount).map(([name, count]) => ({
        name,
        count,
    }));
});

const filteredProducts = computed(() => {
    if (!selectedCategory.value) {
        return props.products;
    }
    return props.products.filter(
        (product) => product.category === selectedCategory.value
    );
});

function addToCart(product) {
    router.post(
        "/user/cart/add",
        {
            product_id: product.id,
        },
        {
            onSuccess: () => {
                router.visit("/user/cart");
            },
        }
    );
}
</script>

<style scoped>
@keyframes fade-in-up {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slide-in-down {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes wave {
    0% {
        transform: translateX(0);
    }
    50% {
        transform: translateX(-25%);
    }
    100% {
        transform: translateX(-50%);
    }
}

.animate-fade-in-up {
    animation: fade-in-up 0.8s ease-out forwards;
}

.animate-slide-in-down {
    animation: slide-in-down 0.6s ease-out forwards;
}

.animate-wave {
    animation: wave 3s ease-in-out infinite;
}

.animation-delay-200 {
    animation-delay: 200ms;
}

/* Smooth scrolling */
html {
    scroll-behavior: smooth;
}

/* Custom scrollbar */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(to bottom, #8b5cf6, #ec4899);
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(to bottom, #7c3aed, #db2777);
}
</style>
