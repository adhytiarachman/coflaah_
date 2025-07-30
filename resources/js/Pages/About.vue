<template>
    <DefaultLayout>
        <!-- Loading Screen -->
        <div
            v-if="isLoading"
            class="fixed inset-0 bg-gradient-to-br from-[var(--color-coffee)] to-[var(--color-chocolate)] flex items-center justify-center z-50"
        >
            <div class="coffee-loader"></div>
        </div>

        <!-- Section Hero -->
        <div class="hero-section">
            <div class="hero-bg"></div>
            <div class="hero-content">
                <h1 class="hero-title">Tentang Kami</h1>
                <p class="hero-subtitle">
                    Coflah adalah platform kopi digital modern yang
                    menggabungkan rasa, teknologi, dan kehangatan dalam satu
                    tempat. Kami percaya teknologi pun bisa dinikmati seperti
                    kopi.
                </p>
            </div>
            <div class="scroll-indicator" @click="scrollToStory">
                <svg
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                >
                    <path d="M12 16l-6-6h12l-6 6z" />
                </svg>
            </div>
        </div>

        <!-- Section Cerita Kami -->
        <section class="story-section">
            <div class="container">
                <h2 class="section-title">Cerita Kami</h2>
                <div class="story-grid">
                    <div class="story-text">
                        <p>
                            Coflah lahir dari passion mendalam terhadap kopi
                            berkualitas dan teknologi inovatif. Kami memulai
                            perjalanan dengan visi sederhana: menciptakan
                            pengalaman kopi yang tak terlupakan di era digital.
                        </p>
                        <p>
                            Setiap cangkir kopi yang kami sajikan adalah hasil
                            dari riset mendalam, pemilihan biji terbaik, dan
                            teknik brewing yang telah disempurnakan. Kami
                            percaya bahwa kopi bukan hanya minuman, tetapi juga
                            medium untuk menciptakan koneksi dan inspirasi.
                        </p>
                        <p>
                            Dengan menggabungkan tradisi kopi klasik dan inovasi
                            modern, Coflah menghadirkan pengalaman yang autentik
                            namun tetap relevan dengan gaya hidup masa kini.
                        </p>
                    </div>
                    <div class="story-image">
                        <img
                            src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Coflah Coffee Story"
                        />
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Tim Barista -->
        <section class="barista-section">
            <div class="container">
                <h2 class="section-title">Tim Barista Kami</h2>
                <div class="barista-grid">
                    <div
                        v-for="(barista, index) in baristas"
                        :key="barista.name"
                        class="barista-card"
                        :style="{ animationDelay: `${index * 0.2}s` }"
                        @mouseenter="handleCardHover"
                        @mouseleave="handleCardLeave"
                    >
                        <img
                            :src="barista.image"
                            :alt="barista.name"
                            class="barista-image"
                        />
                        <div class="barista-info">
                            <h3 class="barista-name">{{ barista.name }}</h3>
                            <p class="barista-role">{{ barista.role }}</p>
                            <p class="barista-bio">{{ barista.bio }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Nilai-Nilai -->
        <section class="values-section">
            <div class="container">
                <h2 class="section-title text-[var(--color-cream)]">
                    Nilai-Nilai Kami
                </h2>
                <div class="values-grid">
                    <div
                        v-for="(value, index) in values"
                        :key="index"
                        class="value-item"
                    >
                        <div class="value-icon">{{ value.icon }}</div>
                        <h3 class="value-title">{{ value.title }}</h3>
                        <p>{{ value.description }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section CTA -->
        <section class="cta-section">
            <div class="container">
                <h2 class="section-title">Bergabunglah dengan Coflah</h2>
                <p class="cta-text">
                    Rasakan pengalaman kopi digital yang revolusioner. Mari
                    bersama-sama menciptakan momen-momen berharga dengan
                    secangkir kopi terbaik.
                </p>
                <button
                    class="cta-button"
                    @mousemove="handleButtonMouseMove"
                    @mouseleave="handleButtonMouseLeave"
                    @click="startCoffeeJourney"
                >
                    Mulai Perjalanan Kopi Anda
                </button>
            </div>
        </section>

        <!-- Parallax Elements -->
        <div class="parallax-element parallax-1">☕</div>
        <div class="parallax-element parallax-2">🌟</div>
        <div class="parallax-element parallax-3">🚀</div>
    </DefaultLayout>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from "vue";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";

const isLoading = ref(true);

const baristas = [
    {
        name: "Aulia Putri",
        role: "Head Barista",
        image: "https://images.unsplash.com/photo-1494790108755-2616c96d4e66?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80",
        bio: "Dengan pengalaman lebih dari 8 tahun di industri kopi, Aulia memimpin tim dengan passion dan dedikasi tinggi. Ahli dalam segala aspek brewing dan latte art.",
    },
    {
        name: "Raka Pratama",
        role: "Coffee Technologist",
        image: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80",
        bio: "Menggabungkan AI & kopi, Raka memastikan setiap inovasi teknologi tetap mempertahankan kehangatan dan kualitas rasa tradisional.",
    },
    {
        name: "Nina Syafira",
        role: "UX Brewmaster",
        image: "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80",
        bio: "Merancang pengalaman pengguna seperti membuat latte art terbaik. Nina memastikan setiap interaksi dengan Coflah memberikan kepuasan maksimal.",
    },
];

const values = [
    {
        icon: "☕",
        title: "Kualitas Premium",
        description:
            "Kami tidak pernah berkompromi dengan kualitas. Setiap biji kopi dipilih dengan teliti dan diproses dengan standar tertinggi.",
    },
    {
        icon: "🚀",
        title: "Inovasi Berkelanjutan",
        description:
            "Terus berinovasi dalam teknologi dan metode brewing untuk memberikan pengalaman kopi yang tak tertandingi.",
    },
    {
        icon: "🌱",
        title: "Keberlanjutan",
        description:
            "Berkomitmen pada praktik berkelanjutan, mendukung petani kopi lokal dan menjaga kelestarian lingkungan.",
    },
    {
        icon: "❤️",
        title: "Komunitas",
        description:
            "Membangun komunitas pecinta kopi yang saling mendukung dan berbagi passion terhadap kultur kopi.",
    },
];

let observer;

onMounted(() => {
    // Simulate loading
    setTimeout(() => {
        isLoading.value = false;
        initAnimations();
    }, 1500);

    // Initialize Intersection Observer for scroll animations
    observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("animate-in");
                }
            });
        },
        { threshold: 0.1 }
    );

    // Observe all animated elements
    setTimeout(() => {
        const animatedElements =
            document.querySelectorAll(".animate-on-scroll");
        animatedElements.forEach((el) => observer.observe(el));
    }, 1600);
});

