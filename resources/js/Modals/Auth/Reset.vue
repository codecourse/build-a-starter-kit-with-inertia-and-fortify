<script setup>
import Modal from '@/Components/Modal.vue'
import { useForm, Head, Link } from '@inertiajs/vue3'

const props = defineProps({
    email: String,
    token: String,
})

const form = useForm({
    email: props.email,
    password: '',
    password_confirmation: '',
    token: props.token
})
</script>

<template>
    <Modal class="bg-white max-w-md p-12">
        <h2 class="text-center text-2xl font-bold font-mono text-gray-900">Reset your password</h2>
        <form class="mt-6 space-y-6" v-on:submit.prevent="form.post(route('password.update'))">
            <div>
                <label for="email" class="text-sm font-medium text-gray-900">Email</label>
                <div class="mt-2">
                    <input type="text" id="email" class="w-full py-2 text-gray-900 border-gray-300 text-sm" disabled readonly v-bind:value="form.email">
                </div>
            </div>
            <div>
                <label for="password" class="text-sm font-medium text-gray-900">Password</label>
                <div class="mt-2">
                    <input type="password" id="password" class="w-full py-2 text-gray-900 border-gray-300 text-sm" v-model="form.password">
                    <div v-if="form.errors.password" class="text-sm text-red-500 mt-2">
                        {{ form.errors.password }}
                    </div>
                </div>
            </div>

            <div>
                <label for="password_confirmation" class="text-sm font-medium text-gray-900">Confirm password</label>
                <div class="mt-2">
                    <input type="password" id="password_confirmation" class="w-full py-2 text-gray-900 border-gray-300 text-sm" v-model="form.password_confirmation">
                    <div v-if="form.errors.password_confirmation" class="text-sm text-red-500 mt-2">
                        {{ form.errors.password_confirmation }}
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

    <Head title="Reset password" />
</template>
