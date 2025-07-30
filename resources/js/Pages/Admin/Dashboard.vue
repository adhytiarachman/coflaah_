<template>
    <AdminLayout>
        <main class="min-h-screen bg-gray-50/50 p-6">
            <!-- Header Section -->
            <div class="mb-8">
                <div
                    class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 relative overflow-hidden"
                >
                    <!-- Background Pattern -->
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-slate-50 to-blue-50/30"
                    ></div>
                    <div
                        class="absolute -top-4 -right-4 w-32 h-32 bg-blue-500/5 rounded-full blur-3xl"
                    ></div>
                    <div
                        class="absolute -bottom-4 -left-4 w-24 h-24 bg-purple-500/5 rounded-full blur-2xl"
                    ></div>

                    <div class="relative z-10">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">
                            Dashboard Admin
                        </h1>
                        <p class="text-gray-600 text-lg">
                            Selamat datang di panel administrasi
                        </p>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Total Users Card -->
                <div
                    class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-all duration-300"
                >
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-4">
                                <div
                                    class="w-10 h-10 bg-blue-500/10 rounded-xl flex items-center justify-center"
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
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                                        ></path>
                                    </svg>
                                </div>
                                <h3 class="text-sm font-medium text-gray-600">
                                    Total Pengguna
                                </h3>
                            </div>
                            <p class="text-2xl font-bold text-gray-900 mb-2">
                                {{ totalUsers.toLocaleString("id-ID") }}
                            </p>
                            <div class="flex items-center gap-1">
                                <div
                                    class="w-2 h-2 bg-emerald-500 rounded-full"
                                ></div>
                                <span class="text-sm text-gray-600">
                                    <span class="font-semibold text-emerald-600"
                                        >+{{
                                            monthlyUsers.toLocaleString("id-ID")
                                        }}</span
                                    >
                                    bulan ini
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Transactions Card -->
                <div
                    class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-all duration-300"
                >
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-4">
                                <div
                                    class="w-10 h-10 bg-emerald-500/10 rounded-xl flex items-center justify-center"
                                >
                                    <svg
                                        class="w-5 h-5 text-emerald-600"
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
                                <h3 class="text-sm font-medium text-gray-600">
                                    Total Transaksi
                                </h3>
                            </div>
                            <p class="text-2xl font-bold text-gray-900 mb-2">
                                {{ totalTransactions.toLocaleString("id-ID") }}
                            </p>
                            <div class="flex items-center gap-1">
                                <div
                                    class="w-2 h-2 bg-emerald-500 rounded-full"
                                ></div>
                                <span class="text-sm text-gray-600">
                                    <span class="font-semibold text-emerald-600"
                                        >{{ successRate }}%</span
                                    >
                                    berhasil
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Sales Card -->
                <div
                    class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-all duration-300"
                >
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-4">
                                <div
                                    class="w-10 h-10 bg-purple-500/10 rounded-xl flex items-center justify-center"
                                >
                                    <svg
                                        class="w-5 h-5 text-purple-600"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"
                                        ></path>
                                    </svg>
                                </div>
                                <h3 class="text-sm font-medium text-gray-600">
                                    Total Penjualan
                                </h3>
                            </div>
                            <p class="text-2xl font-bold text-gray-900 mb-2">
                                {{ formatCurrency(totalSales) }}
                            </p>
                            <div class="flex items-center gap-1">
                                <div
                                    class="w-2 h-2 bg-emerald-500 rounded-full"
                                ></div>
                                <span class="text-sm text-gray-600">
                                    <span
                                        class="font-semibold text-emerald-600"
                                        >{{
                                            formatCurrency(monthlySales)
                                        }}</span
                                    >
                                    bulan ini
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 xl:grid-cols-5 gap-6">
                <!-- Sales Chart -->
                <div class="xl:col-span-3">
                    <div
                        class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6"
                    >
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <h2
                                    class="text-xl font-semibold text-gray-900 mb-1"
                                >
                                    Trafik Penjualan
                                </h2>
                                <p class="text-sm text-gray-600">
                                    Penjualan per bulan dalam tahun ini
                                </p>
                            </div>
                            <div
                                class="flex items-center gap-2 px-3 py-1.5 bg-blue-50 rounded-lg"
                            >
                                <div
                                    class="w-2 h-2 bg-blue-500 rounded-full"
                                ></div>
                                <span class="text-sm font-medium text-blue-700"
                                    >2024</span
                                >
                            </div>
                        </div>
                        <div class="h-80">
                            <Line
                                :data="salesChartData"
                                :options="lineChartOptions"
                                :key="'sales-chart'"
                            />
                        </div>
                    </div>
                </div>

                <!-- Status Chart -->
                <div class="xl:col-span-2">
                    <div
                        class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6"
                    >
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <h2
                                    class="text-xl font-semibold text-gray-900 mb-1"
                                >
                                    Status Transaksi
                                </h2>
                                <p class="text-sm text-gray-600">
                                    Distribusi status transaksi
                                </p>
                            </div>
                        </div>
                        <div class="h-80">
                            <Doughnut
                                v-if="statusChartData.labels.length > 0"
                                :data="statusChartData"
                                :options="doughnutChartOptions"
                                :key="'status-chart'"
                            />
                            <div
                                v-else
                                class="flex items-center justify-center h-full"
                            >
                                <div class="text-center">
                                    <div
                                        class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4"
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
                                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"
                                            ></path>
                                        </svg>
                                    </div>
                                    <p
                                        class="text-lg font-medium text-gray-900 mb-1"
                                    >
                                        Belum ada data
                                    </p>
                                    <p class="text-sm text-gray-500">
                                        Data akan muncul setelah ada transaksi
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { ref, computed, onMounted } from "vue";
import { usePage } from "@inertiajs/vue3";
import { Line, Doughnut } from "vue-chartjs";
import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    LineElement,
    ArcElement,
    CategoryScale,
    LinearScale,
    PointElement,
    Filler,
} from "chart.js";