onUnmounted(() => {
    if (observer) {
        observer.disconnect();
    }
});

const initAnimations = () => {
    // Add animate-on-scroll class to elements
    const elementsToAnimate = [
        ".section-title",
        ".story-text",
        ".story-image",
        ".barista-card",
        ".value-item",
        ".cta-text",
        ".cta-button",
    ];

    elementsToAnimate.forEach((selector) => {
        const elements = document.querySelectorAll(selector);
        elements.forEach((el) => el.classList.add("animate-on-scroll"));
    });
};

const scrollToStory = () => {
    const storySection = document.querySelector(".story-section");
    storySection.scrollIntoView({ behavior: "smooth" });
};

const handleCardHover = (event) => {
    event.currentTarget.style.transform = "translateY(-10px) scale(1.02)";
};

const handleCardLeave = (event) => {
    event.currentTarget.style.transform = "translateY(0) scale(1)";
};

const handleButtonMouseMove = (event) => {
    const rect = event.currentTarget.getBoundingClientRect();
    const x = event.clientX - rect.left - rect.width / 2;
    const y = event.clientY - rect.top - rect.height / 2;

    event.currentTarget.style.transform = `translate(${x * 0.2}px, ${
        y * 0.2
    }px)`;
};

const handleButtonMouseLeave = (event) => {
    event.currentTarget.style.transform = "translate(0, 0)";
};

const startCoffeeJourney = () => {
    // Add your navigation logic here
    console.log("Starting coffee journey...");
};
</script>

<style scoped>
:root {
    --color-coffee: #2d1b12;
    --color-chocolate: #5d4037;
    --color-cream: #f5f5dc;
    --color-cream-light: #fefbf3;
    --color-gold: #d4af37;
    --color-accent: #8b4513;
    --color-white: #ffffff;
    --color-gray: #6b7280;
    --color-dark: #1f2937;
}

.coffee-loader {
    width: 60px;
    height: 60px;
    border: 4px solid var(--color-gold);
    border-top: 4px solid transparent;
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

.hero-section {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(
        135deg,
        var(--color-coffee) 0%,
        var(--color-chocolate) 50%,
        var(--color-accent) 100%
    );
    position: relative;
    overflow: hidden;
}

.hero-bg {
    position: absolute;
    inset: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="coffee-pattern" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23coffee-pattern)"/></svg>');
    opacity: 0.3;
}

.hero-content {
    text-align: center;
    color: var(--color-cream);
    z-index: 2;
    max-width: 800px;
    padding: 0 2rem;
}

