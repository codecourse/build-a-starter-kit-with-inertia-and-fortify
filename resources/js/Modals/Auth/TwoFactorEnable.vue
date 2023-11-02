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

</script>

<template>
    <Modal class="bg-white max-w-md p-12">
        <h2 class="text-center text-2xl font-bold font-mono text-gray-900">Set up two factor authentication</h2>

        <form class="mt-6 space-y-6">
            <p class="text-sm">To set up two factor authentication, scan the QR code with your authenticator application and enter the code below.</p>

            <div v-html="qrCode" class="w-1/2 mx-auto"></div>
        </form>
    </Modal>

    <Head title="Enable two factor authentication" />
</template>
