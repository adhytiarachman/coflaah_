<script setup>
import UserLayout from "@/Layouts/UserLayout.vue";
import { ref, computed } from "vue";

const props = defineProps({
    transactions: {
        type: Array,
        default: () => [],
    },
});

// Pagination state
const currentPage = ref(1);
const itemsPerPage = 10;

// Computed properties for pagination
const totalPages = computed(() =>
    Math.ceil(props.transactions.length / itemsPerPage)
);
const paginatedTransactions = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    return props.transactions.slice(start, end);
});

// Pagination methods
const goToPage = (page) => {
    currentPage.value = page;
};

const nextPage = () => {
    if (currentPage.value < totalPages.value) {
        currentPage.value++;
    }
};

const prevPage = () => {
    if (currentPage.value > 1) {
        currentPage.value--;
    }
};

// Get visible page numbers for pagination
const visiblePages = computed(() => {
    const pages = [];
    const total = totalPages.value;
    const current = currentPage.value;

    if (total <= 7) {
        for (let i = 1; i <= total; i++) {
            pages.push(i);
        }
    } else {
        if (current <= 4) {
            for (let i = 1; i <= 5; i++) {
                pages.push(i);
            }
            pages.push("...");
            pages.push(total);
        } else if (current >= total - 3) {
            pages.push(1);
            pages.push("...");
            for (let i = total - 4; i <= total; i++) {
                pages.push(i);
            }
        } else {
            pages.push(1);
            pages.push("...");
            for (let i = current - 1; i <= current + 1; i++) {
                pages.push(i);
            }
            pages.push("...");
            pages.push(total);
        }
    }

    return pages;
});

// Status color mapping
const getStatusColor = (status) => {
    const colors = {
        pending:
            "bg-gradient-to-r from-amber-100 to-yellow-100 text-amber-800 border-amber-200",
        paid: "bg-gradient-to-r from-emerald-100 to-green-100 text-emerald-800 border-emerald-200",
        settlement:
            "bg-gradient-to-r from-emerald-100 to-green-100 text-emerald-800 border-emerald-200",
        failed: "bg-gradient-to-r from-red-100 to-rose-100 text-red-800 border-red-200",
        cancel: "bg-gradient-to-r from-red-100 to-rose-100 text-red-800 border-red-200",
    };
    return colors[status] || "bg-gray-100 text-gray-800 border-gray-200";
};

// Format currency
const formatCurrency = (amount) => {
    return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
        minimumFractionDigits: 0,
    }).format(amount);
};

// Format date
const formatDate = (date) => {
    return new Date(date).toLocaleString("id-ID", {
        dateStyle: "medium",
        timeStyle: "short",
    });
};
</script>

