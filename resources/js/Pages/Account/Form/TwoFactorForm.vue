<script setup>
import { router } from '@inertiajs/vue3'
import { ref } from 'vue'

const enable = () => {
    axios.post(route('two-factor.enable')).then(() => {
        router.get(route('auth.two-factor'))
    }).catch((e) => {
        if (e.response.status === 423) {
            router.get(route('password.confirm'))
        }
    })
}

const disable = () => {
    router.delete(route('two-factor.disable'))
}

const recoveryCodes = ref([])

const fetchRecoveryCodes = () => {
    axios.get(route('two-factor.recovery-codes')).then((response) => {
        recoveryCodes.value = response.data
    }).catch((e) => {
        if (e.response.status === 423) {
            router.get(route('password.confirm'))
        }
    })
}
</script>

<template>
    <div class="space-y-6">
        <h2 class="font-bold text-gray-900 font-mono">Two factor authentication</h2>

        <div v-if="$page.props.auth.user.two_factor_enabled" class="space-y-6">
            <button v-on:click="disable" class="text-blue-500 font-semibold text-sm">Disable two factor authentication</button>

            <div class="space-y-6">
                <h2 class="font-bold text-gray-900 font-mono">Recovery codes</h2>

                <div>
                    <button class="text-blue-500 font-semibold text-sm" v-on:click="fetchRecoveryCodes" v-if="!recoveryCodes.length">Show recovery codes</button>

                    <ul v-if="recoveryCodes.length" class="space-y-1">
                        <li v-for="recoveryCode in recoveryCodes" :key="recoveryCode" class="text-sm">
                            {{ recoveryCode }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <button v-on:click="enable" v-if="!$page.props.auth.user.two_factor_enabled" class="text-blue-500 font-semibold text-sm">Enable two factor authentication</button>

    </div>
</template>
