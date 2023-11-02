<script setup>
import Modal from '@/Components/Modal.vue'
import { useForm, Head } from '@inertiajs/vue3'

const form = useForm({
    code: null
})
</script>

<template>
    <Modal class="bg-white max-w-md p-12">
        <h2 class="text-center text-2xl font-bold font-mono text-gray-900">Two factor authentication</h2>

        <form class="mt-6 space-y-6" v-on:submit.prevent="form.post('/two-factor-challenge')">
            <div>
                <label for="code" class="text-sm font-medium text-gray-900">Code</label>
                <div class="mt-2">
                    <input type="password" id="code" class="w-full py-2 text-gray-900 border-gray-300 text-sm" v-model="form.code">
                    <div v-if="form.errors.code" class="text-sm text-red-500 mt-2">
                        {{ form.errors.code }}
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

    <Head title="Two factor challenge" />
</template>
