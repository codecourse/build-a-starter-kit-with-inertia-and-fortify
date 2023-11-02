<script setup>
import { Head } from '@inertiajs/vue3'
import Default from '@/Layouts/Default.vue'
import Account from '@/Layouts/Account.vue'
import ChangePasswordForm from './Form/ChangePasswordForm.vue'
import TwoFactorForm from './Form/TwoFactorForm.vue'

defineOptions({ layout: [Default, Account] })
</script>

<template>
    <div class="space-y-12">
        <ChangePasswordForm v-if="$page.props.features['update-passwords']" />
        <TwoFactorForm v-if="$page.props.features['two-factor-authentication']" />
    </div>

    <Head title="Account security" />
</template>
