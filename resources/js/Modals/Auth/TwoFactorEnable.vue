<script setup>
import Modal from '@/Components/Modal.vue'
import { useForm, Head, router } from '@inertiajs/vue3'
import { onMounted, ref } from 'vue'
import axios from 'axios'

const qrCode = ref('')

onMounted(() => {
    axios.get(route('two-factor.qr-code')).then((response) => {
        qrCode.value = response.data.svg
    }).catch((e) => {
        if (e.response.status === 423) {
            router.get(route('password.confirm'))
        }
    })
})

const form = useForm({
    code: null
})

const submit = () => {
    form.post(route('two-factor.confirm'), {
        onSuccess: () => {
            router.get(route('account.security.index'))
        }
    })
}

</script>

<template>
    <Modal class="bg-white max-w-md p-12">
        <h2 class="text-center text-2xl font-bold font-mono text-gray-900">Set up two factor authentication</h2>

        <form class="mt-6 space-y-6" v-on:submit.prevent="submit">
            <p class="text-sm">To set up two factor authentication, scan the QR code with your authenticator application and enter the code below.</p>

            <div v-html="qrCode" class="w-1/2 mx-auto"></div>

            <div>
                <label for="code" class="text-sm font-medium text-gray-900">Code</label>
                <div class="mt-2">
                    <input type="text" id="code" class="w-full py-2 text-gray-900 border-gray-300 text-sm" v-model="form.code">
                    <div v-if="form.errors.confirmTwoFactorAuthentication" class="text-sm text-red-500 mt-2">
                        {{ form.errors.confirmTwoFactorAuthentication.code }}
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

    <Head title="Enable two factor authentication" />
</template>
