<template>
    <DefaultLayout>
        <!-- Notifikasi Berhasil -->
        <Transition
            enter-active-class="transition-all duration-500 ease-out"
            enter-from-class="opacity-0 translate-y-[-20px] scale-95"
            enter-to-class="opacity-100 translate-y-0 scale-100"
            leave-active-class="transition-all duration-300 ease-in"
            leave-from-class="opacity-100 translate-y-0 scale-100"
            leave-to-class="opacity-0 translate-y-[-20px] scale-95"
        >
            <div
                v-if="showSuccess"
                class="fixed top-6 right-6 bg-gradient-to-r from-emerald-500 to-teal-600 text-white px-6 py-4 rounded-2xl shadow-2xl z-50 backdrop-blur-sm border border-emerald-300/20 flex items-center gap-3"
            >
                <svg
                    class="w-5 h-5 animate-bounce"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                >
                    <path
                        fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"
                    />
                </svg>
                <span class="font-medium">{{ flash.success }}</span>
            </div>
        </Transition>

        <!-- Notifikasi Gagal Login -->
        <Transition
            enter-active-class="transition-all duration-500 ease-out"
            enter-from-class="opacity-0 translate-y-[-20px] scale-95"
            enter-to-class="opacity-100 translate-y-0 scale-100"
            leave-active-class="transition-all duration-300 ease-in"
            leave-from-class="opacity-100 translate-y-0 scale-100"
            leave-to-class="opacity-0 translate-y-[-20px] scale-95"
        >
            <div
                v-if="showError"
                class="fixed top-6 right-6 bg-gradient-to-r from-red-500 to-rose-600 text-white px-6 py-4 rounded-2xl shadow-2xl z-50 backdrop-blur-sm border border-red-300/20 flex items-center gap-3"
            >
                <svg
                    class="w-5 h-5 animate-pulse"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                >
                    <path
                        fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                        clip-rule="evenodd"
                    />
                </svg>
                <span class="font-medium">{{ loginError }}</span>
            </div>
        </Transition>

        <section
            class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#2f1e1e] via-[#1a1a1a] to-[#0d0d0d] text-white px-4 py-20 relative overflow-hidden"
        >
            <!-- Background Decorations -->
            <div class="absolute inset-0 opacity-5">
                <div
                    class="absolute top-1/4 left-1/4 w-96 h-96 bg-gradient-to-r from-amber-400 to-yellow-600 rounded-full blur-3xl animate-pulse"
                ></div>
                <div
                    class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-gradient-to-r from-amber-500 to-orange-600 rounded-full blur-3xl animate-pulse delay-1000"
                ></div>
            </div>

            <!-- Main Container -->
            <div
                class="w-full max-w-md bg-white/5 backdrop-blur-2xl p-10 rounded-3xl shadow-2xl border border-white/10 relative z-10"
                data-aos="zoom-in"
                data-aos-duration="800"
            >
                <!-- Decorative Elements -->
                <div
                    class="absolute -top-4 -left-4 w-8 h-8 bg-gradient-to-br from-amber-400 to-yellow-500 rounded-full blur-sm opacity-60"
                ></div>
                <div
                    class="absolute -bottom-4 -right-4 w-6 h-6 bg-gradient-to-br from-amber-500 to-orange-500 rounded-full blur-sm opacity-60"
                ></div>

                <!-- Header -->
                <div class="text-center mb-10">
                    <h1
                        class="text-4xl font-bold bg-gradient-to-r from-amber-300 via-yellow-400 to-amber-500 bg-clip-text text-transparent drop-shadow-lg mb-3"
                        data-aos="fade-up"
                        data-aos-delay="200"
                    >
                        Selamat Datang
                    </h1>
                    <p
                        class="text-sm text-gray-300 leading-relaxed"
                        data-aos="fade-up"
                        data-aos-delay="400"
                    >
                        Masuk ke akun Coflah kamu untuk melanjutkan perjalanan
                        istimewa.
                    </p>
                </div>

                <!-- Login Form -->
                <form @submit.prevent="submit" class="space-y-6">
                    <!-- Email -->
                    <div class="group" data-aos="fade-up" data-aos-delay="600">
                        <label
                            class="block mb-2 text-sm font-medium text-gray-300 transition-colors group-focus-within:text-amber-400"
                        >
                            Email
                        </label>
                        <div class="relative">
                            <input
                                v-model="form.email"
                                type="email"
                                placeholder="you@example.com"
                                class="w-full px-4 py-4 rounded-xl bg-white/10 text-white placeholder-gray-400 border border-white/10 focus:outline-none focus:ring-2 focus:ring-amber-400/50 focus:border-amber-400/50 transition-all duration-300 hover:bg-white/15"
                                :class="{
                                    'border-red-400 focus:ring-red-400/50':
                                        form.errors.email,
                                }"
                            />
                            <div
                                class="absolute inset-y-0 right-0 flex items-center pr-3"
                            >
                                <svg
                                    class="w-5 h-5 text-gray-400"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
                                    />
                                </svg>
                            </div>
                        </div>
                        <Transition
                            enter-active-class="transition-all duration-300 ease-out"
                            enter-from-class="opacity-0 translate-y-[-10px]"
                            enter-to-class="opacity-100 translate-y-0"
                            leave-active-class="transition-all duration-200 ease-in"
                            leave-from-class="opacity-100 translate-y-0"
                            leave-to-class="opacity-0 translate-y-[-10px]"
                        >
                            <p
                                v-if="form.errors.email"
                                class="text-sm text-red-400 mt-2 flex items-center gap-1"
                            >
                                <svg
                                    class="w-4 h-4"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                                {{ form.errors.email }}
                            </p>
                        </Transition>
                    </div>

                    <!-- Password -->
                    <div class="group" data-aos="fade-up" data-aos-delay="700">
                        <label
                            class="block mb-2 text-sm font-medium text-gray-300 transition-colors group-focus-within:text-amber-400"
                        >
                            Kata Sandi
                        </label>
                        <div class="relative">
                            <input
                                v-model="form.password"
                                :type="showPassword ? 'text' : 'password'"
                                placeholder="********"
                                class="w-full px-4 py-4 rounded-xl bg-white/10 text-white placeholder-gray-400 border border-white/10 focus:outline-none focus:ring-2 focus:ring-amber-400/50 focus:border-amber-400/50 transition-all duration-300 hover:bg-white/15"
                                :class="{
                                    'border-red-400 focus:ring-red-400/50':
                                        form.errors.password,
                                }"
                            />
                            <button
                                type="button"
                                @click="showPassword = !showPassword"
                                class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-amber-400 transition-colors"
                            >
                                <svg
                                    v-if="!showPassword"
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                    />
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                    />
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
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"
                                    />
                                </svg>
                            </button>
                        </div>
                        <Transition
                            enter-active-class="transition-all duration-300 ease-out"
                            enter-from-class="opacity-0 translate-y-[-10px]"
                            enter-to-class="opacity-100 translate-y-0"
                            leave-active-class="transition-all duration-200 ease-in"
                            leave-from-class="opacity-100 translate-y-0"
                            leave-to-class="opacity-0 translate-y-[-10px]"
                        >
                            <p
                                v-if="form.errors.password"
                                class="text-sm text-red-400 mt-2 flex items-center gap-1"
                            >
                                <svg
                                    class="w-4 h-4"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                                {{ form.errors.password }}
                            </p>
                        </Transition>
                    </div>

                    <!-- Remember Me -->
                    <div
                        class="flex items-center justify-between text-sm"
                        data-aos="fade-up"
                        data-aos-delay="800"
                    >
                        <label
                            class="flex items-center gap-2 cursor-pointer group"
                        >
                            <input
                                v-model="form.remember"
                                type="checkbox"
                                class="w-4 h-4 text-amber-400 border-gray-300 rounded focus:ring-amber-400 focus:ring-2 bg-white/10 border-white/20"
                            />
                            <span
                                class="text-gray-300 group-hover:text-amber-400 transition-colors"
                                >Ingat saya</span
                            >
                        </label>
                        <a
                            href="#"
                            class="text-amber-400 hover:text-amber-300 transition-colors hover:underline"
                        >
                            Lupa kata sandi?
                        </a>
                    </div>

                    <!-- Tombol Login -->
                    <div data-aos="fade-up" data-aos-delay="900">
                        <button
                            type="submit"
                            class="w-full py-4 rounded-xl bg-gradient-to-r from-amber-400 to-yellow-500 hover:from-amber-500 hover:to-yellow-600 text-gray-900 font-semibold shadow-lg transition-all duration-300 transform hover:scale-105 hover:shadow-xl disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none relative overflow-hidden group"
                            :disabled="form.processing"
                        >
                            <span
                                class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/20 to-white/0 translate-x-[-200%] group-hover:translate-x-[200%] transition-transform duration-1000"
                            ></span>

                            <div
                                v-if="form.processing"
                                class="flex items-center justify-center gap-2"
                            >
                                <svg
                                    class="animate-spin h-5 w-5"
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
                                <span>Memproses...</span>
                            </div>
                            <span v-else>Masuk</span>
                        </button>
                    </div>
                </form>

                <!-- Divider -->
                <div
                    class="relative text-center my-8"
                    data-aos="fade-up"
                    data-aos-delay="1000"
                >
                    <hr class="border-white/10" />
                    <span
                        class="absolute top-[-13px] left-1/2 transform -translate-x-1/2 bg-[rgba(20,20,20,0.8)] px-4 text-xs text-gray-400 backdrop-blur-sm rounded-full"
                    >
                        atau masuk dengan
                    </span>
                </div>

                <!-- Google Button -->
                <div class="mb-6" data-aos="fade-up" data-aos-delay="1100">
                    <a
                        href="/auth/google/redirect"
                        class="flex items-center justify-center gap-3 bg-white hover:bg-gray-100 text-gray-900 py-4 w-full rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 group relative overflow-hidden"
                    >
                        <span
                            class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent translate-x-[-200%] group-hover:translate-x-[200%] transition-transform duration-1000"
                        ></span>
                        <img
                            src="https://www.svgrepo.com/show/475656/google-color.svg"
                            alt="Google"
                            class="h-5 w-5 transition-transform group-hover:scale-110"
                        />
                        <span class="font-medium">Masuk dengan Google</span>
                    </a>
                </div>

                <!-- Link Register -->
                <div
                    class="text-center text-sm text-gray-400"
                    data-aos="fade-up"
                    data-aos-delay="1200"
                >
                    Belum punya akun?
                    <a
                        href="/register"
                        class="text-amber-400 hover:text-amber-300 font-medium transition-colors hover:underline ml-1"
                    >
                        Daftar Sekarang
                    </a>
                </div>
            </div>
        </section>
    </DefaultLayout>
