<template>
    <DefaultLayout>
        <section
            class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#2f1e1e] to-[#1a1a1a] text-white px-4 py-20"
        >
            <div
                class="w-full max-w-md bg-white/5 backdrop-blur-xl p-10 rounded-3xl shadow-2xl border border-white/10"
                data-aos="zoom-in"
            >
                <!-- Header -->
                <div class="text-center mb-8">
                    <h1
                        class="text-4xl font-bold text-[var(--color-gold)] drop-shadow"
                    >
                        Daftar Akun
                    </h1>
                    <p class="text-sm text-gray-300 mt-2">
                        Bergabung dengan Coflah sekarang.
                    </p>
                </div>

                <!-- Form Registrasi -->
                <form @submit.prevent="submit">
                    <!-- Email -->
                    <div class="mb-4">
                        <label class="block text-sm mb-1">Email</label>
                        <input
                            v-model="form.email"
                            type="email"
                            class="w-full px-4 py-3 rounded-xl bg-white/10 text-white placeholder-gray-400 border border-white/10 focus:outline-none focus:ring-2 focus:ring-[var(--color-gold)]"
                            placeholder="you@example.com"
                        />
                        <p
                            v-if="form.errors.email"
                            class="text-sm text-red-400 mt-1"
                        >
                            {{ form.errors.email }}
                        </p>
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label class="block text-sm mb-1">Kata Sandi</label>
                        <input
                            v-model="form.password"
                            type="password"
                            class="w-full px-4 py-3 rounded-xl bg-white/10 text-white placeholder-gray-400 border border-white/10 focus:outline-none focus:ring-2 focus:ring-[var(--color-gold)]"
                            placeholder="********"
                        />
                        <p
                            v-if="form.errors.password"
                            class="text-sm text-red-400 mt-1"
                        >
                            {{ form.errors.password }}
                        </p>
                    </div>

                    <!-- Konfirmasi Password -->
                    <div class="mb-6">
                        <label class="block text-sm mb-1"
                            >Ulangi Kata Sandi</label
                        >
                        <input
                            v-model="form.password_confirmation"
                            type="password"
                            class="w-full px-4 py-3 rounded-xl bg-white/10 text-white placeholder-gray-400 border border-white/10 focus:outline-none focus:ring-2 focus:ring-[var(--color-gold)]"
                            placeholder="********"
                        />
                    </div>

                    <!-- Tombol Daftar -->
                    <button
                        type="submit"
                        class="w-full py-3 rounded-full bg-[var(--color-gold)] hover:bg-yellow-500 text-[var(--color-coffee)] font-semibold shadow-lg transition-all duration-300"
                        :disabled="form.processing"
                    >
                        Daftar Sekarang
                    </button>
                </form>

                <!-- Divider -->
                <div class="relative text-center my-6">
                    <hr class="border-white/10" />
                    <span
                        class="absolute top-[-13px] left-1/2 transform -translate-x-1/2 bg-[rgba(20,20,20,0.7)] px-3 text-xs text-gray-400"
                    >
                        atau
                    </span>
                </div>

                <!-- Tombol Registrasi Google -->
                <div>
                    <a
                        href="/auth/google/redirect"
                        class="flex items-center justify-center gap-3 bg-white text-black py-3 w-full rounded-full shadow-md hover:bg-gray-200 transition"
                    >
                        <img
                            src="https://www.svgrepo.com/show/475656/google-color.svg"
                            alt="Google"
                            class="h-5 w-5"
                        />
                        <span class="font-medium">Daftar dengan Google</span>
                    </a>
                </div>

                <!-- Sudah punya akun -->
                <div class="text-center mt-6 text-sm text-gray-400">
                    Sudah punya akun?
                    <a
                        href="/login"
                        class="text-[var(--color-gold)] hover:underline font-medium"
                    >
                        Masuk
                    </a>
                </div>
            </div>
        </section>
    </DefaultLayout>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";

const form = useForm({
    email: "",
    password: "",
    password_confirmation: "",
});
const submit = () => form.post("/register");
</script>
