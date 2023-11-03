<script setup>
import { Link } from '@inertiajs/vue3'
import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline'
import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
</script>

<template>
    <Disclosure as="nav" class="border-b border-b-slate-200" v-slot="{ open }">
        <div class="mx-auto max-w-7xl px-8">
            <div class="flex h-16 justify-between relative">
                <!-- Main menu -->
                <div class="flex grow">
                    <!-- Logo -->
                    <div class="flex items-center sm:mr-6">
                        <Link href="#" class="font-bold font-mono text-lg">
                            [app name]
                        </Link>
                    </div>
                    <!-- Links -->
                    <div class="flex justify-between w-full">
                        <!-- Main links -->
                        <div class="hidden sm:ml-6 sm:flex space-x-8">
                            <Link href="#" class="inline-flex items-center border-b-2 border-transparent text-sm font-medium text-gray-900 hover:border-gray-200">Home</Link>
                            <Link href="#" class="inline-flex items-center border-b-2 border-transparent text-sm font-medium text-gray-900 hover:border-gray-200">Dashboard</Link>
                        </div>

                        <!-- Auth links -->
                        <div class="hidden sm:flex space-x-8">
                            <Link href="#" class="inline-flex items-center border-b-2 border-transparent text-sm font-medium text-gray-500 hover:text-gray-700">Create an account</Link>
                            <Link href="#" class="inline-flex items-center border-b-2 border-transparent text-sm font-medium text-gray-500 hover:text-gray-700">Sign in</Link>
                        </div>
                    </div>
                </div>

                <!-- User menu -->
                <div class="absolute inset-y-0 right-0 flex items-center">
                    <Menu as="div" class="relative mr-3">
                        <MenuButton class="relative flex items-center text-sm">
                            <span class="pr-3 text-sm font-medium text-gray-900">
                                [user name]
                            </span>
                            <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name=Alex%20Garrett-Smith" />
                        </MenuButton>
                        <transition
                            enter-active-class="transition ease-out duration-200"
                            enter-from-class="transform opacity-0 scale-95"
                            enter-to-class="transform opacity-100 scale-100"
                            leave-active-class="transition ease-in duration-75"
                            leave-from-class="transform opacity-100 scale-100"
                            leave-to-class="transform opacity-0 scale-95"
                        >
                            <MenuItems class="absolute right-0 z-10 mt-2 w-48 bg-white py-1 border border-b-slate-200 focus:outline-none">
                                <MenuItem v-slot="{ active, close }">
                                    <Link href="#" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-900']" v-on:mouseup="close">Account</Link>
                                </MenuItem>
                                <MenuItem v-slot="{ active, close }">
                                    <Link href="#" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-900']" v-on:mouseup="close">Security</Link>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                    <button :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-900 w-full text-left']">Sign out</button>
                                </MenuItem>
                            </MenuItems>
                        </transition>
                    </Menu>

                    <!-- Mobile menu button -->
                    <DisclosureButton class="sm:hidden relative p-2 text-gray-900 hover:bg-gray-100 hover:text-gray-500">
                        <Bars3Icon v-if="!open" class="block h-6 w-6" />
                        <XMarkIcon v-else class="block h-6 w-6" />
                    </DisclosureButton>
                </div>
            </div>
        </div>

        <!-- Mobile navigation -->
        <DisclosurePanel class="sm:hidden">
            <div class="space-y-1 pb-3">
                <Link href="#" class="block py-2 px-8 text-base font-medium text-gray-700 hover:text-gray-900">Home</Link>
                <Link href="#" class="block py-2 px-8 text-base font-medium text-gray-700 hover:text-gray-900">Dashboard</Link>
            </div>

            <div class="space-y-1 pb-3">
                <Link href="#" class="block py-2 px-8 text-base font-medium text-gray-700 hover:text-gray-900">Create an account</Link>
                <Link href="#" class="block py-2 px-8 text-base font-medium text-gray-700 hover:text-gray-900">Sign in</Link>
            </div>
        </DisclosurePanel>
    </Disclosure>
</template>
