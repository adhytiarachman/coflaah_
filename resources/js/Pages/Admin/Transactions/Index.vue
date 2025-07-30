<template>
    <AdminLayout>
        <div class="min-h-screen bg-gray-50 p-4 md:p-6">
            <div class="max-w-7xl mx-auto">
                <!-- Header -->
                <div class="text-center mb-8">
                    <div
                        class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4"
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
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900">
                        Riwayat Pembayaran
                    </h1>
                    <p class="text-gray-600 mt-2">
                        Kelola dan pantau semua transaksi pelanggan
                    </p>
                </div>

                <!-- Flash Messages -->
                <div
                    v-if="$page.props.flash.success"
                    class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6"
                >
                    <div class="flex items-center">
                        <svg
                            class="w-5 h-5 text-green-600 mr-3"
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
                        <span class="text-green-800">{{
                            $page.props.flash.success
                        }}</span>
                    </div>
                </div>

                <div
                    v-if="$page.props.flash.error"
                    class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6"
                >
                    <div class="flex items-center">
                        <svg
                            class="w-5 h-5 text-red-600 mr-3"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"
                            />
                        </svg>
                        <span class="text-red-800">{{
                            $page.props.flash.error
                        }}</span>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                    <div class="bg-white rounded-lg p-4 shadow-sm border">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600">Total</p>
                                <p class="text-xl font-bold text-gray-900">
                                    {{ transactions.length }}
                                </p>
                            </div>
                            <div
                                class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center"
                            >
                                <svg
                                    class="w-5 h-5 text-blue-600"
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

                    <div class="bg-white rounded-lg p-4 shadow-sm border">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600">Berhasil</p>
                                <p class="text-xl font-bold text-green-600">
                                    {{ successCount }}
                                </p>
                            </div>
                            <div
                                class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center"
                            >
                                <svg
                                    class="w-5 h-5 text-green-600"
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

                    <div class="bg-white rounded-lg p-4 shadow-sm border">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600">Pending</p>
                                <p class="text-xl font-bold text-yellow-600">
                                    {{ pendingCount }}
                                </p>
                            </div>
                            <div
                                class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center"
                            >
                                <svg
                                    class="w-5 h-5 text-yellow-600"
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

                    <div class="bg-white rounded-lg p-4 shadow-sm border">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-600">Gagal</p>
                                <p class="text-xl font-bold text-red-600">
                                    {{ failedCount }}
                                </p>
                            </div>
                            <div
                                class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center"
                            >
                                <svg
                                    class="w-5 h-5 text-red-600"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobile Card View -->
                <div class="block lg:hidden">
                    <div class="space-y-4">
                        <div
                            v-for="trx in paginatedTransactions"
                            :key="trx.id"
                            class="bg-white rounded-lg p-4 shadow-sm border"
                        >
                            <div class="flex items-start justify-between mb-3">
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center mr-3"
                                    >
                                        <span
                                            class="text-white font-bold text-sm"
                                            >{{
                                                trx.user?.name?.charAt(0) || "U"
                                            }}</span
                                        >
                                    </div>
                                    <div>
                                        <div class="font-medium text-gray-900">
                                            {{
                                                trx.user?.name ||
                                                "User tidak ditemukan"
                                            }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ trx.user?.email || "-" }}
                                        </div>
                                    </div>
                                </div>
                                <span :class="getStatusClass(trx.status)">{{
                                    trx.status.toUpperCase()
                                }}</span>
                            </div>

                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <span class="text-sm text-gray-600"
                                        >Order ID:</span
                                    >
                                    <span class="text-sm font-mono">{{
                                        trx.order_id
                                    }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm text-gray-600"
                                        >Total:</span
                                    >
                                    <span class="font-bold">{{
                                        formatCurrency(trx.total_price)
                                    }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm text-gray-600"
                                        >Waktu:</span
                                    >
                                    <span class="text-sm">{{
                                        formatDate(trx.created_at)
                                    }}</span>
                                </div>
                            </div>

                            <div class="mt-4 flex justify-end">
                                <button
                                    @click="deleteTransaction(trx.id)"
                                    :disabled="deletingId === trx.id"
                                    class="px-3 py-1 bg-red-500 text-white text-sm rounded-md hover:bg-red-600 disabled:opacity-50"
                                >
                                    {{
                                        deletingId === trx.id
                                            ? "Menghapus..."
                                            : "Hapus"
                                    }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Desktop Table View -->
                <div
                    class="hidden lg:block bg-white rounded-lg shadow-sm border overflow-hidden"
                >
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase"
                                    >
                                        User
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase"
                                    >
                                        Order ID
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase"
                                    >
                                        Total
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase"
                                    >
                                        Status
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase"
                                    >
                                        Waktu
                                    </th>
                                    <th
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase"
                                    >
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr
                                    v-for="trx in paginatedTransactions"
                                    :key="trx.id"
                                    class="hover:bg-gray-50"
                                >
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center mr-3"
                                            >
                                                <span
                                                    class="text-white font-bold text-sm"
                                                    >{{
                                                        trx.user?.name?.charAt(
                                                            0
                                                        ) || "U"
                                                    }}</span
                                                >
                                            </div>
                                            <div>
                                                <div
                                                    class="text-sm font-medium text-gray-900"
                                                >
                                                    {{
                                                        trx.user?.name ||
                                                        "User tidak ditemukan"
                                                    }}
                                                </div>
                                                <div
                                                    class="text-sm text-gray-500"
                                                >
                                                    {{ trx.user?.email || "-" }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div
                                            class="text-sm font-medium text-gray-900 font-mono"
                                        >
                                            {{ trx.order_id }}
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            ID: {{ trx.id }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div
                                            class="text-lg font-bold text-gray-900"
                                        >
                                            {{
                                                formatCurrency(trx.total_price)
                                            }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            :class="getStatusClass(trx.status)"
                                            >{{
                                                trx.status.toUpperCase()
                                            }}</span
                                        >
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-600"
                                    >
                                        {{ formatDate(trx.created_at) }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-center"
                                    >
                                        <button
                                            @click="deleteTransaction(trx.id)"
                                            :disabled="deletingId === trx.id"
                                            class="px-3 py-1 bg-red-500 text-white text-sm rounded-md hover:bg-red-600 disabled:opacity-50"
                                        >
                                            {{
                                                deletingId === trx.id
                                                    ? "Menghapus..."
                                                    : "Hapus"
                                            }}
                                        </button>
                                    </td>
                                </tr>

                                <!-- Empty State -->
                                <tr v-if="transactions.length === 0">
                                    <td
                                        colspan="6"
                                        class="px-6 py-12 text-center"
                                    >
                                        <div class="text-gray-500">
                                            <p class="text-lg font-medium">
                                                Belum ada transaksi
                                            </p>
                                            <p class="text-sm">
                                                Transaksi pelanggan akan muncul
                                                di sini
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination -->
                <div
                    v-if="totalPages > 1"
                    class="bg-white px-4 py-3 mt-4 border rounded-lg shadow-sm"
                >
                    <!-- Mobile Pagination -->
                    <div class="flex items-center justify-between sm:hidden">
                        <button
                            @click="prevPage"
                            :disabled="currentPage === 1"
                            class="flex items-center px-3 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed"
                        >
                            <svg
                                class="w-4 h-4 mr-2"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 19l-7-7 7-7"
                                />
                            </svg>
                            Previous
                        </button>
                        <div class="text-sm text-gray-700">
                            {{ currentPage }} / {{ totalPages }}
                        </div>
                        <button
                            @click="nextPage"
                            :disabled="currentPage === totalPages"
                            class="flex items-center px-3 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed"
                        >
                            Next
                            <svg
                                class="w-4 h-4 ml-2"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5l7 7-7 7"
                                />
                            </svg>
                        </button>
                    </div>

                    <!-- Desktop Pagination -->
                    <div class="hidden sm:flex items-center justify-between">
                        <div class="text-sm text-gray-700">
                            Menampilkan
                            <span class="font-medium">{{
                                (currentPage - 1) * itemsPerPage + 1
                            }}</span>
                            -
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
                        </div>
                        <div class="flex items-center space-x-2">
                            <button
                                @click="prevPage"
                                :disabled="currentPage === 1"
                                class="flex items-center px-3 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors"
                            >
                                <svg
                                    class="w-4 h-4 mr-2"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 19l-7-7 7-7"
                                    />
                                </svg>
                                Previous
                            </button>

                            <!-- Page Numbers -->
                            <div class="flex space-x-1">
                                <button
                                    v-for="page in visiblePages"
                                    :key="page"
                                    @click="goToPage(page)"
                                    :class="[
                                        'px-3 py-2 rounded-md text-sm font-medium transition-colors',
                                        currentPage === page
                                            ? 'bg-blue-600 text-white'
                                            : 'bg-white text-gray-700 border border-gray-300 hover:bg-gray-50',
                                    ]"
                                    :disabled="page === '...'"
                                >
                                    {{ page }}
                                </button>
                            </div>

                            <button
                                @click="nextPage"
                                :disabled="currentPage === totalPages"
                                class="flex items-center px-3 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors"
                            >
                                Next
                                <svg
                                    class="w-4 h-4 ml-2"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5l7 7-7 7"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import { ref, computed } from "vue";
import { useForm } from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";

const props = defineProps({
    transactions: {
        type: Array,
        default: () => [],
    },
});

const form = useForm({});
const deletingId = ref(null);
const currentPage = ref(1);
const itemsPerPage = 10;

// Computed properties
const totalPages = computed(() =>
    Math.ceil(props.transactions.length / itemsPerPage)
);
const paginatedTransactions = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    return props.transactions.slice(start, end);
});

const successCount = computed(
    () =>
        props.transactions.filter((t) =>
            ["settlement", "paid"].includes(t.status)
        ).length
);

const pendingCount = computed(
    () => props.transactions.filter((t) => t.status === "pending").length
);

const failedCount = computed(
    () =>
        props.transactions.filter((t) =>
            ["failure", "cancel", "expire"].includes(t.status)
        ).length
);

// Visible pages for pagination
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

// Methods
const goToPage = (page) => (currentPage.value = page);
const nextPage = () =>
    currentPage.value < totalPages.value && currentPage.value++;
const prevPage = () => currentPage.value > 1 && currentPage.value--;

const getStatusClass = (status) => {
    const classes = {
        pending:
            "px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full",
        settlement:
            "px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full",
        paid: "px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full",
        failure:
            "px-2 py-1 text-xs font-medium bg-red-100 text-red-800 rounded-full",
        cancel: "px-2 py-1 text-xs font-medium bg-red-100 text-red-800 rounded-full",
        expire: "px-2 py-1 text-xs font-medium bg-red-100 text-red-800 rounded-full",
    };
    return (
        classes[status] ||
        "px-2 py-1 text-xs font-medium bg-gray-100 text-gray-800 rounded-full"
    );
};

const formatCurrency = (amount) => {
    return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
        minimumFractionDigits: 0,
    }).format(amount);
};

const formatDate = (date) => {
    return new Date(date).toLocaleString("id-ID", {
        dateStyle: "medium",
        timeStyle: "short",
    });
};

const deleteTransaction = (id) => {
    if (!window.Swal) {
        if (confirm("Yakin ingin menghapus transaksi ini?")) {
            performDelete(id);
        }
        return;
    }

    window.Swal.fire({
        title: "Yakin ingin menghapus?",
        text: "Data transaksi akan dihapus permanen!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#6b7280",
        confirmButtonText: "Ya, Hapus",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            performDelete(id);
        }
    });
};

const performDelete = (id) => {
    deletingId.value = id;
    form.transform(() => ({ _method: "DELETE" })).post(
        route("admin.transactions.destroy", id),
        {
            preserveScroll: true,
            onSuccess: () => {
                window.Swal?.fire(
                    "Berhasil!",
                    "Transaksi berhasil dihapus.",
                    "success"
                );
            },
            onError: () => {
                window.Swal?.fire(
                    "Gagal!",
                    "Terjadi kesalahan saat menghapus.",
                    "error"
                );
            },
            onFinish: () => {
                deletingId.value = null;
            },
        }
    );
};
</script>