.hero-title {
    font-size: clamp(3rem, 8vw, 6rem);
    font-weight: 800;
    background: linear-gradient(45deg, var(--color-gold), var(--color-cream));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 1.5rem;
    line-height: 1.1;
    animation: fadeInUp 1.2s ease-out;
}

.hero-subtitle {
    font-size: clamp(1.2rem, 3vw, 1.5rem);
    opacity: 0.9;
    margin-bottom: 2rem;
    font-weight: 300;
    animation: fadeInUp 1.2s ease-out 0.3s both;
}

.scroll-indicator {
    position: absolute;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    color: var(--color-cream);
    cursor: pointer;
    transition: transform 0.3s ease;
    animation: bounce 2s infinite;
}

.scroll-indicator:hover {
    transform: translateX(-50%) scale(1.1);
}

@keyframes bounce {
    0%,
    20%,
    50%,
    80%,
    100% {
        transform: translateX(-50%) translateY(0);
    }
    40% {
        transform: translateX(-50%) translateY(-10px);
    }
    60% {
        transform: translateX(-50%) translateY(-5px);
    }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
}

.section-title {
    font-size: clamp(2.5rem, 5vw, 3.5rem);
    font-weight: 700;
    text-align: center;
    margin-bottom: 3rem;
    position: relative;
    color: var(--color-coffee);
}

.section-title::after {
    content: "";
    position: absolute;
    bottom: -0.5rem;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 3px;
    background: var(--color-gold);
}

.story-section {
    padding: 5rem 0;
    background: var(--color-cream-light);
}

.story-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: center;
}

.story-text {
    font-size: 1.2rem;
    line-height: 1.8;
    color: var(--color-coffee);
}

.story-text p {
    margin-bottom: 1.5rem;
}

.story-image {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.story-image img {
    width: 100%;
    height: 400px;
    object-fit: cover;
}

.barista-section {
    padding: 5rem 0;
    background: var(--color-white);
}

.barista-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}

.barista-card {
    background: var(--color-white);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    position: relative;
}

.barista-card:hover {
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.barista-image {
    width: 100%;
    height: 250px;
    object-fit: cover;
}

.barista-info {
    padding: 1.5rem;
}

.barista-name {
    font-size: 1.3rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    color: var(--color-coffee);
}

.barista-role {
    color: var(--color-gold);
    font-weight: 600;
    margin-bottom: 1rem;
}

.barista-bio {
    color: var(--color-gray);
    font-size: 0.95rem;
    line-height: 1.6;
}

.values-section {
    padding: 5rem 0;
    background: linear-gradient(
        135deg,
        var(--color-coffee),
        var(--color-chocolate)
    );
    color: var(--color-cream);
}

.values-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
}

.value-item {
    text-align: center;
    padding: 2rem;
    border-radius: 15px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    transition: transform 0.3s ease;
}

.value-item:hover {
    transform: translateY(-5px);
}

.value-icon {
    font-size: 3rem;
    margin-bottom: 1rem;
}

.value-title {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

.cta-section {
    padding: 5rem 0;
    background: var(--color-cream-light);
    text-align: center;
}

.cta-text {
    font-size: 1.2rem;
    max-width: 600px;
    margin: 0 auto 2rem;
    color: var(--color-coffee);
    line-height: 1.6;
}

.cta-button {
    display: inline-block;
    background: linear-gradient(45deg, var(--color-gold), var(--color-accent));
    color: var(--color-white);
    padding: 1rem 2rem;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    font-size: 1.1rem;
}

.cta-button:hover {
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.parallax-element {
    position: fixed;
    opacity: 0.1;
    pointer-events: none;
    font-size: 4rem;
    z-index: 1;
}

.parallax-1 {
    top: 20%;
    left: 10%;
    animation: float 6s ease-in-out infinite;
}

.parallax-2 {
    top: 60%;
    right: 10%;
    font-size: 3rem;
    animation: float 8s ease-in-out infinite reverse;
}

.parallax-3 {
    bottom: 30%;
    left: 15%;
    font-size: 2rem;
    animation: float 10s ease-in-out infinite;
}

@keyframes float {
    0%,
    100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-20px);
    }
}

/* Scroll Animation Classes */
.animate-on-scroll {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.8s ease;
}

.animate-on-scroll.animate-in {
    opacity: 1;
    transform: translateY(0);
}

@media (max-width: 768px) {
    .story-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
    }

    .hero-section {
        padding: 2rem 0;
    }

    .container {
        padding: 0 1rem;
    }

    .parallax-element {
        display: none;
    }
}
</style>
