<script setup>
import { Link } from '@inertiajs/vue3'
import { Disclosure, DisclosurePanel, DisclosureButton, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline'
</script>

<template>
    <Disclosure as="nav" class="border-b border-b-slate-200" v-slot="{ open }">
        <div class="mx-auto max-w-7xl px-8">
            <div class="flex h-16 justify-between relative">
                <div class="flex grow">
                    <div class="flex items-center sm:mr-6">
                        <Link href="#" class="font-bold font-mono text-lg">
                            {{ $page.props.config['app.name'] }}
                        </Link>
                    </div>
                    <div class="flex justify-between w-full">
                        <div class="hidden sm:flex sm:ml-6 space-x-8">
                            <Link href="#" class="inline-flex items-center border-b-2 border-transparent hover:border-gray-200 text-sm font-medium text-gray-900">
                                Home
                            </Link>
                            <Link href="#" class="inline-flex items-center border-b-2 border-transparent hover:border-gray-200 text-sm font-medium text-gray-900">
                                Dashboard
                            </Link>
                        </div>
                        <!-- <div class="hidden sm:flex sm:ml-6 space-x-8">
                            <Link href="#" class="inline-flex items-center border-b-2 border-transparent text-sm font-medium text-gray-900">
                                Create an account
                            </Link>
                            <Link href="#" class="inline-flex items-center border-b-2 border-transparent text-sm font-medium text-gray-900">
                                Sign in
                            </Link>
                        </div> -->
                    </div>
                </div>

                <div class="absolute inset-y-0 right-0 flex items-center space-x-3">
                    <Menu as="div" class="relative mr-3">
                        <MenuButton class="flex items-center text-sm space-x-3">
                            <span class="font-medium text-gray-900">Alex</span>
                            <img src="https://ui-avatars.com/api/?name=Alex%20Garrett-Smith" class="h-8 w-8 rounded-full">
                        </MenuButton>
                        <MenuItems class="absolute right-0 z-10 mt-2 w-48 bg-white border border-b-slate-200 focus:outline-none">
                            <MenuItem v-slot="{ active, close }">
                                <Link href="#" class="block px-4 py-2 text-sm text-gray-900" :class="{ 'bg-gray-100': active }" v-on:mouseup="close">
                                    Account
                                </Link>
                            </MenuItem>
                            <MenuItem v-slot="{ active, close }">
                                <Link href="#" class="block px-4 py-2 text-sm text-gray-900" :class="{ 'bg-gray-100': active }" v-on:mouseup="close">
                                    Security
                                </Link>
                            </MenuItem>
                            <MenuItem v-slot="{ active }">
                                <Link href="#" class="block px-4 py-2 text-sm text-gray-900" :class="{ 'bg-gray-100': active }">
                                    Sign out
                                </Link>
                            </MenuItem>
                        </MenuItems>
                    </Menu>

                    <DisclosureButton class="sm:hidden relative p-2 text-gray-900 hover:bg-gray-100">
                        <Bars3Icon v-if="!open" class="block h-6 w-6" />
                        <XMarkIcon v-if="open" class="block h-6 w-6" />
                    </DisclosureButton>
                </div>
            </div>
        </div>

        <DisclosurePanel class="sm:hidden">
            <div class="spacey-1 pb-3">
                <Link href="#" class="block py-2 px-8 font-medium text-gray-900">Home</Link>
                <Link href="#" class="block py-2 px-8 font-medium text-gray-900">Dashboard</Link>
            </div>
            <div class="spacey-1 pb-3">
                <Link href="#" class="block py-2 px-8 font-medium text-gray-900">Create an account</Link>
                <Link href="#" class="block py-2 px-8 font-medium text-gray-900">Sign in</Link>
            </div>
        </DisclosurePanel>
    </Disclosure>
</template>