// Register Chart.js components
ChartJS.register(
    Title,
    Tooltip,
    Legend,
    LineElement,
    ArcElement,
    CategoryScale,
    LinearScale,
    PointElement,
    Filler
);

// Get page props
const page = usePage();

// Raw data from props
const transactionStatus = computed(() => page.props.transactionStatus || {});
const salesPerMonth = computed(() => page.props.salesPerMonth || {});
const userPerMonth = computed(() => page.props.userPerMonth || {});

// Helper function to format currency
const formatCurrency = (amount) => {
    return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
        minimumFractionDigits: 0,
        maximumFractionDigits: 0,
    }).format(amount || 0);
};

// Computed stats
const totalUsers = computed(() => {
    const users = userPerMonth.value;
    return Object.values(users).reduce(
        (total, count) => total + (Number(count) || 0),
        0
    );
});

const monthlyUsers = computed(() => {
    const users = userPerMonth.value;
    const currentMonth = new Date().toISOString().slice(0, 7);
    return Number(users[currentMonth]) || 0;
});

const totalTransactions = computed(() => {
    const status = transactionStatus.value;
    return Object.values(status).reduce(
        (total, count) => total + (Number(count) || 0),
        0
    );
});

const successRate = computed(() => {
    const status = transactionStatus.value;
    const total = totalTransactions.value;
    if (total === 0) return 0;

    const successful =
        (Number(status.paid) || 0) +
        (Number(status.success) || 0) +
        (Number(status.completed) || 0);
    return Math.round((successful / total) * 100);
});

const totalSales = computed(() => {
    const sales = salesPerMonth.value;
    return Object.values(sales).reduce(
        (total, amount) => total + (Number(amount) || 0),
        0
    );
});

const monthlySales = computed(() => {
    const sales = salesPerMonth.value;
    const currentMonth = new Date().toISOString().slice(0, 7);
    return Number(sales[currentMonth]) || 0;
});

// Generate sales chart data
const salesChartData = computed(() => {
    const currentDate = new Date();
    const currentYear = currentDate.getFullYear();

    const months = [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "Mei",
        "Jun",
        "Jul",
        "Agu",
        "Sep",
        "Okt",
        "Nov",
        "Des",
    ];

    const actualSales = salesPerMonth.value;
    const data = [];

    for (let i = 0; i < 12; i++) {
        const monthKey = `${currentYear}-${String(i + 1).padStart(2, "0")}`;
        const monthSales = Number(actualSales[monthKey]) || 0;
        data.push(monthSales);
    }

    return {
        labels: months,
        datasets: [
            {
                label: "Penjualan",
                data,
                borderColor: "#3b82f6",
                backgroundColor: "rgba(59, 130, 246, 0.05)",
                tension: 0.4,
                fill: true,
                pointBackgroundColor: "#3b82f6",
                pointBorderColor: "#ffffff",
                pointBorderWidth: 3,
                pointRadius: 0,
                pointHoverRadius: 8,
                pointHoverBackgroundColor: "#3b82f6",
                pointHoverBorderColor: "#ffffff",
                pointHoverBorderWidth: 3,
                borderWidth: 3,
            },
        ],
    };
});

