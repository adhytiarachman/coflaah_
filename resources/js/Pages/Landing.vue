<template>
    <div class="relative">
        <!-- Loading Screen -->
        <div
            v-if="isLoading"
            class="fixed inset-0 bg-gradient-to-br from-[var(--color-coffee)] to-[var(--color-chocolate)] flex flex-col items-center justify-center z-[9999]"
        >
            <div class="text-5xl mb-8 text-[var(--color-gold)] animate-pulse">
                ☕
            </div>
            <div class="w-48 h-1 bg-white/20 rounded-full overflow-hidden">
                <div
                    class="h-full bg-gradient-to-r from-[var(--color-gold)] to-[var(--color-latte)] rounded-full transition-all duration-[2000ms] ease-out"
                    :style="{ width: loadingProgress + '%' }"
                ></div>
            </div>
        </div>

        <!-- Main Section with Gradient Background -->
        <section
            class="min-h-screen py-20 overflow-hidden bg-gradient-to-br from-[#faf7f0] via-[#f5f1e8] to-[#e8e2d4]"
            ref="mainSection"
        >
            <div class="max-w-7xl mx-auto px-4">
                <!-- Two Column Layout -->
                <div
                    class="grid lg:grid-cols-2 gap-12 items-center min-h-[80vh]"
                >
                    <!-- Left Column - Welcome Text -->
                    <div class="space-y-8">
                        <div
                            ref="welcomeContent"
                            class="opacity-0 transform translate-y-8"
                        >
                            <h1
                                class="text-5xl md:text-4xl font-serif font-bold mb-8"
                                style="color: #cc7722"
                            >
                                <span
                                    ref="typewriter"
                                    class="font-serif"
                                    style="color: #cc7722"
                                    >A crafted cup for thoughtful mornings and
                                    quiet moments</span
                                >
                            </h1>

                            <div
                                class="space-y-6 text-xl leading-relaxed font-serif"
                            >
                                <p
                                    class="text-2xl font-light mb-6 font-serif"
                                    style="color: #8b5a2b"
                                >
                                    Nikmati pengalaman digital sehangat
                                    secangkir kopi terbaik kami.
                                </p>

                                <a
                                    href="#products"
                                    ref="cta"
                                    class="mt-8 inline-block px-10 py-4 bg-gradient-to-r from-[var(--color-gold)] to-[var(--color-latte)] hover:from-[var(--color-latte)] hover:to-[var(--color-gold)] text-[var(--color-coffee)] font-semibold rounded-full shadow-2xl transition-all duration-500 transform hover:scale-105 hover:-translate-y-1 opacity-0 scale-90 relative overflow-hidden group font-serif"
                                >
                                    <span class="relative z-10"
                                        >Mulai Sekarang</span
                                    >
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-700"
                                    ></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column - Products Carousel -->
                    <div class="relative">
                        <div
                            ref="productsContainer"
                            class="opacity-0 transform translate-x-8"
                        >
                            <!-- Products Header -->
                            <div class="flex justify-center mb-6">
                                <h2
                                    class="text-2xl font-bold text-[var(--color-gold)] font-serif luxury-frame"
                                >
                                    Crafted to Be Loved
                                </h2>
                            </div>

                            <!-- Products Carousel -->
                            <div class="relative">
                                <div class="overflow-hidden rounded-2xl">
                                    <div
                                        ref="productCarousel"
                                        class="flex gap-4 animate-slide-infinite"
                                        :style="{
                                            width: `${
                                                products.length * 2 * 280
                                            }px`,
                                        }"
                                    >
                                        <!-- First set of products -->
                                        <div
                                            v-for="(product, index) in [
                                                ...products,
                                                ...products,
                                            ]"
                                            :key="`${index}-${product.id}`"
                                            class="flex-none w-64 group cursor-pointer"
                                            @mouseenter="pauseAnimation"
                                            @mouseleave="resumeAnimation"
                                        >
                                            <div
                                                class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-500 hover:scale-105 hover:-translate-y-1"
                                            >
                                                <!-- Product Image -->
                                                <div
                                                    class="h-48 bg-gradient-to-br from-[var(--color-latte)] to-[var(--color-gold)] flex items-center justify-center relative overflow-hidden"
                                                >
                                                    <div
                                                        class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-700"
                                                    ></div>
                                                    <img
                                                        :src="product.image"
                                                        :alt="product.name"
                                                        class="relative z-10 w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                                        :onerror="
                                                            setDefaultImage
                                                        "
                                                    />
                                                    <!-- Fallback icon -->
                                                    <div
                                                        v-if="!product.image"
                                                        class="relative z-10 w-24 h-24 bg-white/10 rounded-xl flex items-center justify-center text-4xl text-[var(--color-coffee)] backdrop-blur-sm"
                                                    >
                                                        ☕
                                                    </div>
                                                </div>

                                                <!-- Product Info -->
                                                <div class="p-4">
                                                    <h3
                                                        class="text-lg font-bold text-[var(--color-coffee)] mb-2 group-hover:text-[var(--color-gold)] transition-colors duration-300 font-serif"
                                                    >
                                                        {{ product.name }}
                                                    </h3>
                                                    <p
                                                        class="text-sm text-[var(--color-accent)] mb-3 leading-relaxed font-serif"
                                                    >
                                                        {{
                                                            product.description
                                                        }}
                                                    </p>
                                                    <div
                                                        class="flex items-center justify-between mb-3"
                                                    >
                                                        <span
                                                            class="text-base font-semibold text-[var(--color-coffee)] font-serif"
                                                        >
                                                            {{ product.price }}
                                                        </span>
                                                        <div
                                                            class="flex items-center gap-1"
                                                        >
                                                            <span
                                                                v-for="star in 5"
                                                                :key="star"
                                                                class="text-[var(--color-gold)] text-xs"
                                                                :class="
                                                                    star <=
                                                                    product.rating
                                                                        ? 'opacity-100'
                                                                        : 'opacity-30'
                                                                "
                                                            >
                                                                ⭐
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <button
                                                        class="w-full px-4 py-2 bg-gradient-to-r from-[var(--color-gold)] to-[var(--color-latte)] hover:from-[var(--color-latte)] hover:to-[var(--color-gold)] text-[var(--color-coffee)] font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg text-sm font-serif"
                                                    >
                                                        Pesan Sekarang
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Gradient Overlays -->
                                <div
                                    class="absolute left-0 top-0 w-32 h-full z-10 pointer-events-none"
                                    style="
                                        background: linear-gradient(
                                            to right,
                                            #f5f1e8,
                                            transparent
                                        );
                                    "
                                ></div>
                                <div
                                    class="absolute right-0 top-0 w-32 h-full z-10 pointer-events-none"
                                    style="
                                        background: linear-gradient(
                                            to left,
                                            #f5f1e8,
                                            transparent
                                        );
                                    "
                                ></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer Section -->
        <footer
            class="bg-[var(--color-coffee)] py-16 px-4 text-[var(--color-cream)]"
            ref="footerSection"
        >
            <div class="max-w-4xl mx-auto text-center">
                <div
                    ref="footerContent"
                    class="opacity-0 transform translate-y-8"
                >
                    <!-- Company Info -->
                    <div class="mb-8">
                        <h3
                            class="text-3xl font-bold text-[var(--color-gold)] mb-4 font-serif"
                        >
                            Coflah
                        </h3>
                        <p
                            class="text-[var(--color-cream-light)] max-w-2xl mx-auto leading-relaxed font-serif"
                        >
                            Menghadirkan pengalaman kopi terbaik Indonesia
                            dengan teknologi modern. Nikmati kopi premium
                            pilihan langsung dari petani terbaik nusantara.
                        </p>
                    </div>

                    <!-- Copyright -->
                    <div class="border-t border-[var(--color-chocolate)] pt-6">
                        <p
                            class="text-[var(--color-cream-light)] text-sm font-serif"
                        >
                            © 2025 Coflah. Semua hak dilindungi undang-undang.
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- Navbar tetap di bawah -->
    <div class="fixed bottom-4 left-0 w-full flex justify-center z-50">
        <Navbar />
    </div>
