<template>
    <AdminLayout>
        <div class="space-y-8">
            <!-- Page Header -->
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">
                        Rekomendasi Produk
                    </h1>
                    <p class="text-gray-600 mt-1">
                        Kelola produk rekomendasi untuk tampilan utama
                    </p>
                </div>
                <div
                    class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-4 py-2 rounded-xl shadow-lg"
                >
                    <span class="font-medium"
                        >{{ recommendations.length }} Rekomendasi</span
                    >
                </div>
            </div>

            <!-- Form Tambah Rekomendasi -->
            <div
                class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden"
            >
                <div
                    class="bg-gradient-to-r from-blue-50 to-purple-50 px-6 py-4 border-b border-gray-100"
                >
                    <h2
                        class="text-xl font-semibold text-gray-800 flex items-center"
                    >
                        <svg
                            class="w-5 h-5 mr-2 text-blue-600"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 4v16m8-8H4"
                            ></path>
                        </svg>
                        Tambah Rekomendasi Baru
                    </h2>
                </div>

                <form @submit.prevent="submitRecommendation" class="p-6">
                    <div class="space-y-6">
                        <div>
                            <label
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                Pilih Produk untuk Direkomendasi
                            </label>
                            <div class="relative">
                                <select
                                    v-model="form.product_id"
                                    class="w-full appearance-none bg-white border border-gray-300 rounded-xl px-4 py-3 pr-8 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                    :disabled="form.processing"
                                >
                                    <option disabled value="">
                                        -- Pilih Produk --
                                    </option>
                                    <option
                                        v-for="product in products"
                                        :key="product.id"
                                        :value="product.id"
                                    >
                                        {{ product.name }}
                                    </option>
                                </select>
                                <div
                                    class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none"
                                >
                                    <svg
                                        class="w-4 h-4 text-gray-400"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M19 9l-7 7-7-7"
                                        ></path>
                                    </svg>
                                </div>
                            </div>
                            <p
                                v-if="form.errors.product_id"
                                class="text-red-500 text-sm mt-2 flex items-center"
                            >
                                <svg
                                    class="w-4 h-4 mr-1"
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
                                {{ form.errors.product_id }}
                            </p>
                        </div>

                        <div class="flex justify-end">
                            <button
                                type="submit"
                                class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold px-6 py-3 rounded-xl shadow-lg transition-all duration-200 transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none flex items-center space-x-2"
                                :disabled="form.processing"
                            >
                                <svg
                                    v-if="form.processing"
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
                                    ></path>
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
                                        d="M12 4v16m8-8H4"
                                    ></path>
                                </svg>
                                <span>{{
                                    form.processing
                                        ? "Menyimpan..."
                                        : "Tambah Rekomendasi"
                                }}</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Riwayat Rekomendasi -->
            <div
                class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden"
            >
                <div
                    class="bg-gradient-to-r from-emerald-50 to-blue-50 px-6 py-4 border-b border-gray-100"
                >
                    <h2
                        class="text-xl font-semibold text-gray-800 flex items-center"
                    >
                        <svg
                            class="w-5 h-5 mr-2 text-emerald-600"
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
                        Daftar Rekomendasi Aktif
                    </h2>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200">
                                <th
                                    class="text-left py-4 px-6 text-sm font-semibold text-gray-700"
                                >
                                    #
                                </th>
                                <th
                                    class="text-left py-4 px-6 text-sm font-semibold text-gray-700"
                                >
                                    Produk
                                </th>
                                <th
                                    class="text-left py-4 px-6 text-sm font-semibold text-gray-700"
                                >
                                    Waktu Ditambahkan
                                </th>
                                <th
                                    class="text-center py-4 px-6 text-sm font-semibold text-gray-700"
                                >
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr v-if="recommendations.length === 0">
                                <td
                                    colspan="4"
                                    class="text-center py-12 text-gray-500"
                                >
                                    <svg
                                        class="w-12 h-12 mx-auto text-gray-300 mb-4"
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
                                    <p class="text-lg font-medium">
                                        Belum ada rekomendasi
                                    </p>
                                    <p class="text-sm">
                                        Tambahkan produk pertama untuk
                                        direkomendasi
                                    </p>
                                </td>
                            </tr>
                            <tr
                                v-for="(rec, index) in recommendations"
                                :key="rec.id"
                                class="hover:bg-gray-50 transition-colors duration-150"
                            >
                                <td class="py-4 px-6 text-sm text-gray-900">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-semibold text-xs"
                                    >
                                        {{ index + 1 }}
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 bg-gradient-to-r from-emerald-400 to-blue-500 rounded-lg flex items-center justify-center mr-3"
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
                                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"
                                                ></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p
                                                class="text-sm font-semibold text-gray-900"
                                            >
                                                {{ rec.product.name }}
                                            </p>
                                            <p class="text-xs text-gray-500">
                                                Produk ID: {{ rec.product.id }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-600">
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
                                                d="M8 7V3a4 4 0 118 0v4M3 7h18M5 7h14l-1 10a2 2 0 01-2 2H8a2 2 0 01-2-2L5 7z"
                                            ></path>
                                        </svg>
                                        {{
                                            new Date(
                                                rec.created_at
                                            ).toLocaleString("id-ID", {
                                                year: "numeric",
                                                month: "long",
                                                day: "numeric",
                                                hour: "2-digit",
                                                minute: "2-digit",
                                            })
                                        }}
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <button
                                        @click="deleteRecommendation(rec.id)"
                                        class="bg-gradient-to-r from-red-500 to-pink-500 hover:from-red-600 hover:to-pink-600 text-white font-medium px-4 py-2 rounded-xl shadow-lg transition-all duration-200 transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none flex items-center space-x-2 mx-auto"
                                        :disabled="formDelete.processing"
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
                                        <span>Hapus</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { useForm, router } from "@inertiajs/vue3";
import { defineProps } from "vue";

const props = defineProps({
    products: Array,
    recommendations: Array,
});

// Form untuk tambah rekomendasi
const form = useForm({
    product_id: "",
});

// Form khusus untuk delete agar tidak bentrok method
const formDelete = useForm({});

// Tambah rekomendasi
const submitRecommendation = () => {
    form.post(route("admin.rekomendasi.store"), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            form.clearErrors();
            router.reload({ only: ["recommendations"] });
        },
    });
};

// Hapus rekomendasi dengan method spoofing
const deleteRecommendation = (id) => {
    if (confirm("Yakin ingin menghapus rekomendasi ini?")) {
        formDelete
            .transform(() => ({
                _method: "DELETE",
            }))
            .post(route("admin.rekomendasi.destroy", id), {
                preserveScroll: true,
                onSuccess: () => {
                    formDelete.reset();
                    formDelete.clearErrors();
                    router.reload({ only: ["recommendations"] });
                },
            });
    }
};
</script>
