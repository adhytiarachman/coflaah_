<template>
    <div>
        <label class="block font-semibold mb-1">{{ label }}</label>
        <select
            class="w-full border rounded px-3 py-2"
            :value="modelValue"
            @change="$emit('update:modelValue', $event.target.value)"
        >
            <option value="" disabled>Pilih kategori</option>
            <option v-for="opt in options" :key="opt" :value="opt">
                {{ opt }}
            </option>
        </select>
    </div>
</template>

<script setup>
defineProps(["label", "options", "modelValue"]);
defineEmits(["update:modelValue"]);
</script>
