<template>
    <DefaultLayout>
        <!-- Loading Screen -->
        <div
            v-if="isLoading"
            class="fixed inset-0 bg-gradient-to-br from-[#2f1e1e] to-[#1a1a1a] flex items-center justify-center z-50"
            id="loading-screen"
        >
            <div class="loader"></div>
        </div>

        <!-- Main Content -->
        <section
            class="min-h-screen bg-gradient-to-br from-[#2f1e1e] to-[#1a1a1a] text-white py-20 px-6 relative overflow-hidden"
        >
            <!-- Background Decorations -->
            <div class="absolute inset-0 opacity-10">
                <div
                    class="floating-circle absolute top-20 left-10 w-32 h-32 bg-[var(--color-gold)] rounded-full"
                ></div>
                <div
                    class="floating-circle absolute bottom-32 right-20 w-24 h-24 bg-[var(--color-gold)] rounded-full"
                ></div>
                <div
                    class="floating-circle absolute top-1/2 left-1/4 w-16 h-16 bg-[var(--color-gold)] rounded-full"
                ></div>
            </div>

            <!-- Header Section -->
            <div
                class="max-w-6xl mx-auto text-center space-y-6 relative z-10"
                ref="headerSection"
            >
                <div class="contact-badge inline-block">
                    <span
                        class="text-sm font-semibold text-[var(--color-gold)] bg-[var(--color-gold)]/10 px-4 py-2 rounded-full border border-[var(--color-gold)]/20"
                    >
                        Mari Terhubung
                    </span>
                </div>

                <h1
                    class="text-4xl md:text-6xl font-bold text-[var(--color-gold)] drop-shadow-lg"
                    ref="mainTitle"
                >
                    Hubungi Kami
                </h1>

                <p
                    class="text-lg md:text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed"
                    ref="subtitle"
                >
                    Kami siap membantu Anda. Terhubung dengan kami melalui
                    berbagai platform di bawah ini dan temukan pengalaman
                    terbaik bersama kami.
                </p>
            </div>

            <!-- Contact Icons Section -->
            <div
                class="max-w-4xl mx-auto mt-20 relative z-10"
                ref="contactIcons"
            >
                <div
                    class="grid grid-cols-1 md:grid-cols-3 gap-8 justify-items-center"
                >
                    <!-- Email -->
                    <div class="contact-item group">
                        <a
                            href="mailto:coflah@gmail.com"
                            class="contact-link flex flex-col items-center space-y-4 p-8 rounded-2xl bg-white/5 hover:bg-white/10 transition-all duration-500 transform hover:scale-105 hover:shadow-2xl backdrop-blur-sm border border-white/10"
                            aria-label="Email"
                        >
                            <div
                                class="icon-container bg-gradient-to-br from-[var(--color-gold)] to-[var(--color-gold)]/80 p-4 rounded-full shadow-lg"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-8 w-8 text-white"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.5"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 6h14a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2z"
                                    />
                                </svg>
                            </div>
                            <div class="text-center">
                                <h3
                                    class="text-lg font-semibold text-white mb-1"
                                >
                                    Email
                                </h3>
                                <p class="text-gray-400 text-sm">
                                    coflah@gmail.com
                                </p>
                            </div>
                        </a>
                    </div>

                    <!-- Instagram -->
                    <div class="contact-item group">
                        <a
                            href="https://instagram.com/coflah.id"
                            target="_blank"
                            class="contact-link flex flex-col items-center space-y-4 p-8 rounded-2xl bg-white/5 hover:bg-white/10 transition-all duration-500 transform hover:scale-105 hover:shadow-2xl backdrop-blur-sm border border-white/10"
                            aria-label="Instagram"
                        >
                            <div
                                class="icon-container bg-gradient-to-br from-[var(--color-gold)] to-[var(--color-gold)]/80 p-4 rounded-full shadow-lg"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-8 w-8 text-white"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M7 2C4.243 2 2 4.243 2 7v10c0 2.757 2.243 5 5 5h10c2.757 0 5-2.243 5-5V7c0-2.757-2.243-5-5-5H7zm0 2h10c1.654 0 3 1.346 3 3v10c0 1.654-1.346 3-3 3H7c-1.654 0-3-1.346-3-3V7c0-1.654 1.346-3 3-3zm5 3a5 5 0 100 10 5 5 0 000-10zm0 2a3 3 0 110 6 3 3 0 010-6zm4.5-.5a1 1 0 100 2 1 1 0 000-2z"
                                    />
                                </svg>
                            </div>
                            <div class="text-center">
                                <h3
                                    class="text-lg font-semibold text-white mb-1"
                                >
                                    Instagram
                                </h3>
                                <p class="text-gray-400 text-sm">@coflah.id</p>
                            </div>
                        </a>
                    </div>

                    <!-- Lokasi -->
                    <div class="contact-item group">
                        <a
                            href="https://www.google.com/maps/place/Jl.+Ngopi+No.+42,+Bandung"
                            target="_blank"
                            class="contact-link flex flex-col items-center space-y-4 p-8 rounded-2xl bg-white/5 hover:bg-white/10 transition-all duration-500 transform hover:scale-105 hover:shadow-2xl backdrop-blur-sm border border-white/10"
                            aria-label="Lokasi"
                        >
                            <div
                                class="icon-container bg-gradient-to-br from-[var(--color-gold)] to-[var(--color-gold)]/80 p-4 rounded-full shadow-lg"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-8 w-8 text-white"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.5"
                                        d="M12 11.75A2.25 2.25 0 1012 7.25a2.25 2.25 0 000 4.5z"
                                    />
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.5"
                                        d="M19.5 11.75c0 6.937-7.5 10.5-7.5 10.5S4.5 18.687 4.5 11.75a7.5 7.5 0 1115 0z"
                                    />
                                </svg>
                            </div>
                            <div class="text-center">
                                <h3
                                    class="text-lg font-semibold text-white mb-1"
                                >
                                    Lokasi
                                </h3>
                                <p class="text-gray-400 text-sm">
                                    Jl. Ngopi No. 42, Bandung
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Google Maps Section -->
            <div class="mt-24 max-w-6xl mx-auto relative z-10" ref="mapSection">
                <div class="text-center mb-12">
                    <h2
                        class="text-3xl font-bold text-[var(--color-gold)] mb-4"
                    >
                        Temukan Kami
                    </h2>
                    <p class="text-gray-300 text-lg">
                        Kunjungi lokasi kami dan rasakan pengalaman langsung
                    </p>
                </div>

                <div
                    class="map-container rounded-3xl overflow-hidden shadow-2xl border border-white/10 bg-white/5 p-2"
                >
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63336.27558026019!2d107.56075436168143!3d-6.903271301056646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7db71b1abfb%3A0x2a39469c9f268911!2sBandung!5e0!3m2!1sen!2sid!4v1684748896769!5m2!1sen!2sid"
                        width="100%"
                        height="450"
                        style="border: 0; border-radius: 20px"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        class="transition-all duration-500 hover:scale-[1.02]"
                    ></iframe>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="text-center mt-20 relative z-10" ref="ctaSection">
                <div
                    class="inline-block bg-gradient-to-r from-[var(--color-gold)]/10 to-[var(--color-gold)]/5 rounded-2xl p-8 border border-[var(--color-gold)]/20"
                >
                    <h3
                        class="text-2xl font-bold text-[var(--color-gold)] mb-4"
                    >
                        Siap Memulai Perjalanan Bersama?
                    </h3>
                    <p class="text-gray-300 mb-6 max-w-md mx-auto">
                        Jangan ragu untuk menghubungi kami. Tim kami siap
                        membantu mewujudkan impian Anda.
                    </p>
                    <a
                        href="mailto:coflah@gmail.com"
                        class="inline-flex items-center space-x-2 bg-gradient-to-r from-[var(--color-gold)] to-[var(--color-gold)]/80 text-white px-8 py-4 rounded-full font-semibold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105"
                    >
                        <span>Hubungi Sekarang</span>
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
                                d="M17 8l4 4m0 0l-4 4m4-4H3"
                            ></path>
                        </svg>
                    </a>
                </div>
            </div>
        </section>
    </DefaultLayout>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";

