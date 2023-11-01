<script setup>
import { ref, computed, watch } from 'vue'
import { Head, useForm, usePage } from '@inertiajs/vue3'
import Default from '@/Layouts/Default.vue'
import Account from '@/Layouts/Account.vue'

defineOptions({ layout: [Default, Account] })

const page = usePage()

const form = useForm({
    _method: 'PUT',
    email: page.props.auth.user.email,
    name: page.props.auth.user.name,
    photo: null
})

const submit = () => {
    form.post(route('user-profile-information.update'), {
        preserveScroll: true
    })
}

const photo = ref(null)

watch(photo, (photo) => {
    form.photo = photo
})

const photoPreview = computed(() => {
    if (!photo.value) {
        return
    }

    return URL.createObjectURL(photo.value)
})
</script>

<template>
    <div>
        <h2 class="font-bold text-gray-900 font-mono">Profile information</h2>

        <form class="mt-10 space-y-6" v-on:submit.prevent="submit">
            <div>
                <label for="email" class="text-sm font-medium text-gray-900">Email</label>
                <div class="mt-2">
                    <input type="text" id="email" class="w-full py-2 text-gray-900 border-gray-300 text-sm" v-model="form.email">
                    <div v-if="form.errors.email" class="text-sm text-red-500 mt-2">
                        {{ form.errors.email }}
                    </div>
                </div>
            </div>

            <div>
                <label for="name" class="text-sm font-medium text-gray-900">Name</label>
                <div class="mt-2">
                    <input type="text" id="name" class="w-full py-2 text-gray-900 border-gray-300 text-sm" v-model="form.name">
                    <div v-if="form.errors.name" class="text-sm text-red-500 mt-2">
                        {{ form.errors.name }}
                    </div>
                </div>
            </div>

            <div>
                <label for="photo" class="text-sm font-medium text-gray-900">Profile photo</label>
                <div class="flex mt-2 items-center space-x-3">
                    <div>
                        <img :src="photoPreview" class="w-12 h-12 rounded-full" v-if="photoPreview">
                        <img :src="$page.props.auth.user.avatar_url" class="w-12 h-12 rounded-full" v-else>
                    </div>
                    <div>
                        <button v-if="photo" type="button" v-on:click="photo = null" class="text-sm font-semibold text-blue-500">Clear</button>
                        <label for="photo" class="text-sm font-semibold text-blue-500" v-else>Choose new photo</label>
                        <input type="file" id="photo" class="sr-only" v-on:change="photo = $event.target.files[0]">
                    </div>
                </div>
            </div>

            <div>
                <button type="submit" class="flex w-full justify-center bg-blue-500 px-3 py-2 text-sm font-semibold text-white disabled:opacity-50" :disabled="form.processing">
                    Update
                </button>
            </div>
        </form>
    </div>

    <Head title="Profile information" />
</template>
