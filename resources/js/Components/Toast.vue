<script setup>
import useToast from '@/composables/useToast'

const { body, active, hide } = useToast()
</script>

<template>
    <div v-if="active" v-on:click="hide">
        {{ body }}
    </div>
</template>
