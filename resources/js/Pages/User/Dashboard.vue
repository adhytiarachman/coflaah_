<template>
    <UserLayout>
        <section
            class="min-h-screen bg-gradient-to-br from-amber-50 via-orange-50 to-yellow-50 text-gray-800"
        >
            <!-- Header dengan gradient dan shadow -->
            <div
                class="bg-gradient-to-r from-amber-900 via-orange-900 to-amber-800 text-white"
            >
                <div class="container mx-auto px-6 py-12">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-4xl font-bold mb-2 tracking-tight">
                                Dashboard Pengguna
                            </h1>
                            <p class="text-amber-100 text-lg">
                                Selamat datang kembali, {{ user.name }}! ☕
                            </p>
                        </div>
                        <div class="hidden md:block">
                            <div
                                class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20"
                            >
                                <div class="flex items-center space-x-4">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-br from-amber-400 to-orange-500 rounded-full flex items-center justify-center"
                                    >
                                        <span
                                            class="text-white font-bold text-lg"
                                            >{{ user.name.charAt(0) }}</span
                                        >
                                    </div>
                                    <div>
                                        <p class="text-white font-medium">
                                            {{ user.name }}
                                        </p>
                                        <p class="text-amber-200 text-sm">
                                            Coffee Enthusiast
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mx-auto px-6 py-8 space-y-8">
                <!-- Welcome Info Box -->
                <div
                    class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/50 p-8 hover:shadow-xl transition-all duration-300"
                >
                    <div class="flex items-start space-x-4">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-amber-400 to-orange-500 rounded-2xl flex items-center justify-center flex-shrink-0"
                        >
                            <span class="text-2xl">☕</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-amber-900 mb-2">
                                Selamat Datang di Coffee Coflah
                            </h3>
                            <p class="text-gray-700 leading-relaxed">
                                Nikmati pengalaman terbaik dalam menjelajahi
                                dunia kopi. Di sini kamu dapat melihat riwayat
                                pembelian, melacak status transaksi, dan
                                menemukan rekomendasi produk kopi terbaik yang
                                disesuaikan dengan selera unikmu.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Rekomendasi Produk -->
                <div
                    v-if="recommendations.length"
                    class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/50 p-8 hover:shadow-xl transition-all duration-300"
                >
                    <div class="flex items-center justify-between mb-6">
                        <h2
                            class="text-2xl font-bold text-amber-900 flex items-center"
                        >
                            <span class="mr-3">🌟</span>
                            Rekomendasi Spesial Untukmu
                        </h2>
                        <button
                            class="text-amber-700 hover:text-amber-900 font-medium text-sm transition-colors"
                        >
                            Lihat Semua →
                        </button>
                    </div>

                    <div
                        :class="[
                            'grid gap-6',
                            recommendations.length === 1
                                ? 'grid-cols-1 justify-items-center'
                                : recommendations.length === 2
                                ? 'grid-cols-1 md:grid-cols-2'
                                : 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
                        ]"
                    >
                        <div
                            v-for="product in recommendations"
                            :key="product.id"
                            class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-amber-200 transform hover:-translate-y-1"
                        >
                            <div class="relative overflow-hidden">
                                <img
                                    :src="product.image_url"
                                    :alt="product.name"
                                    class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-300"
                                />
                                <div class="absolute top-4 right-4">
                                    <div
                                        class="w-8 h-8 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-lg"
                                    >
                                        <span class="text-red-500 text-sm"
                                            >❤️</span
                                        >
                                    </div>
                                </div>
                                <div class="absolute bottom-4 left-4">
                                    <div
                                        class="bg-amber-500 text-white text-xs font-bold px-3 py-1 rounded-full"
                                    >
                                        HOT
                                    </div>
                                </div>
                            </div>

                            <div class="p-6">
                                <h3
                                    class="text-lg font-bold text-gray-900 mb-2 group-hover:text-amber-900 transition-colors"
                                >
                                    {{ product.name }}
                                </h3>
                                <p
                                    class="text-gray-600 mb-4 line-clamp-2 text-sm leading-relaxed"
                                >
                                    {{
                                        product.description ||
                                        "Produk kopi premium dengan cita rasa yang tak terlupakan."
                                    }}
                                </p>

                                <div class="flex items-center justify-between">
                                    <div>
                                        <p
                                            class="text-2xl font-bold text-amber-900"
                                        >
                                            Rp{{
                                                product.price.toLocaleString(
                                                    "id-ID"
                                                )
                                            }}
                                        </p>
                                        <p class="text-xs text-gray-500">
                                            per porsi
                                        </p>
                                    </div>
                                    <Link
                                        href="/user/products"
                                        class="bg-gradient-to-r from-amber-500 to-orange-600 text-white font-semibold text-sm px-5 py-2 rounded-xl shadow-md hover:from-amber-600 hover:to-orange-700 hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300"
                                    >
                                        Pesan
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </UserLayout>
</template>

<script setup>
import { usePage } from "@inertiajs/vue3";
import UserLayout from "@/Layouts/UserLayout.vue";
import { Link } from "@inertiajs/vue3";

const page = usePage();
const user = page.props.auth.user;
const recommendations = page.props.recommendations || [];
</script>

<style scoped>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
