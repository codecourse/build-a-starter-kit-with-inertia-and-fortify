<script setup>
import Navigation from '@/Components/Navigation.vue'
</script>

<template>
    <div>
        <Navigation />
        <div>
            <slot />
        </div>
    </div>
</template>
