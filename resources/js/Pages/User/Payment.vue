<script setup>
import { onMounted } from "vue";
import { Head } from "@inertiajs/inertia-vue3";

const props = defineProps({
    snapToken: String,
});

onMounted(() => {
    const script = document.createElement("script");
    script.src = "https://app.sandbox.midtrans.com/snap/snap.js";
    script.setAttribute(
        "data-client-key",
        import.meta.env.VITE_MIDTRANS_CLIENT_KEY
    );

    script.onload = () => {
        if (window.snap && props.snapToken) {
            window.snap.pay(props.snapToken, {
                onSuccess: function (result) {
                    console.log("✅ Pembayaran berhasil:", result);
                    window.location.href = "/user/products";
                },
                onPending: function (result) {
                    console.log("⏳ Menunggu pembayaran:", result);
                    window.location.href = "/user/products";
                },
                onError: function (result) {
                    console.error("❌ Pembayaran gagal:", result);
                    alert("Terjadi kesalahan saat pembayaran.");
                },
                onClose: function () {
                    alert(
                        "Kamu menutup popup sebelum menyelesaikan pembayaran."
                    );
                },
            });
        } else {
            console.error("❌ Snap.js belum siap atau snapToken kosong.");
        }
    };

    // ❗ Cegah duplikasi jika user reload terus-menerus
    const existingScript = document.querySelector('script[src*="snap.js"]');
    if (!existingScript) {
        document.body.appendChild(script);
    } else {
        script.onload(); // jika sudah ada, langsung trigger Snap
    }
});
</script>

<template>
    <Head title="Pembayaran" />
    <div class="text-center py-10">
        <h1 class="text-2xl font-bold">Menyiapkan pembayaran...</h1>
    </div>
</template>