// Register GSAP plugins
gsap.registerPlugin(ScrollTrigger);

// Refs
const isLoading = ref(true);
const headerSection = ref(null);
const mainTitle = ref(null);
const subtitle = ref(null);
const contactIcons = ref(null);
const mapSection = ref(null);
const ctaSection = ref(null);

// Loading animation
const handleLoading = () => {
    // Simulate loading time
    setTimeout(() => {
        // Fade out loading screen
        gsap.to("#loading-screen", {
            opacity: 0,
            duration: 0.5,
            onComplete: () => {
                isLoading.value = false;
                initAnimations();
            },
        });
    }, 1500);
};

// Initialize GSAP animations
const initAnimations = () => {
    // Set initial states
    gsap.set(
        [
            headerSection.value,
            contactIcons.value,
            mapSection.value,
            ctaSection.value,
        ],
        {
            opacity: 0,
            y: 50,
        }
    );

    // Floating background circles
    gsap.to(".floating-circle", {
        y: "random(-30, 30)",
        x: "random(-20, 20)",
        duration: "random(3, 6)",
        ease: "power1.inOut",
        repeat: -1,
        yoyo: true,
        stagger: 0.5,
    });

    // Main entrance animation
    const tl = gsap.timeline({ delay: 0.2 });

    tl.to(headerSection.value, {
        opacity: 1,
        y: 0,
        duration: 1,
        ease: "power2.out",
    }).to(
        contactIcons.value,
        {
            opacity: 1,
            y: 0,
            duration: 0.8,
            ease: "power2.out",
        },
        "-=0.5"
    );

    // Staggered contact items animation
    gsap.fromTo(
        ".contact-item",
        {
            opacity: 0,
            y: 50,
            scale: 0.8,
        },
        {
            opacity: 1,
            y: 0,
            scale: 1,
            duration: 0.6,
            ease: "back.out(1.7)",
            stagger: 0.2,
            delay: 1.2,
        }
    );

    // Scroll-triggered animations
    ScrollTrigger.create({
        trigger: mapSection.value,
        start: "top 80%",
        onEnter: () => {
            gsap.to(mapSection.value, {
                opacity: 1,
                y: 0,
                duration: 1,
                ease: "power2.out",
            });
        },
    });

    ScrollTrigger.create({
        trigger: ctaSection.value,
        start: "top 80%",
        onEnter: () => {
            gsap.to(ctaSection.value, {
                opacity: 1,
                y: 0,
                duration: 1,
                ease: "power2.out",
            });
        },
    });

    // Hover animations for contact items
    document.querySelectorAll(".contact-item").forEach((item) => {
        const iconContainer = item.querySelector(".icon-container");

        item.addEventListener("mouseenter", () => {
            gsap.to(iconContainer, {
                scale: 1.1,
                rotation: 5,
                duration: 0.3,
                ease: "power2.out",
            });
        });

        item.addEventListener("mouseleave", () => {
            gsap.to(iconContainer, {
                scale: 1,
                rotation: 0,
                duration: 0.3,
                ease: "power2.out",
            });
        });
    });
};

// Lifecycle
onMounted(() => {
    handleLoading();
});
</script>

<style scoped>
/* Loading spinner */
.loader {
    width: 50px;
    height: 50px;
    border: 4px solid rgba(255, 255, 255, 0.1);
    border-top: 4px solid var(--color-gold);
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

/* Custom scrollbar */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.1);
}

::-webkit-scrollbar-thumb {
    background: var(--color-gold);
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: var(--color-gold);
    opacity: 0.8;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .floating-circle {
        display: none;
    }
}

/* Ensure smooth transitions */
* {
    will-change: transform;
}

/* Map container hover effect */
.map-container:hover iframe {
    transform: scale(1.02);
}
</style>