</template>

<script setup>
import { onMounted, ref, reactive, nextTick } from "vue";
import gsap from "gsap";
import { TextPlugin } from "gsap/TextPlugin";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import Navbar from "@/Components/Navbar.vue";

// Register GSAP plugins
gsap.registerPlugin(ScrollTrigger);
gsap.registerPlugin(TextPlugin);

// Refs
const typewriter = ref(null);
const mainSection = ref(null);
const footerSection = ref(null);

// Content refs
const welcomeContent = ref(null);
const productsContainer = ref(null);
const cta = ref(null);
const productCarousel = ref(null);

// Footer refs
const footerContent = ref(null);

// Loading state
const isLoading = ref(true);
const loadingProgress = ref(0);

// Animation state
const carouselAnimation = ref(null);
const isCarouselPaused = ref(false);

// Typewriter state (removed - no longer needed)
// const typewriterTexts = [...];
// const currentTextIndex = ref(0);

// Data
const products = reactive([
    {
        id: 1,
        name: "Arabica Gayo",
        description:
            "Kopi premium dari dataran tinggi Aceh dengan aroma yang khas dan rasa yang kuat",
        price: "Rp 30.000",
        rating: 5,
        image: "/images/products/arabica-gayo.jpg",
    },
    {
        id: 2,
        name: "Robusta Lampung",
        description:
            "Kopi robusta pilihan dengan karakter bold dan caffeine tinggi untuk energi maksimal",
        price: "Rp 25.000",
        rating: 4,
        image: "/images/products/robusta-lampung.jpg",
    },
    {
        id: 3,
        name: "Luwak Original",
        description:
            "Kopi luwak asli Indonesia dengan proses fermentasi alami yang menghasilkan rasa unik",
        price: "Rp 42.000",
        rating: 5,
        image: "/images/products/luwak-original.jpg",
    },
    {
        id: 4,
        name: "Espresso Blend",
        description:
            "Campuran khusus untuk espresso dengan crema yang sempurna dan body yang seimbang",
        price: "Rp 22.000",
        rating: 4,
        image: "/images/products/espresso-blend.png",
    },
    {
        id: 5,
        name: "Cold Brew Special",
        description:
            "Racikan khusus untuk cold brew dengan ekstraksi lambat menghasilkan rasa smooth",
        price: "Rp 18.000",
        rating: 5,
        image: "/images/products/cold-brew-special.jpg",
    },
    {
        id: 6,
        name: "Decaf Premium",
        description:
            "Kopi tanpa kafein dengan proses Swiss Water, tetap mempertahankan cita rasa asli",
        price: "Rp 16.000",
        rating: 4,
        image: "/images/products/decaf-premium.jpg",
    },
]);

