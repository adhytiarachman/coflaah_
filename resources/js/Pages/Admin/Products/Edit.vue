<template>
    <AdminLayout>
        <div class="min-h-screen bg-gray-50 py-6 px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <!-- Header -->
                <div
                    class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6"
                >
                    <div class="px-6 py-4 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h1 class="text-2xl font-bold text-gray-900">
                                Edit Produk
                            </h1>
                            <button
                                @click="$inertia.visit('/admin/products')"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500"
                            >
                                ← Kembali
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <div
                    class="bg-white rounded-lg shadow-sm border border-gray-200"
                >
                    <form
                        @submit.prevent="submit"
                        enctype="multipart/form-data"
                        class="p-6"
                    >
                        <div class="space-y-6">
                            <!-- Nama Produk -->
                            <div>
                                <label
                                    for="name"
                                    class="block text-sm font-semibold text-gray-900 mb-2"
                                >
                                    Nama Produk
                                    <span class="text-red-500">*</span>
                                </label>
                                <input
                                    id="name"
                                    v-model="form.name"
                                    type="text"
                                    required
                                    class="block w-full px-4 py-3 text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200 sm:text-sm"
                                    placeholder="Masukkan nama produk"
                                />
                                <p
                                    v-if="form.errors.name"
                                    class="mt-2 text-sm text-red-600"
                                >
                                    {{ form.errors.name }}
                                </p>
                            </div>

                            <!-- Deskripsi -->
                            <div>
                                <label
                                    for="description"
                                    class="block text-sm font-semibold text-gray-900 mb-2"
                                >
                                    Deskripsi
                                </label>
                                <textarea
                                    id="description"
                                    v-model="form.description"
                                    rows="4"
                                    class="block w-full px-4 py-3 text-gray-900 border border-gray-300 rounded-lg bg-white resize-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200 sm:text-sm"
                                    placeholder="Masukkan deskripsi produk"
                                ></textarea>
                                <p
                                    v-if="form.errors.description"
                                    class="mt-2 text-sm text-red-600"
                                >
                                    {{ form.errors.description }}
                                </p>
                            </div>

                            <!-- Harga & Kategori -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label
                                        for="price"
                                        class="block text-sm font-semibold text-gray-900 mb-2"
                                    >
                                        Harga (Rp)
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
                                        >
                                            <span class="text-gray-500 text-sm"
                                                >Rp</span
                                            >
                                        </div>
                                        <input
                                            id="price"
                                            v-model="form.price"
                                            type="number"
                                            min="0"
                                            step="100"
                                            required
                                            class="block w-full pl-12 pr-4 py-3 text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200 sm:text-sm"
                                            placeholder="0"
                                        />
                                    </div>
                                    <p
                                        v-if="form.errors.price"
                                        class="mt-2 text-sm text-red-600"
                                    >
                                        {{ form.errors.price }}
                                    </p>
                                </div>

                                <div>
                                    <label
                                        for="category"
                                        class="block text-sm font-semibold text-gray-900 mb-2"
                                    >
                                        Kategori
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <select
                                        id="category"
                                        v-model="form.category"
                                        required
                                        class="block w-full px-4 py-3 text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200 sm:text-sm"
                                    >
                                        <option disabled value="">
                                            -- Pilih Kategori --
                                        </option>
                                        <option value="Arabika">Arabika</option>
                                        <option value="Robusta">Robusta</option>
                                        <option value="Latte">Latte</option>
                                        <option value="Americano">
                                            Americano
                                        </option>
                                        <option value="Espresso">
                                            Espresso
                                        </option>
                                        <option value="Cappuccino">
                                            Cappuccino
                                        </option>
                                        <option value="Non Coffee">
                                            Non Coffee
                                        </option>
                                    </select>
                                    <p
                                        v-if="form.errors.category"
                                        class="mt-2 text-sm text-red-600"
                                    >
                                        {{ form.errors.category }}
                                    </p>
                                </div>
                            </div>

                            <!-- Stok -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label
                                        for="stock"
                                        class="block text-sm font-semibold text-gray-900 mb-2"
                                    >
                                        Stok <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        id="stock"
                                        v-model="form.stock"
                                        type="number"
                                        min="0"
                                        required
                                        class="block w-full px-4 py-3 text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-colors duration-200 sm:text-sm"
                                        placeholder="0"
                                    />
                                    <p
                                        v-if="form.errors.stock"
                                        class="mt-2 text-sm text-red-600"
                                    >
                                        {{ form.errors.stock }}
                                    </p>
                                </div>
                                <div></div>
                            </div>

                            <!-- Upload Gambar -->
                            <div>
                                <label
                                    for="image"
                                    class="block text-sm font-semibold text-gray-900 mb-2"
                                >
                                    Gambar Produk
                                </label>
                                <div class="space-y-4">
                                    <!-- File Input -->
                                    <div
                                        class="flex items-center justify-center w-full"
                                    >
                                        <label
                                            for="image"
                                            class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 hover:border-gray-400 transition-colors duration-200"
                                        >
                                            <div
                                                class="flex flex-col items-center justify-center pt-5 pb-6"
                                            >
                                                <svg
                                                    class="w-8 h-8 mb-2 text-gray-500"
                                                    aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 20 16"
                                                >
                                                    <path
                                                        stroke="currentColor"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"
                                                    />
                                                </svg>
                                                <p
                                                    class="mb-1 text-sm text-gray-500"
                                                >
                                                    <span class="font-semibold"
                                                        >Klik untuk upload</span
                                                    >
                                                    atau drag & drop
                                                </p>
                                                <p
                                                    class="text-xs text-gray-500"
                                                >
                                                    PNG, JPG atau JPEG (MAX.
                                                    2MB)
                                                </p>
                                            </div>
                                            <input
                                                id="image"
                                                @change="handleImage"
                                                type="file"
                                                accept="image/*"
                                                class="hidden"
                                            />
                                        </label>
                                    </div>

                                    <!-- Preview Gambar -->
                                    <div
                                        v-if="previewUrl || product.image_url"
                                        class="flex justify-center"
                                    >
                                        <div class="relative inline-block">
                                            <img
                                                :src="
                                                    previewUrl ||
                                                    product.image_url
                                                "
                                                :alt="
                                                    previewUrl
                                                        ? 'Preview'
                                                        : 'Produk'
                                                "
                                                class="w-48 h-48 object-cover rounded-lg border-2 border-gray-200 shadow-sm"
                                            />
                                            <div
                                                v-if="previewUrl"
                                                class="absolute top-2 right-2"
                                            >
                                                <button
                                                    @click="removeImage"
                                                    type="button"
                                                    class="inline-flex items-center justify-center w-6 h-6 text-white bg-red-500 rounded-full hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                                >
                                                    <svg
                                                        class="w-3 h-3"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        viewBox="0 0 24 24"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M6 18L18 6M6 6l12 12"
                                                        ></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <p
                                        v-if="form.errors.image"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.image }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div
                            class="flex flex-col sm:flex-row gap-4 justify-end mt-8 pt-6 border-t border-gray-200"
                        >
                            <button
                                type="button"
                                @click="$inertia.visit('/admin/products')"
                                class="w-full sm:w-auto px-6 py-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200"
                            >
                                Batal
                            </button>
                            <button
                                type="submit"
                                :disabled="form.processing"
                                class="w-full sm:w-auto px-6 py-3 text-sm font-medium text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 disabled:opacity-50 disabled:cursor-not-allowed transition-colors duration-200"
                            >
                                <span
                                    v-if="form.processing"
                                    class="flex items-center justify-center"
                                >
                                    <svg
                                        class="animate-spin -ml-1 mr-2 h-4 w-4 text-white"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                    >
                                        <circle
                                            class="opacity-25"
                                            cx="12"
                                            cy="12"
                                            r="10"
                                            stroke="currentColor"
                                            stroke-width="4"
                                        ></circle>
                                        <path
                                            class="opacity-75"
                                            fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                                        ></path>
                                    </svg>
                                    Menyimpan...
                                </span>
                                <span v-else>Simpan Perubahan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { router } from "@inertiajs/vue3";

