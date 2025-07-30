<template>
    <div class="flex min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <!-- Mobile Menu Button -->
        <button
            @click="toggleSidebar"
            class="fixed top-4 left-4 z-50 p-2 bg-white/90 backdrop-blur-sm rounded-lg shadow-lg md:hidden transition-all duration-300 hover:bg-white"
        >
            <svg
                class="w-6 h-6 text-gray-700"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"
                ></path>
            </svg>
        </button>

        <!-- Sidebar Overlay for Mobile -->
        <div
            v-if="sidebarOpen"
            @click="toggleSidebar"
            class="fixed inset-0 bg-black/30 backdrop-blur-sm z-40 md:hidden transition-opacity duration-300"
        ></div>

        <!-- Sidebar -->
        <aside
            :class="[
                'fixed md:relative z-50 w-72 bg-gradient-to-b from-slate-900 via-slate-800 to-slate-900 text-white flex flex-col transition-transform duration-300 ease-in-out shadow-2xl',
                sidebarOpen
                    ? 'translate-x-0'
                    : '-translate-x-full md:translate-x-0',
            ]"
        >
            <!-- Logo/Header -->
            <div
                class="p-6 border-b border-white/10 bg-gradient-to-r from-blue-600 to-purple-600"
            >
                <div class="flex items-center space-x-3">
                    <div
                        class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm"
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
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                            ></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-white">
                            Admin Panel
                        </h1>
                        <p class="text-blue-100 text-sm opacity-90">
                            Management System
                        </p>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 p-6 space-y-2">
                <Link
                    href="/admin/dashboard"
                    :class="[
                        'group flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 hover:bg-white/10 hover:shadow-lg',
                        isActive('/admin/dashboard')
                            ? 'bg-gradient-to-r from-blue-500/20 to-purple-500/20 border border-blue-500/30 shadow-lg'
                            : '',
                    ]"
                >
                    <svg
                        class="w-5 h-5 text-blue-400 group-hover:text-blue-300 transition-colors"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"
                        ></path>
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"
                        ></path>
                    </svg>
                    <span
                        class="font-medium group-hover:text-white transition-colors"
                        >Dashboard</span
                    >
                </Link>

                <Link
                    href="/admin/products"
                    :class="[
                        'group flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 hover:bg-white/10 hover:shadow-lg',
                        isActive('/admin/products')
                            ? 'bg-gradient-to-r from-blue-500/20 to-purple-500/20 border border-blue-500/30 shadow-lg'
                            : '',
                    ]"
                >
                    <svg
                        class="w-5 h-5 text-emerald-400 group-hover:text-emerald-300 transition-colors"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"
                        ></path>
                    </svg>
                    <span
                        class="font-medium group-hover:text-white transition-colors"
                        >Produk</span
                    >
                </Link>

                <Link
                    href="/admin/history"
                    :class="[
                        'group flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 hover:bg-white/10 hover:shadow-lg',
                        isActive('/admin/history')
                            ? 'bg-gradient-to-r from-blue-500/20 to-purple-500/20 border border-blue-500/30 shadow-lg'
                            : '',
                    ]"
                >
                    <svg
                        class="w-5 h-5 text-amber-400 group-hover:text-amber-300 transition-colors"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                        ></path>
                    </svg>
                    <span
                        class="font-medium group-hover:text-white transition-colors"
                        >History Pembayaran</span
                    >
                </Link>

                <Link
                    href="/admin/rekomendasi"
                    :class="[
                        'group flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 hover:bg-white/10 hover:shadow-lg',
                        isActive('/admin/rekomendasi')
                            ? 'bg-gradient-to-r from-blue-500/20 to-purple-500/20 border border-blue-500/30 shadow-lg'
                            : '',
                    ]"
                >
                    <svg
                        class="w-5 h-5 text-pink-400 group-hover:text-pink-300 transition-colors"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                        ></path>
                    </svg>
                    <span
                        class="font-medium group-hover:text-white transition-colors"
                        >Rekomendasi Produk</span
                    >
                </Link>
            </nav>

            <!-- User Profile & Logout -->
            <div
                class="p-6 border-t border-white/10 bg-gradient-to-r from-slate-800 to-slate-900"
            >
                <div class="flex items-center space-x-3 mb-4">
                    <div
                        class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center"
                    >
                        <svg
                            class="w-5 h-5 text-white"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                            ></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-white font-medium">Administrator</p>
                        <p class="text-gray-300 text-sm">admin@example.com</p>
                    </div>
                </div>
                <form method="POST" @submit.prevent="logout">
                    <button
                        type="submit"
                        class="w-full py-3 px-4 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white rounded-xl font-medium transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center space-x-2"
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
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                            ></path>
                        </svg>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col min-h-screen">
            <!-- Top Header -->
            <header
                class="bg-white/80 backdrop-blur-sm border-b border-gray-200/50 p-6 shadow-sm"
            >
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="hidden md:block">
                            <h2 class="text-2xl font-bold text-gray-900">
                                {{ getPageTitle() }}
                            </h2>
                            <p class="text-gray-600 text-sm">
                                {{ getPageDescription() }}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <!-- Notification Bell -->
                        <button
                            class="relative p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-xl transition-all duration-200"
                        >
                            <svg
                                class="w-6 h-6"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                                ></path>
                            </svg>
                            <span
                                class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"
                            ></span>
                        </button>

                        <!-- Current Time -->
                        <div class="hidden sm:block text-right">
                            <p class="text-sm text-gray-600">
                                {{ currentTime }}
                            </p>
                            <p class="text-xs text-gray-500">
                                {{ currentDate }}
                            </p>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content Area -->
            <div
                class="flex-1 p-6 md:p-8 bg-gradient-to-br from-gray-50/50 to-white/50 overflow-y-auto"
            >
                <div class="max-w-7xl mx-auto">
                    <slot />
                </div>
            </div>
        </main>
    </div>
</template>

<script setup>
import { Link, router, usePage } from "@inertiajs/vue3";
import { ref, onMounted, computed } from "vue";

const sidebarOpen = ref(false);
const currentTime = ref("");
const currentDate = ref("");

const page = usePage();

const toggleSidebar = () => {
    sidebarOpen.value = !sidebarOpen.value;
};

const logout = () => {
    router.post("/logout");
};

const isActive = (route) => {
    return page.url === route || page.url.startsWith(route + "/");
};

const getPageTitle = () => {
    const url = page.url;
    if (url.includes("/admin/dashboard")) return "Dashboard";
    if (url.includes("/admin/products")) return "Manajemen Produk";
    if (url.includes("/admin/history")) return "History Pembayaran";
    if (url.includes("/admin/rekomendasi")) return "Rekomendasi Produk";
    return "Admin Panel";
};

const getPageDescription = () => {
    const url = page.url;
    if (url.includes("/admin/dashboard"))
        return "Ringkasan dan statistik sistem";
    if (url.includes("/admin/products")) return "Kelola produk dan inventori";
    if (url.includes("/admin/history"))
        return "Riwayat transaksi dan pembayaran";
    if (url.includes("/admin/rekomendasi")) return "Sistem rekomendasi produk";
    return "Sistem manajemen administrasi";
};

const updateTime = () => {
    const now = new Date();
    currentTime.value = now.toLocaleTimeString("id-ID", {
        hour: "2-digit",
        minute: "2-digit",
        second: "2-digit",
    });
    currentDate.value = now.toLocaleDateString("id-ID", {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric",
    });
};

onMounted(() => {
    updateTime();
    setInterval(updateTime, 1000);
});
</script>
