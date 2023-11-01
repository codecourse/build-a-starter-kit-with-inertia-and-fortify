<script setup>
import useToast from '@/composables/useToast'
import { TransitionRoot, TransitionChild } from '@headlessui/vue'

const { body, active, hide } = useToast()
</script>

<template>
    <TransitionRoot as="template" :show="active">
        <TransitionChild
            as="template"
            enter="duration-200 ease-in-out"
            enter-from="-translate-y-full opacity-0"
            leave="duration-200 ease-in-out"
            leave-to="-translate-y-full opacity-0"
        >
            <div class="fixed top-0 left-1/2 -translate-x-1/2 bg-blue-500/90 px-4 py-3 text-white mt-6 z-[100] text-sm">
                {{ body }}
            </div>
        </TransitionChild>
    </TransitionRoot>
</template>