const props = defineProps({
    product: Object,
});

const previewUrl = ref(null);

const form = useForm({
    name: props.product.name || "",
    description: props.product.description || "",
    price: props.product.price || 0,
    category: props.product.category || "",
    stock: props.product.stock || 0,
    image: null,
});

const handleImage = (e) => {
    const file = e.target.files[0];

    if (file) {
        // Validasi ukuran file (max 2MB)
        if (file.size > 2 * 1024 * 1024) {
            alert("Ukuran file terlalu besar. Maksimal 2MB.");
            e.target.value = "";
            return;
        }

        // Validasi tipe file
        if (!file.type.startsWith("image/")) {
            alert("File harus berupa gambar.");
            e.target.value = "";
            return;
        }

        form.image = file;
        previewUrl.value = URL.createObjectURL(file);
    } else {
        form.image = null;
        previewUrl.value = null;
    }
};

const removeImage = () => {
    form.image = null;
    previewUrl.value = null;
    // Reset file input
    const fileInput = document.getElementById("image");
    if (fileInput) {
        fileInput.value = "";
    }
};

const submit = () => {
    console.log("⚠️ FUNCTION SUBMIT DIPANGGIL");
    console.log("🔍 Product ID:", props.product.id);
    console.log("📝 Form Data:", {
        name: form.name,
        description: form.description,
        price: form.price,
        category: form.category,
        stock: form.stock,
        hasImage: !!form.image,
    });

    // SOLUSI PALING SEDERHANA: gunakan form.post dengan _method
    form.transform((data) => ({
        ...data,
        _method: "PUT",
    })).post(`/admin/products/${props.product.id}`, {
        forceFormData: true,
        preserveScroll: true,
        onSuccess: () => {
            console.log("✅ Produk berhasil diperbarui");
            previewUrl.value = null;
            router.visit("/admin/products");
        },
        onError: (errors) => {
            console.error("❌ Error saat update:", errors);
        },
        onFinish: () => {
            console.log("🏁 Request selesai");
        },
    });
};
</script>