// Status Chart Data
const statusChartData = computed(() => {
    const data = transactionStatus.value;

    if (!data || Object.keys(data).length === 0) {
        return { labels: [], datasets: [] };
    }

    const statusMap = {
        paid: "Berhasil",
        success: "Berhasil",
        completed: "Selesai",
        pending: "Menunggu",
        failed: "Gagal",
        cancelled: "Dibatalkan",
    };

    const labels = Object.keys(data).map((key) => statusMap[key] || key);
    const values = Object.values(data).map((val) => Number(val) || 0);

    // Modern color palette
    const colors = [
        "#10b981", // emerald-500
        "#3b82f6", // blue-500
        "#f59e0b", // amber-500
        "#ef4444", // red-500
        "#8b5cf6", // purple-500
        "#06b6d4", // cyan-500
    ];

    return {
        labels,
        datasets: [
            {
                data: values,
                backgroundColor: colors.slice(0, values.length),
                borderWidth: 0,
                hoverOffset: 8,
            },
        ],
    };
});

// Enhanced Chart Options
const lineChartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    interaction: {
        intersect: false,
        mode: "index",
    },
    plugins: {
        legend: {
            display: false,
        },
        tooltip: {
            backgroundColor: "rgba(17, 24, 39, 0.95)",
            titleColor: "#f9fafb",
            bodyColor: "#f9fafb",
            borderColor: "#374151",
            borderWidth: 1,
            cornerRadius: 12,
            padding: 12,
            titleFont: {
                size: 14,
                weight: "600",
            },
            bodyFont: {
                size: 13,
            },
            callbacks: {
                label: function (context) {
                    return "Penjualan: " + formatCurrency(context.parsed.y);
                },
            },
        },
    },
    scales: {
        x: {
            grid: {
                display: false,
            },
            border: {
                display: false,
            },
            ticks: {
                color: "#6b7280",
                font: {
                    size: 13,
                    weight: "500",
                },
                padding: 8,
            },
        },
        y: {
            beginAtZero: true,
            grid: {
                color: "#f3f4f6",
                drawBorder: false,
            },
            border: {
                display: false,
            },
            ticks: {
                color: "#6b7280",
                font: {
                    size: 12,
                },
                padding: 8,
                callback: function (value) {
                    return formatCurrency(value);
                },
            },
        },
    },
    elements: {
        point: {
            hoverRadius: 8,
        },
    },
};

const doughnutChartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    cutout: "65%",
    plugins: {
        legend: {
            position: "bottom",
            labels: {
                padding: 20,
                usePointStyle: true,
                pointStyle: "circle",
                font: {
                    size: 13,
                    weight: "500",
                },
                color: "#374151",
                boxWidth: 8,
                boxHeight: 8,
            },
        },
        tooltip: {
            backgroundColor: "rgba(17, 24, 39, 0.95)",
            titleColor: "#f9fafb",
            bodyColor: "#f9fafb",
            borderColor: "#374151",
            borderWidth: 1,
            cornerRadius: 12,
            padding: 12,
            titleFont: {
                size: 14,
                weight: "600",
            },
            bodyFont: {
                size: 13,
            },
            callbacks: {
                label: function (context) {
                    const total = context.dataset.data.reduce(
                        (a, b) => a + b,
                        0
                    );
                    const percentage = ((context.parsed / total) * 100).toFixed(
                        1
                    );
                    return `${context.label}: ${context.parsed} (${percentage}%)`;
                },
            },
        },
    },
    elements: {
        arc: {
            borderWidth: 0,
        },
    },
};

// Lifecycle
onMounted(() => {
    console.log("🚀 Modern Dashboard 2025 loaded");
});
</script>