// Methods
const setDefaultImage = (event) => {
    event.target.style.display = "none";
};

const initLoading = () => {
    const tl = gsap.timeline();

    tl.to(loadingProgress, {
        value: 100,
        duration: 2,
        ease: "power2.out",
        onUpdate: () => {
            loadingProgress.value = Math.round(loadingProgress.value);
        },
    }).to(
        {},
        {
            duration: 0.5,
            onComplete: () => {
                isLoading.value = false;
                nextTick(() => {
                    initAnimations();
                });
            },
        }
    );
};

// Methods removed - no longer needed for typewriter
// const initTypewriter = () => { ... };

const initCarouselAnimation = () => {
    if (productCarousel.value) {
        // Create infinite sliding animation
        carouselAnimation.value = gsap.to(productCarousel.value, {
            x: `-${products.length * 280}px`,
            duration: products.length * 3,
            ease: "none",
            repeat: -1,
        });
    }
};

const pauseAnimation = () => {
    if (carouselAnimation.value && !isCarouselPaused.value) {
        carouselAnimation.value.pause();
        isCarouselPaused.value = true;
    }
};

const resumeAnimation = () => {
    if (carouselAnimation.value && isCarouselPaused.value) {
        carouselAnimation.value.resume();
        isCarouselPaused.value = false;
    }
};

