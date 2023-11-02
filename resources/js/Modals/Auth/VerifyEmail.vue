<script setup>
import Modal from '@/Components/Modal.vue'
import { useForm, Head } from '@inertiajs/vue3'
import { useModal } from 'momentum-modal'

const { close } = useModal()

const form = useForm({})
</script>

<template>
    <Modal class="bg-white max-w-md p-12">
        <h2 class="text-center text-2xl font-bold font-mono text-gray-900">Verify your email</h2>

        <form class="mt-6 space-y-6" v-on:submit.prevent="form.post(route('verification.send'), { onSuccess: () => close() })">
            <p class="text-sm">You'll need to verify your email before accessing that.</p>
            <div>
                <button type="submit" class="flex w-full justify-center bg-blue-500 px-3 py-2 text-sm font-semibold text-white disabled:opacity-50" :disabled="form.processing">
                    Resend email
                </button>
            </div>
        </form>
    </Modal>

    <Head title="Verify your email" />
</template>
