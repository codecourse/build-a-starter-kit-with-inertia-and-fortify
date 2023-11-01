<script setup>
import { TransitionRoot, TransitionChild, Dialog, DialogPanel } from '@headlessui/vue'
import { useModal } from 'momentum-modal'

const { show, close, redirect } = useModal()
</script>

<template>
    <TransitionRoot :show="show">
        <Dialog as="div" class="relative z-50" v-on:close="close">
            <TransitionChild
                as="template"
                v-on:after-leave="redirect"
                enter="duration-300 ease-out"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="duration-300 ease-out"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div class="bg-slate-800/75 fixed inset-0"></div>
            </TransitionChild>

            <div class="fixed inset-0 overflow-y-auto transition-opacity">
                <div class="flex min-h-full items-center justify-center text-center">
                    <TransitionChild
                        as="template"
                        enter="duration-300 ease-out"
                        enter-from="opacity-0 scale-90"
                        enter-to="opacity-100 scale-100"
                        leave="duration-300 ease-out"
                        leave-from="opacity-100 scale-100"
                        leave-to="opacity-0 scale-90"
                    >
                    <DialogPanel v-bind="$attrs" class="w-full transform overflow-hidden text-left align-middle transition-all">
                        <slot />
                    </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
