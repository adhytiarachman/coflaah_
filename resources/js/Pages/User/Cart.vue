<template>
    <UserLayout>
        <div
            class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 py-4 sm:py-6 lg:py-8"
        >
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Header dengan animasi -->
                <div class="text-center mb-8 sm:mb-10 lg:mb-12 animate-fade-in">
                    <div class="inline-flex items-center space-x-3 mb-4">
                        <div
                            class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center animate-pulse-slow"
                        >
                            <svg
                                class="w-5 h-5 sm:w-6 sm:h-6 text-white"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m0 0h8.5"
                                />
                            </svg>
                        </div>
                        <h1
                            class="text-2xl sm:text-3xl lg:text-4xl font-bold bg-gradient-to-r from-gray-900 via-blue-900 to-purple-900 bg-clip-text text-transparent"
                        >
                            Keranjang Belanja
                        </h1>
                    </div>
                    <p class="text-gray-600 text-base sm:text-lg">
                        {{ cartItems.length }} item dalam keranjang Anda
                    </p>
                    <div
                        class="w-20 sm:w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto mt-4 rounded-full"
                    ></div>
                </div>

                <div v-if="cartItems.length > 0" class="space-y-8">
                    <!-- Cart Items -->
                    <div class="space-y-6">
                        <div
                            v-for="(item, index) in cartItems"
                            :key="item.product_id"
                            class="group bg-white/70 backdrop-blur-sm border border-white/50 rounded-2xl p-4 sm:p-6 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-1 animate-slide-in"
                            :style="`animation-delay: ${index * 0.1}s`"
                        >
                            <div
                                class="flex flex-col sm:flex-row items-start sm:items-center space-y-4 sm:space-y-0 sm:space-x-6"
                            >
                                <!-- Product Image -->
                                <div
                                    class="relative overflow-hidden rounded-xl bg-gradient-to-br from-gray-100 to-gray-200 group-hover:from-blue-100 group-hover:to-purple-100 transition-all duration-300 mx-auto sm:mx-0"
                                >
                                    <img
                                        :src="`/storage/${item.image}`"
                                        class="w-20 h-20 sm:w-24 sm:h-24 object-cover transition-transform duration-300 group-hover:scale-110"
                                        alt="Produk"
                                    />
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                                    ></div>
                                </div>

                                <!-- Product Info -->
                                <div
                                    class="flex-1 text-center sm:text-left w-full"
                                >
                                    <h3
                                        class="font-bold text-lg sm:text-xl text-gray-800 mb-2 group-hover:text-blue-600 transition-colors duration-300"
                                    >
                                        {{ item.name }}
                                    </h3>
                                    <div
                                        class="flex flex-col sm:flex-row items-center justify-center sm:justify-start space-y-1 sm:space-y-0 sm:space-x-2 mb-3"
                                    >
                                        <span class="text-sm text-gray-500"
                                            >Harga satuan:</span
                                        >
                                        <span
                                            class="text-base sm:text-lg font-semibold text-blue-600"
                                        >
                                            Rp {{ item.price.toLocaleString() }}
                                        </span>
                                    </div>

                                    <!-- Quantity Controls -->
                                    <div
                                        class="flex flex-col sm:flex-row items-center justify-center sm:justify-start space-y-2 sm:space-y-0 sm:space-x-4"
                                    >
                                        <span
                                            class="text-sm text-gray-600 font-medium"
                                            >Jumlah:</span
                                        >
                                        <div
                                            class="flex items-center space-x-2 bg-gray-50 rounded-full p-1"
                                        >
                                            <button
                                                @click="
                                                    updateQty(
                                                        item.product_id,
                                                        item.quantity - 1
                                                    )
                                                "
                                                :disabled="
                                                    item.quantity <= 1 ||
                                                    isUpdating
                                                "
                                                class="w-8 h-8 bg-white rounded-full shadow-md hover:shadow-lg disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200 flex items-center justify-center hover:bg-red-50 group"
                                            >
                                                <svg
                                                    class="w-4 h-4 text-gray-600 group-hover:text-red-500"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M20 12H4"
                                                    />
                                                </svg>
                                            </button>
                                            <span
                                                class="w-12 text-center font-bold text-lg text-gray-800"
                                                >{{ item.quantity }}</span
                                            >
                                            <button
                                                @click="
                                                    updateQty(
                                                        item.product_id,
                                                        item.quantity + 1
                                                    )
                                                "
                                                :disabled="isUpdating"
                                                class="w-8 h-8 bg-white rounded-full shadow-md hover:shadow-lg disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200 flex items-center justify-center hover:bg-green-50 group"
                                            >
                                                <svg
                                                    class="w-4 h-4 text-gray-600 group-hover:text-green-500"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                                                    />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Price & Remove -->
                                <div
                                    class="text-center sm:text-right space-y-3 w-full sm:w-auto"
                                >
                                    <div class="space-y-1">
                                        <p class="text-sm text-gray-500">
                                            Subtotal:
                                        </p>
                                        <p
                                            class="text-xl sm:text-2xl font-bold bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent"
                                        >
                                            Rp
                                            {{
                                                (
                                                    item.price * item.quantity
                                                ).toLocaleString()
                                            }}
                                        </p>
                                    </div>
                                    <button
                                        @click="removeItem(item.product_id)"
                                        :disabled="isUpdating"
                                        class="flex items-center space-x-1 text-red-500 hover:text-red-700 hover:bg-red-50 px-3 py-1 rounded-full transition-all duration-200 disabled:opacity-50 mx-auto sm:mx-0"
                                    >
                                        <svg
                                            class="w-4 h-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                            />
                                        </svg>
                                        <span class="text-sm font-medium"
                                            >Hapus</span
                                        >
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div
                        class="bg-white/80 backdrop-blur-sm border border-white/50 rounded-2xl p-6 sm:p-8 shadow-xl animate-fade-in"
                    >
                        <h2
                            class="text-xl sm:text-2xl font-bold text-gray-800 mb-6 text-center"
                        >
                            Ringkasan Pesanan
                        </h2>

                        <div class="space-y-4 mb-6">
                            <div
                                class="flex justify-between items-center py-2 border-b border-gray-100"
                            >
                                <span class="text-sm sm:text-base text-gray-600"
                                    >Subtotal ({{
                                        cartItems.length
                                    }}
                                    item)</span
                                >
                                <span
                                    class="text-sm sm:text-base font-semibold text-gray-800"
                                    >Rp {{ totalPrice.toLocaleString() }}</span
                                >
                            </div>
                            <div
                                class="flex justify-between items-center py-3 border-t-2 border-gray-200"
                            >
                                <span
                                    class="text-lg sm:text-xl font-bold text-gray-800"
                                    >Total</span
                                >
                                <span
                                    class="text-2xl sm:text-3xl font-bold bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent"
                                >
                                    Rp {{ totalPrice.toLocaleString() }}
                                </span>
                            </div>
                        </div>

                        <button
                            @click="payNow"
                            :disabled="isProcessing"
                            class="w-full py-3 sm:py-4 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-bold text-base sm:text-lg rounded-xl shadow-lg hover:shadow-xl disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-300 transform hover:scale-105 active:scale-95 relative overflow-hidden group"
                        >
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                            ></div>
                            <div
                                class="relative flex items-center justify-center space-x-2"
                            >
                                <svg
                                    v-if="isProcessing"
                                    class="animate-spin w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                                    />
                                </svg>
                                <svg
                                    v-else
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"
                                    />
                                </svg>
                                <span>{{
                                    isProcessing
                                        ? "Memproses..."
                                        : "Lanjut Bayar"
                                }}</span>
                            </div>
                        </button>

                        <div class="mt-6 text-center">
                            <p class="text-xs sm:text-sm text-gray-500 mb-2">
                                Pembayaran aman & terpercaya
                            </p>
                            <div class="flex justify-center space-x-2">
                                <div
                                    class="w-6 h-4 sm:w-8 sm:h-5 bg-blue-600 rounded"
                                ></div>
                                <div
                                    class="w-6 h-4 sm:w-8 sm:h-5 bg-red-600 rounded"
                                ></div>
                                <div
                                    class="w-6 h-4 sm:w-8 sm:h-5 bg-yellow-500 rounded"
                                ></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Empty Cart State -->
                <div v-else class="text-center py-20 animate-fade-in">
                    <div class="max-w-md mx-auto">
                        <div
                            class="w-32 h-32 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mx-auto mb-8 animate-bounce-slow"
                        >
                            <svg
                                class="w-16 h-16 text-gray-400"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m0 0h8.5"
                                />
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">
                            Keranjang Kosong
                        </h2>
                        <p class="text-gray-600 text-lg mb-8">
                            Belum ada produk dalam keranjang Anda. Yuk mulai
                            berbelanja!
                        </p>
                        <button
                            @click="router.visit('/')"
                            class="inline-flex items-center space-x-2 px-8 py-3 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105"
                        >
                            <svg
                                class="w-5 h-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M7 16l-4-4m0 0l4-4m-4 4h18"
                                />
                            </svg>
                            <span>Mulai Berbelanja</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Loading Overlay -->
        <div
            v-if="isUpdating"
            class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50"
        >
            <div class="bg-white rounded-2xl p-8 shadow-2xl">
                <div class="flex items-center space-x-4">
                    <div
                        class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"
                    ></div>
                    <span class="text-lg font-semibold text-gray-800"
                        >Memperbarui keranjang...</span
                    >
                </div>
            </div>
        </div>
    </UserLayout>
