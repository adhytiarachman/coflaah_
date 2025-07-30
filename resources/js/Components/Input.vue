<template>
    <div>
        <label class="block font-semibold mb-1">{{ label }}</label>
        <input
            v-bind="$attrs"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            class="w-full border rounded px-3 py-2"
        />
    </div>
</template>

<script setup>
defineProps(["label", "modelValue"]);
defineEmits(["update:modelValue"]);
</script>
