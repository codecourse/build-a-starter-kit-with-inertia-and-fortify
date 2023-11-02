<script setup>
import Modal from '@/Components/Modal.vue'
import { useForm, Head } from '@inertiajs/vue3'
import { useModal } from 'momentum-modal'

const { close } = useModal()

const form = useForm({
    email: null
})
</script>

<template>
    <Modal class="bg-white max-w-md p-12">
        <h2 class="text-center text-2xl font-bold font-mono text-gray-900">Recover your account</h2>

        <form class="mt-6 space-y-6" v-on:submit.prevent="form.post(route('password.email'), { onSuccess: () => close() })">
            <div>
                <label for="email" class="text-sm font-medium text-gray-900">Email</label>
                <div class="mt-2">
                    <input type="text" id="email" class="w-full py-2 text-gray-900 border-gray-300 text-sm" v-model="form.email">
                    <div v-if="form.errors.email" class="text-sm text-red-500 mt-2">
                        {{ form.errors.email }}
                    </div>
                </div>
            </div>

            <div>
                <button type="submit" class="flex w-full justify-center bg-blue-500 px-3 py-2 text-sm font-semibold text-white disabled:opacity-50" :disabled="form.processing">
                    Continue
                </button>
            </div>
        </form>
    </Modal>

    <Head title="Recover your account" />
</template>
