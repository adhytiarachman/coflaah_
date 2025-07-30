<template>
    <div class="min-h-screen flex bg-[#f9f5f2] text-gray-800">
        <!-- Sidebar -->
        <aside
            class="w-64 bg-white shadow-lg flex flex-col justify-between py-6 px-4"
        >
            <div>
                <h1 class="text-2xl font-bold text-brown-800 mb-6">
                    ☕ Coflah
                </h1>
                <nav class="space-y-3">
                    <Link
                        href="/user/dashboard"
                        class="block px-3 py-2 rounded-lg hover:bg-yellow-100 font-semibold transition"
                        :class="{
                            'text-yellow-600':
                                $page.url.startsWith('/user/dashboard'),
                        }"
                        >🏠 Beranda</Link
                    >

                    <Link
                        href="/user/products"
                        class="block px-3 py-2 rounded-lg hover:bg-yellow-100 font-semibold transition"
                        :class="{
                            'text-yellow-600':
                                $page.url.startsWith('/user/products'),
                        }"
                        >☕ Produk</Link
                    >

                    <Link
                        href="/user/history"
                        class="block px-3 py-2 rounded-lg hover:bg-yellow-100 font-semibold transition"
                        :class="{
                            'text-yellow-600':
                                $page.url.startsWith('/user/history'),
                        }"
                        >📜 Riwayat Pembelian</Link
                    >
                </nav>
            </div>

            <!-- Logout -->
            <!-- Logout -->
            <div>
                <form method="POST" :action="route('logout')">
                    <input type="hidden" name="_token" :value="csrf" />
                    <button
                        type="submit"
                        class="w-full px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-lg shadow transition"
                    >
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Konten Utama -->
        <div class="flex-1 flex flex-col">
            <!-- Topbar -->
            <header
                class="bg-white shadow p-4 flex justify-between items-center"
            >
                <span class="text-sm text-gray-600">Hai, {{ user.name }}</span>

                <!-- Icon Keranjang -->
                <Link href="/user/cart" class="relative">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-7 w-7 text-yellow-600 hover:text-yellow-700 transition"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.3 6.4a1 1 0 001 1.2h12.6a1 1 0 001-1.2L17 13M10 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z"
                        />
                    </svg>

                    <!-- Badge -->
                    <span
                        v-if="cartCount > 0"
                        class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full px-1.5 py-0.5 font-bold"
                    >
                        {{ cartCount }}
                    </span>
                </Link>
            </header>

            <!-- Konten Slot -->
            <main class="flex-1 p-6">
                <slot />
            </main>
        </div>
    </div>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { route } from "ziggy-js";

const page = usePage();
const csrf = page.props.csrf_token;

const user = page.props.auth.user;
const cartCount = page.props.cart_count ?? 0;
</script>
