<template>
    <AdminLayout>
        <div
            class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 p-6"
        >
            <!-- Header Section -->
            <div class="header-container mb-8">
                <div
                    class="flex justify-between items-center bg-white rounded-2xl shadow-lg p-6 border border-slate-200/50 backdrop-blur-sm"
                >
                    <div class="title-section">
                        <h1
                            class="text-3xl font-bold bg-gradient-to-r from-slate-800 to-blue-600 bg-clip-text text-transparent"
                        >
                            Kelola Produk
                        </h1>
                        <p class="text-slate-600 mt-1">
                            Kelola semua produk dengan mudah
                        </p>
                    </div>
                    <Link
                        :href="route('admin.products.create')"
                        class="add-button group relative overflow-hidden bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold px-6 py-3 rounded-xl shadow-lg transition-all duration-300 transform hover:scale-105 hover:shadow-xl"
                    >
                        <span class="relative z-10 flex items-center gap-2">
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
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                                ></path>
                            </svg>
                            Tambah Produk
                        </span>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                        ></div>
                    </Link>
                </div>
            </div>

            <!-- Flash Messages -->
            <div class="flash-messages mb-6 space-y-4">
                <div v-if="$page.props.flash.success" class="alert-success">
                    <div class="flex items-center gap-3">
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
                        <span>{{ $page.props.flash.success }}</span>
                    </div>
                </div>
                <div v-if="$page.props.flash.error" class="alert-error">
                    <div class="flex items-center gap-3">
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
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                            ></path>
                        </svg>
                        <span>{{ $page.props.flash.error }}</span>
                    </div>
                </div>
            </div>

            <!-- Products Table -->
            <div class="table-container">
                <div
                    class="bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-200/50 backdrop-blur-sm"
                >
                    <!-- Table Header -->
                    <div
                        class="table-header bg-gradient-to-r from-slate-800 to-blue-900 p-6"
                    >
                        <h2
                            class="text-xl font-semibold text-white flex items-center gap-2"
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
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                                ></path>
                            </svg>
                            Daftar Produk
                        </h2>
                    </div>

                    <!-- Table Content -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead
                                class="bg-gradient-to-r from-slate-100 to-blue-50 border-b border-slate-200"
                            >
                                <tr class="table-head-row">
                                    <th
                                        class="px-6 py-4 text-left text-sm font-semibold text-slate-700 uppercase tracking-wider"
                                    >
                                        <div class="flex items-center gap-2">
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
                                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"
                                                ></path>
                                            </svg>
                                            Nama Produk
                                        </div>
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-sm font-semibold text-slate-700 uppercase tracking-wider"
                                    >
                                        <div class="flex items-center gap-2">
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
                                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                                                ></path>
                                            </svg>
                                            Kategori
                                        </div>
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-sm font-semibold text-slate-700 uppercase tracking-wider"
                                    >
                                        <div class="flex items-center gap-2">
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
                                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"
                                                ></path>
                                            </svg>
                                            Harga
                                        </div>
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-sm font-semibold text-slate-700 uppercase tracking-wider"
                                    >
                                        <div class="flex items-center gap-2">
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
                                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"
                                                ></path>
                                            </svg>
                                            Stok
                                        </div>
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-sm font-semibold text-slate-700 uppercase tracking-wider"
                                    >
                                        <div class="flex items-center gap-2">
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
                                                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"
                                                ></path>
                                            </svg>
                                            Aksi
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-slate-100">
                                <tr
                                    v-for="(product, index) in products"
                                    :key="product.id"
                                    :class="[
                                        'product-row transition-all duration-300 hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 hover:shadow-md',
                                        deletingId === product.id
                                            ? 'opacity-50 pointer-events-none'
                                            : '',
                                    ]"
                                    :style="{ '--index': index }"
                                >
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center text-white font-semibold text-sm"
                                            >
                                                {{
                                                    product.name
                                                        .charAt(0)
                                                        .toUpperCase()
                                                }}
                                            </div>
                                            <div class="ml-4">
                                                <div
                                                    class="text-sm font-medium text-slate-900"
                                                >
                                                    {{ product.name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gradient-to-r from-blue-100 to-purple-100 text-blue-800 border border-blue-200"
                                        >
                                            {{ product.category }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div
                                            class="text-sm font-semibold text-slate-900"
                                        >
                                            Rp
                                            {{ product.price.toLocaleString() }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            :class="[
                                                'inline-flex items-center px-3 py-1 rounded-full text-xs font-medium',
                                                product.stock > 10
                                                    ? 'bg-green-100 text-green-800 border border-green-200'
                                                    : product.stock > 5
                                                    ? 'bg-yellow-100 text-yellow-800 border border-yellow-200'
                                                    : 'bg-red-100 text-red-800 border border-red-200',
                                            ]"
                                        >
                                            {{ product.stock }}
                                        </span>
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium"
                                    >
                                        <div class="flex items-center gap-3">
                                            <Link
                                                :href="
                                                    route(
                                                        'admin.products.edit',
                                                        product.id
                                                    )
                                                "
                                                class="edit-button group relative inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-4 py-2 rounded-lg transition-all duration-300 transform hover:scale-105 hover:shadow-lg"
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
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                                                    ></path>
                                                </svg>
                                                Edit
                                            </Link>
                                            <button
                                                @click="destroy(product.id)"
                                                :disabled="
                                                    deletingId === product.id
                                                "
                                                class="delete-button group relative inline-flex items-center gap-2 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-4 py-2 rounded-lg transition-all duration-300 transform hover:scale-105 hover:shadow-lg disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none"
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
                                                    ></path>
                                                </svg>
                                                {{
                                                    deletingId === product.id
                                                        ? "Menghapus..."
                                                        : "Hapus"
                                                }}
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Empty State -->
                                <tr
                                    v-if="products.length === 0"
                                    class="empty-state"
                                >
                                    <td
                                        colspan="5"
                                        class="px-6 py-12 text-center"
                                    >
                                        <div
                                            class="flex flex-col items-center justify-center space-y-4"
                                        >
                                            <div
                                                class="w-16 h-16 bg-gradient-to-br from-slate-200 to-blue-200 rounded-full flex items-center justify-center"
                                            >
                                                <svg
                                                    class="w-8 h-8 text-slate-400"
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
                                            <div class="text-slate-500">
                                                <p class="text-lg font-medium">
                                                    Belum ada produk
                                                </p>
                                                <p class="text-sm">
                                                    Mulai dengan menambahkan
                                                    produk pertama Anda
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import { ref, onMounted, nextTick } from "vue";
import { Link, useForm } from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { route } from "ziggy-js";

defineProps({ products: Array });

const deletingId = ref(null);
const form = useForm({});

// GSAP animations
onMounted(() => {
    nextTick(() => {
        // Load GSAP
        const script = document.createElement("script");
        script.src =
            "https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js";
        script.onload = () => {
            // Helper function to check if element exists
            const animateIfExists = (selector, fromProps, toProps) => {
                const elements = document.querySelectorAll(selector);
                if (elements.length > 0) {
                    gsap.fromTo(elements, fromProps, toProps);
                }
            };

            // Header animation
            animateIfExists(
                ".header-container",
                { opacity: 0, y: -30 },
                { opacity: 1, y: 0, duration: 0.8, ease: "power2.out" }
            );

            // Flash messages animation (only if they exist)
            const flashMessages = document.querySelectorAll(
                ".flash-messages > div"
            );
            if (flashMessages.length > 0) {
                gsap.fromTo(
                    flashMessages,
                    { opacity: 0, x: -50 },
                    {
                        opacity: 1,
                        x: 0,
                        duration: 0.6,
                        ease: "power2.out",
                        delay: 0.2,
                    }
                );
            }

            // Table container animation
            animateIfExists(
                ".table-container",
                { opacity: 0, y: 30 },
                {
                    opacity: 1,
                    y: 0,
                    duration: 0.8,
                    ease: "power2.out",
                    delay: 0.4,
                }
            );

            // Table header animation
            animateIfExists(
                ".table-header",
                { opacity: 0, scaleY: 0 },
                {
                    opacity: 1,
                    scaleY: 1,
                    duration: 0.6,
                    ease: "power2.out",
                    delay: 0.6,
                }
            );

            // Product rows staggered animation
            const productRows = document.querySelectorAll(".product-row");
            if (productRows.length > 0) {
                gsap.fromTo(
                    productRows,
                    { opacity: 0, y: 20 },
                    {
                        opacity: 1,
                        y: 0,
                        duration: 0.5,
                        ease: "power2.out",
                        delay: 0.8,
                        stagger: 0.1,
                    }
                );
            }

            // Empty state animation (only if it exists)
            const emptyState = document.querySelector(".empty-state");
            if (emptyState) {
                gsap.fromTo(
                    emptyState,
                    { opacity: 0, scale: 0.8 },
                    {
                        opacity: 1,
                        scale: 1,
                        duration: 0.8,
                        ease: "back.out(1.7)",
                        delay: 0.8,
                    }
                );
            }

            // Button hover animations
            const buttons = document.querySelectorAll(
                ".add-button, .edit-button, .delete-button"
            );
            buttons.forEach((button) => {
                button.addEventListener("mouseenter", () => {
                    gsap.to(button, {
                        scale: 1.05,
                        duration: 0.2,
                        ease: "power2.out",
                    });
                });
                button.addEventListener("mouseleave", () => {
                    gsap.to(button, {
                        scale: 1,
                        duration: 0.2,
                        ease: "power2.out",
                    });
                });
            });
        };
        document.head.appendChild(script);
    });
});

function destroy(id) {
    if (confirm("Yakin ingin menghapus produk ini?")) {
        deletingId.value = id;

        // Animate the row being deleted (with safety check)
        const row = document.querySelector(`tr[data-id="${id}"]`);
        if (row && window.gsap) {
            window.gsap.to(row, {
                opacity: 0.5,
                scale: 0.95,
                duration: 0.3,
                ease: "power2.out",
            });
        }

        form.transform(() => ({
            _method: "DELETE",
        })).post(route("admin.products.destroy", { product: id }), {
            preserveScroll: true,
            onSuccess: () => {
                console.log("✅ Produk berhasil dihapus");
                // Animate success (with safety check)
                if (row && window.gsap) {
                    window.gsap.to(row, {
                        opacity: 0,
                        x: -50,
                        duration: 0.4,
                        ease: "power2.in",
                    });
                }
            },
            onError: (err) => {
                console.error("❌ Gagal menghapus produk:", err);
                alert("Gagal menghapus produk.");
                // Reset animation on error (with safety check)
                if (row && window.gsap) {
                    window.gsap.to(row, {
                        opacity: 1,
                        scale: 1,
                        duration: 0.3,
                        ease: "power2.out",
                    });
                }
            },
            onFinish: () => {
                deletingId.value = null;
            },
        });
    }
}
</script>

<style scoped>
.alert-success {
    background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%);
    color: #047857;
    border: 1px solid #a7f3d0;
    padding: 1rem 1.5rem;
    border-radius: 1rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(10px);
}

.alert-error {
    background: linear-gradient(135deg, #fef2f2 0%, #fecaca 100%);
    color: #b91c1c;
    border: 1px solid #fecaca;
    padding: 1rem 1.5rem;
    border-radius: 1rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(10px);
}

.product-row:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
}

.table-head-row th {
    position: relative;
    overflow: hidden;
}

.table-head-row th::before {
    content: "";
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(
        90deg,
        transparent,
        rgba(255, 255, 255, 0.2),
        transparent
    );
    transition: left 0.5s;
}

.table-head-row:hover th::before {
    left: 100%;
}

/* Custom scrollbar */
.overflow-x-auto::-webkit-scrollbar {
    height: 8px;
}

.overflow-x-auto::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 4px;
}

.overflow-x-auto::-webkit-scrollbar-thumb {
    background: linear-gradient(90deg, #3b82f6, #8b5cf6);
    border-radius: 4px;
}

.overflow-x-auto::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(90deg, #2563eb, #7c3aed);
}

/* Floating animation for empty state */
@keyframes float {
    0%,
    100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-10px);
    }
}

.empty-state svg {
    animation: float 3s ease-in-out infinite;
}

/* Gradient text animation */
@keyframes gradient {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}

.title-section h1 {
    background-size: 200% 200%;
    animation: gradient 3s ease infinite;
}
</style>
