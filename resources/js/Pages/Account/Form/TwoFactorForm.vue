<script setup>
import { router } from '@inertiajs/vue3'

const enable = () => {
    router.post(route('two-factor.enable'), {}, {
        onSuccess: () => {
            router.get(route('auth.two-factor'))
        }
    })
}
</script>

<template>
    <div>
        <button v-on:click="enable" v-if="!$page.props.auth.user.two_factor_enabled" class="text-blue-500 font-semibold text-sm">Enable two factor authentication</button>
    </div>
</template>
