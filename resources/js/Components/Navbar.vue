<template>
    <nav class="fixed bottom-4 left-0 w-full flex justify-center z-50">
        <div
            class="flex justify-center gap-10 bg-[#fdfcfb]/80 backdrop-blur-md text-slate-800 py-3 px-8 rounded-full shadow-2xl border border-slate-200 transition-all duration-300"
        >
            <Link
                href="/"
                :class="navClass('/')"
                class="group flex flex-col items-center text-xs transition"
            >
                <Home class="w-6 h-6 transition-transform duration-300" />
            </Link>

            <Link
                href="/about"
                :class="navClass('/about')"
                class="group flex flex-col items-center text-xs transition"
            >
                <User class="w-6 h-6 transition-transform duration-300" />
            </Link>

            <Link
                href="/contact"
                :class="navClass('/contact')"
                class="group flex flex-col items-center text-xs transition"
            >
                <Mail class="w-6 h-6 transition-transform duration-300" />
            </Link>

            <Link
                href="/login"
                :class="navClass('/login')"
                class="group flex flex-col items-center text-xs transition"
            >
                <LogIn class="w-6 h-6 transition-transform duration-300" />
            </Link>
        </div>
    </nav>
</template>

<script setup>
import { Home, User, Mail, LogIn } from "lucide-vue-next";
import { Link, usePage } from "@inertiajs/vue3";

const page = usePage();

const navClass = (path) => {
    return page.url === path
        ? "text-blue-600 scale-110"
        : "hover:text-blue-600 group-hover:scale-125";
};
</script>