<template>
    <UserLayout>
        <div
            class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 p-6"
        >
            <div class="max-w-7xl mx-auto space-y-8">
                <!-- Header Section -->
                <div class="text-center space-y-4">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 shadow-lg mb-4"
                    >
                        <svg
                            class="w-8 h-8 text-white"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                            />
                        </svg>
                    </div>
                    <h1
                        class="text-4xl font-bold bg-gradient-to-r from-gray-900 via-blue-900 to-purple-900 bg-clip-text text-transparent animate-pulse"
                    >
                        Riwayat Transaksi
                    </h1>
                    <p class="text-gray-600 text-lg font-medium">
                        Kelola dan pantau semua transaksi Anda dengan mudah
                    </p>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div
                        class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1"
                    >
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">
                                    Total Transaksi
                                </p>
                                <p class="text-2xl font-bold text-gray-900">
                                    {{ transactions.length }}
                                </p>
                            </div>
                            <div
                                class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center"
                            >
                                <svg
                                    class="w-6 h-6 text-blue-600"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"
                                    />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1"
                    >
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">
                                    Berhasil
                                </p>
                                <p class="text-2xl font-bold text-green-600">
                                    {{
                                        transactions.filter(
                                            (t) =>
                                                t.status === "paid" ||
                                                t.status === "settlement"
                                        ).length
                                    }}
                                </p>
                            </div>
                            <div
                                class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center"
                            >
                                <svg
                                    class="w-6 h-6 text-green-600"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 13l4 4L19 7"
                                    />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/20 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1"
                    >
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">
                                    Pending
                                </p>
                                <p class="text-2xl font-bold text-amber-600">
                                    {{
                                        transactions.filter(
                                            (t) => t.status === "pending"
                                        ).length
                                    }}
                                </p>
                            </div>
                            <div
                                class="w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center"
                            >
                                <svg
                                    class="w-6 h-6 text-amber-600"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Transactions Table -->
                <div
                    class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl border border-white/20 overflow-hidden"
                >
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead
                                class="bg-gradient-to-r from-gray-50 to-gray-100"
                            >
                                <tr>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
                                    >
                                        Order ID
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
                                    >
                                        Total
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
                                    >
                                        Status
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
                                    >
                                        Tanggal
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100">
                                <tr
                                    v-for="(tx, index) in paginatedTransactions"
                                    :key="tx.id"
                                    class="hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-all duration-300 transform hover:scale-[1.01] hover:shadow-md"
                                    :style="{
                                        animationDelay: `${index * 100}ms`,
                                    }"
                                >
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center mr-3"
                                            >
                                                <span
                                                    class="text-white font-bold text-sm"
                                                    >#</span
                                                >
                                            </div>
                                            <div>
                                                <div
                                                    class="text-sm font-medium text-gray-900 font-mono"
                                                >
                                                    {{ tx.order_id }}
                                                </div>
                                                <div
                                                    class="text-xs text-gray-500"
                                                >
                                                    ID: {{ tx.id }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div
                                            class="text-lg font-bold text-gray-900"
                                        >
                                            {{ formatCurrency(tx.total_price) }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            :class="[
                                                'inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold border transition-all duration-300 hover:scale-105',
                                                getStatusColor(tx.status),
                                            ]"
                                        >
                                            <span
                                                class="w-2 h-2 rounded-full mr-2 animate-pulse"
                                                :class="{
                                                    'bg-amber-500':
                                                        tx.status === 'pending',
                                                    'bg-green-500':
                                                        tx.status === 'paid' ||
                                                        tx.status ===
                                                            'settlement',
                                                    'bg-red-500':
                                                        tx.status ===
                                                            'failed' ||
                                                        tx.status === 'cancel',
                                                }"
                                            ></span>
                                            {{ tx.status.toUpperCase() }}
                                        </span>
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-600"
                                    >
                                        <div class="flex items-center">
                                            <svg
                                                class="w-4 h-4 mr-2 text-gray-400"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                                />
                                            </svg>
                                            {{ formatDate(tx.created_at) }}
                                        </div>
                                    </td>
                                </tr>

                                <!-- Empty State -->
                                <tr v-if="transactions.length === 0">
                                    <td
                                        colspan="4"
                                        class="px-6 py-12 text-center"
                                    >
                                        <div
                                            class="flex flex-col items-center justify-center space-y-4"
                                        >
                                            <div
                                                class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center"
                                            >
                                                <svg
                                                    class="w-8 h-8 text-gray-400"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                                                    />
                                                </svg>
                                            </div>
                                            <div class="text-center">
                                                <p
                                                    class="text-gray-500 text-lg font-medium"
                                                >
                                                    Tidak ada transaksi
                                                </p>
                                                <p
                                                    class="text-gray-400 text-sm"
                                                >
                                                    Transaksi Anda akan muncul
                                                    di sini
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div
                        v-if="totalPages > 1"
                        class="bg-white px-4 py-4 border-t border-gray-200 sm:px-6"
                    >
                        <div class="flex items-center justify-between">
                            <div class="flex-1 flex justify-between sm:hidden">
                                <button
                                    @click="prevPage"
                                    :disabled="currentPage === 1"
                                    class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed"
                                >
                                    Previous
                                </button>
                                <button
                                    @click="nextPage"
                                    :disabled="currentPage === totalPages"
                                    class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed"
                                >
                                    Next
                                </button>
                            </div>
                            <div
                                class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between"
                            >
                                <div>
                                    <p class="text-sm text-gray-700">
                                        Menampilkan
                                        <span class="font-medium">{{
                                            (currentPage - 1) * itemsPerPage + 1
                                        }}</span>
                                        sampai
                                        <span class="font-medium">{{
                                            Math.min(
                                                currentPage * itemsPerPage,
                                                transactions.length
                                            )
                                        }}</span>
                                        dari
                                        <span class="font-medium">{{
                                            transactions.length
                                        }}</span>
                                        hasil
                                    </p>
                                </div>
                                <div>
                                    <nav
                                        class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px"
                                        aria-label="Pagination"
                                    >
                                        <button
                                            @click="prevPage"
                                            :disabled="currentPage === 1"
                                            class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200"
                                        >
                                            <span class="sr-only"
                                                >Previous</span
                                            >
                                            <svg
                                                class="h-5 w-5"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                        </button>

                                        <template
                                            v-for="page in visiblePages"
                                            :key="page"
                                        >
                                            <span
                                                v-if="page === '...'"
                                                class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700"
                                            >
                                                ...
                                            </span>
                                            <button
                                                v-else
                                                @click="goToPage(page)"
                                                :class="[
                                                    'relative inline-flex items-center px-4 py-2 border text-sm font-medium transition-all duration-200 hover:scale-105',
                                                    currentPage === page
                                                        ? 'z-10 bg-gradient-to-r from-blue-500 to-purple-600 border-blue-500 text-white shadow-lg'
                                                        : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50 hover:text-gray-700',
                                                ]"
                                            >
                                                {{ page }}
                                            </button>
                                        </template>

                                        <button
                                            @click="nextPage"
                                            :disabled="
                                                currentPage === totalPages
                                            "
                                            class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200"
                                        >
                                            <span class="sr-only">Next</span>
                                            <svg
                                                class="h-5 w-5"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                        </button>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </UserLayout>
</template>

<style scoped>
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

tbody tr {
    animation: fadeInUp 0.5s ease-out forwards;
    opacity: 0;
}

.animate-pulse {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

@keyframes pulse {
    0%,
    100% {
        opacity: 1;
    }
    50% {
        opacity: 0.5;
    }
}
</style>