const initAnimations = () => {
    // Main section animations
    const mainTl = gsap.timeline();

    mainTl
        .to(welcomeContent.value, {
            duration: 1,
            opacity: 1,
            y: 0,
            ease: "power2.out",
        })
        .to(
            productsContainer.value,
            {
                duration: 1,
                opacity: 1,
                x: 0,
                ease: "power2.out",
            },
            "-=0.5"
        )
        .to(
            cta.value,
            {
                duration: 1,
                opacity: 1,
                y: 0,
                scale: 1,
                ease: "back.out(1.7)",
            },
            "-=0.3"
        )
        .call(() => {
            initCarouselAnimation();
        });

    // Footer section animations
    ScrollTrigger.create({
        trigger: footerSection.value,
        start: "top 80%",
        onEnter: () => {
            gsap.to(footerContent.value, {
                duration: 1,
                opacity: 1,
                y: 0,
                ease: "power2.out",
            });
        },
    });
};

// Lifecycle
onMounted(() => {
    initLoading();
});
</script>

<style scoped>
/* Import Google Fonts untuk font serif yang mirip dengan gambar */
@import url("https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap");

:root {
    --color-coffee: #2b1b10;
    --color-chocolate: #3d2914;
    --color-latte: #d4b896;
    --color-cream: #f4f1eb;
    --color-cream-light: #faf8f3;
    --color-cream-warm: #f5f1e8; /* Warna background yang mirip dengan gambar */
    --color-gold: #d4af37;
    --color-accent: #8b4513;
    --color-h: #cc7722;
}

/* Luxury Frame - Gold Accent untuk H2 */
.luxury-frame {
    position: relative;
    display: inline-block;
    padding: 16px 32px;
    background: linear-gradient(
            135deg,
            rgba(255, 255, 255, 0.95),
            rgba(255, 248, 235, 0.9)
        ),
        radial-gradient(
            circle at 20% 20%,
            rgba(255, 140, 0, 0.1),
            transparent 50%
        ),
        radial-gradient(
            circle at 80% 80%,
            rgba(255, 165, 0, 0.08),
            transparent 50%
        );
    border-radius: 14px;
    box-shadow: 0 6px 20px rgba(184, 134, 11, 0.12),
        0 2px 8px rgba(184, 134, 11, 0.08),
        inset 0 1px 2px rgba(255, 255, 255, 0.95),
        inset 0 -1px 2px rgba(184, 134, 11, 0.06);
    border: 1.5px solid;
    border-image: linear-gradient(
            45deg,
            rgba(255, 215, 0, 0.3),
            rgba(255, 255, 255, 0.8),
            rgba(255, 193, 7, 0.2)
        )
        1;
    text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.8);
}

/* Font serif classes */
.font-serif {
    font-family: "Playfair Display", "Crimson Text", Georgia, "Times New Roman",
        serif;
}

/* Untuk heading yang lebih bold */
h1.font-serif,
h2.font-serif,
h3.font-serif {
    font-family: "Playfair Display", Georgia, "Times New Roman", serif;
}

/* Untuk body text yang lebih readable */
p.font-serif,
span.font-serif {
    font-family: "Crimson Text", Georgia, "Times New Roman", serif;
}

@keyframes slide-infinite {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-50%);
    }
}

.animate-slide-infinite {
    animation: slide-infinite 30s linear infinite;
}

.animate-slide-infinite:hover {
    animation-play-state: paused;
}

/* Smooth scrolling */
html {
    scroll-behavior: smooth;
}

/* Custom scrollbar */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: var(--color-cream);
}

::-webkit-scrollbar-thumb {
    background: var(--color-gold);
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: var(--color-coffee);
}

/* Button focus effects */
button:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.3);
}

/* Loading animation */
.animate-pulse {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

@keyframes pulse {
    0%,
    100% {
        opacity: 1;
    }
    50% {
        opacity: 0.5;
    }
}

/* Responsive adjustments */
@media (max-width: 1024px) {
    .grid {
        grid-template-columns: 1fr;
        gap: 2rem;
    }

    .min-h-[80vh] {
        min-height: auto;
    }

    .w-80 {
        width: 16rem;
    }

    .gap-6 {
        gap: 1rem;
    }
}
</style>
