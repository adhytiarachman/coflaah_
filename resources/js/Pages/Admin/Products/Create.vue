<template>
    <AdminLayout>
        <div class="p-6 max-w-3xl mx-auto">
            <h1 class="text-2xl font-bold text-brown-800 mb-6">
                Tambah Produk
            </h1>

            <form @submit.prevent="submit" class="space-y-6">
                <!-- Nama -->
                <div>
                    <label class="block mb-1 font-semibold text-gray-700"
                        >Nama Produk</label
                    >
                    <input
                        v-model="form.name"
                        type="text"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                        placeholder="Contoh: Kopi Latte"
                    />
                    <div
                        v-if="form.errors.name"
                        class="text-red-600 text-sm mt-1"
                    >
                        {{ form.errors.name }}
                    </div>
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block mb-1 font-semibold text-gray-700"
                        >Deskripsi</label
                    >
                    <textarea
                        v-model="form.description"
                        rows="4"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                        placeholder="Deskripsi produk kopi..."
                    ></textarea>
                    <div
                        v-if="form.errors.description"
                        class="text-red-600 text-sm mt-1"
                    >
                        {{ form.errors.description }}
                    </div>
                </div>

                <!-- Harga & Stok -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-1 font-semibold text-gray-700"
                            >Harga</label
                        >
                        <input
                            v-model="form.price"
                            type="number"
                            class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            placeholder="Contoh: 25000"
                        />
                        <div
                            v-if="form.errors.price"
                            class="text-red-600 text-sm mt-1"
                        >
                            {{ form.errors.price }}
                        </div>
                    </div>
                    <div>
                        <label class="block mb-1 font-semibold text-gray-700"
                            >Stok</label
                        >
                        <input
                            v-model="form.stock"
                            type="number"
                            class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            placeholder="Contoh: 10"
                        />
                        <div
                            v-if="form.errors.stock"
                            class="text-red-600 text-sm mt-1"
                        >
                            {{ form.errors.stock }}
                        </div>
                    </div>
                </div>

                <!-- Kategori -->
                <div>
                    <label class="block mb-1 font-semibold text-gray-700"
                        >Kategori</label
                    >
                    <select
                        v-model="form.category"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    >
                        <option value="" disabled>Pilih Kategori</option>
                        <option value="Americano">Americano</option>
                        <option value="Latte">Latte</option>
                        <option value="Cappuccino">Cappuccino</option>
                        <option value="Non Coffee">Non Coffee</option>
                        <option value="Manual Brew">Manual Brew</option>
                    </select>
                    <div
                        v-if="form.errors.category"
                        class="text-red-600 text-sm mt-1"
                    >
                        {{ form.errors.category }}
                    </div>
                </div>

                <!-- Gambar -->
                <div>
                    <label class="block mb-1 font-semibold text-gray-700"
                        >Gambar Produk</label
                    >
                    <input
                        type="file"
                        @change="handleFileUpload"
                        accept="image/*"
                        class="block w-full"
                    />
                    <div
                        v-if="form.errors.image"
                        class="text-red-600 text-sm mt-1"
                    >
                        {{ form.errors.image }}
                    </div>

                    <!-- Preview -->
                    <div v-if="preview" class="mt-3">
                        <p class="text-gray-600 text-sm mb-1">Preview:</p>
                        <img :src="preview" class="max-h-40 rounded border" />
                    </div>
                </div>

                <!-- Tombol -->
                <div class="flex justify-end gap-4">
                    <Link
                        :href="route('admin.products.index')"
                        class="text-gray-600 hover:underline"
                        >Batal</Link
                    >
                    <button
                        type="submit"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-6 py-2 rounded shadow transition"
                        :disabled="form.processing"
                    >
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>

<script setup>
import { ref } from "vue";
import { useForm, Link } from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { route } from "ziggy-js";

const preview = ref(null);

const form = useForm({
    name: "",
    description: "",
    price: "",
    stock: "",
    category: "",
    image: null,
});

const handleFileUpload = (e) => {
    const file = e.target.files[0];
    form.image = file;

    if (file) {
        preview.value = URL.createObjectURL(file);
    }
};

const submit = () => {
    form.post(route("admin.products.store"), {
        forceFormData: true,
    });
};
</script>
