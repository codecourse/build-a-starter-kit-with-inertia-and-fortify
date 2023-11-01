import { router, usePage } from '@inertiajs/vue3'
import useToast from '@/composables/useToast'

const { toast } = useToast()

export default () => {
    router.on('finish', () => {
        let body = usePage().props.toast

        if (body) {
            toast(body, {
                timeout: 2000
            })
        }
    })
}