</template>

<script setup>
import { useForm, usePage } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";

// Form Login
const form = useForm({
    email: "",
    password: "",
    remember: false,
});

// State untuk show/hide password
const showPassword = ref(false);

// Flash + Error
const page = usePage();
const flash = page.props.flash || {};
const loginError = ref(null);
const showError = ref(false);
const showSuccess = ref(false);

// Flash success logout
onMounted(() => {
    if (flash.success) {
        showSuccess.value = true;
        setTimeout(() => {
            showSuccess.value = false;
        }, 4000);
    }

    // Cek error login dari backend (global)
    const err = page.props.errors?.email;
    if (err) {
        loginError.value = err;
        showError.value = true;
        setTimeout(() => {
            showError.value = false;
        }, 4000);
    }
});

// Submit login
const submit = () => {
    form.post("/login", {
        onSuccess: () => {
            form.reset("password");
        },
    });
};
</script>

<style scoped>
/* Custom CSS untuk animasi tambahan */
@keyframes shimmer {
    0% {
        transform: translateX(-100%);
    }
    100% {
        transform: translateX(100%);
    }
}

.group:hover .shimmer {
    animation: shimmer 0.8s ease-in-out;
}

/* Smooth transitions untuk semua elemen */
* {
    transition: all 0.3s ease;
}

/* Custom scrollbar jika diperlukan */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
}

::-webkit-scrollbar-thumb {
    background: rgba(251, 191, 36, 0.5);
    border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    background: rgba(251, 191, 36, 0.7);
}
</style>