</template>

<script setup>
import UserLayout from "@/Layouts/UserLayout.vue";
import { usePage, router } from "@inertiajs/vue3";
import { computed, ref } from "vue";

// Ambil cart dari props inertia
const props = defineProps({ cart: Object });
const cartItems = computed(() => Object.values(usePage().props.cart ?? {}));

// Loading states
const isUpdating = ref(false);
const isProcessing = ref(false);

// Hitung total harga semua item
const totalPrice = computed(() =>
    cartItems.value.reduce((sum, item) => sum + item.price * item.quantity, 0)
);

// Update jumlah item
function updateQty(productId, quantity) {
    isUpdating.value = true;
    router.post(
        route("user.cart.update"),
        {
            product_id: productId,
            quantity: quantity,
        },
        {
            preserveScroll: true,
            onFinish: () => {
                isUpdating.value = false;
            },
        }
    );
}

// Hapus item dari keranjang
function removeItem(productId) {
    isUpdating.value = true;
    router.post(
        route("user.cart.remove"),
        {
            product_id: productId,
        },
        {
            preserveScroll: true,
            onFinish: () => {
                isUpdating.value = false;
            },
        }
    );
}

// Proses pembayaran
function payNow() {
    isProcessing.value = true;
    router.post(
        route("user.pay"),
        {},
        {
            preserveScroll: true,
            onFinish: () => {
                isProcessing.value = false;
            },
        }
    );
}
</script>

<style scoped>
@keyframes fade-in {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slide-in {
    from {
        opacity: 0;
        transform: translateX(-20px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes bounce-slow {
    0%,
    20%,
    50%,
    80%,
    100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-10px);
    }
    60% {
        transform: translateY(-5px);
    }
}

@keyframes pulse-slow {
    0%,
    100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
}

.animate-fade-in {
    animation: fade-in 0.6s ease-out;
}

.animate-slide-in {
    animation: slide-in 0.6s ease-out;
}

.animate-bounce-slow {
    animation: bounce-slow 3s ease-in-out infinite;
}

.animate-pulse-slow {
    animation: pulse-slow 2s ease-in-out infinite;
}
</style>
