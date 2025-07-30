<template>
    <div
        class="min-h-screen overflow-hidden bg-gradient-to-br from-[var(--color-coffee)] to-[var(--color-chocolate)] text-[var(--color-cream-light)] font-[var(--font-sans)] relative"
    >
        <!-- Slot konten -->
        <slot />
    </div>
    <!-- Navbar tetap di bawah -->
    <div class="fixed bottom-4 left-0 w-full flex justify-center z-50">
        <Navbar />
    </div>
</template>

<script setup>
import Navbar from "@/Components/Navbar.vue";
</script>

<style scoped>
@keyframes fade-in {
    from {
        opacity: 0;
        transform: translateY(10px) translateX(-50%);
    }
    to {
        opacity: 1;
        transform: translateY(0) translateX(-50%);
    }
}
.animate-fade-in {
    animation: fade-in 0.6s ease-out forwards;
}
</style>
