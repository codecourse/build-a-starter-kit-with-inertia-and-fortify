<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
    <div>
        <div class="mx-auto max-w-4xl sm:grid grid-cols-4 gap-8 space-y-8 sm:space-y-0 px-4 py-6 lg:py-8">
            <div class="col-span-1">
                <nav class="sm:border-r border-r-slate-100 h-full">
                    <ul class="space-y-1">
                        <li>
                            <Link :href="route('account.index')" class="text-gray-900 flex p-2 pl-3 text-sm font-semibold" :class="{ 'bg-gray-100': $page.props.ziggy.route_name === 'account.index' }">
                                Profile information
                            </Link>
                        </li>
                        <li v-if="$page.props.features.security">
                            <Link :href="route('account.security.index')" class="text-gray-900 flex p-2 pl-3 text-sm font-semibold" :class="{ 'bg-gray-100': $page.props.ziggy.route_name === 'account.security.index' }">
                                Security
                            </Link>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-span-3">
                <slot />
            </div>
        </div>
    </div>
</template>
