<script setup>
import { Head } from '@inertiajs/vue3'
import Default from '@/Layouts/Default.vue'
import Account from '@/Layouts/Account.vue'
import ChangePasswordForm from './Form/ChangePasswordForm.vue'

defineOptions({ layout: [Default, Account] })
</script>

<template>
    <div class="space-y-12">
        <ChangePasswordForm v-if="$page.props.features['update-passwords']" />

        <div v-if="$page.props.features['two-factor-authentication']">
            two factor
        </div>
    </div>

    <Head title="Account security" />
</template>
