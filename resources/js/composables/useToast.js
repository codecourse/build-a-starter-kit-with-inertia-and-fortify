import { ref, computed } from 'vue'

const active = ref(false)

const toastOptions = ref({
    body: '',
    timeout: 2000
})

let timeout = null

export default () => {
    const toast = (body, options) => {
        if (active.value === true) {
            clearTimeout(timeout)
        }

        toastOptions.value = {...toastOptions.value, ...options}

        toastOptions.value.body = body
        active.value = true

        timeout = setTimeout(() => {
            active.value = false
        }, toastOptions.value.timeout)
    }

    const hide = () => {
        clearInterval(timeout)
        active.value = false
        toastOptions.value.body = ''
    }

    return {
        toast,
        active,
        hide,
        body: computed(() => toastOptions.value.body)
    }
}
