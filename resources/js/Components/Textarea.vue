<template>
    <div>
        <label class="block font-semibold mb-1">{{ label }}</label>
        <textarea
            class="w-full border rounded px-3 py-2"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            rows="4"
        />
    </div>
</template>

<script setup>
defineProps(["label", "modelValue"]);
defineEmits(["update:modelValue"]);
</script>
