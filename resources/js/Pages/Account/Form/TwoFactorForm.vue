<script setup>
import { router } from '@inertiajs/vue3'
import { ref } from 'vue'

const enable = () => {
    router.post(route('two-factor.enable'), {}, {
        onSuccess: () => {
            router.get(route('auth.two-factor'))
        }
    })
}

const disable = () => {
    router.delete(route('two-factor.disable'))
}
</script>

<template>
    <div class="space-y-6">
        <button v-on:click="enable" v-if="!$page.props.auth.user.two_factor_enabled" class="text-blue-500 font-semibold text-sm">Enable two factor authentication</button>
        <button v-on:click="disable" v-if="$page.props.auth.user.two_factor_enabled" class="text-blue-500 font-semibold text-sm">Disable two factor authentication</button>
    </div>
</template>
