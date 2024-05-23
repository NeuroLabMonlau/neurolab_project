<script>
import Calendar from './Calendar.vue';
import CreateEvent from './CreateEvent.vue';
import { defineComponent } from 'vue';

export default defineComponent({
    components: {
        Calendar,
        CreateEvent
    },
    props: {
        user: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            showModal: false,
            newEvent: {
                title: '',
                date_at: '',
                hour: '',
                user_id: '',
                sender_id: '',
                session: 1800
            }
        }
    },
    methods: {
        dateClick(arg) {
            console.log(arg)
            this.$data.showModal = true
            this.setModalOpen(arg)
        },
        closeModal() {
            this.$data.showModal = false
        },
        setModalOpen(obj) {
            let dateAndTime = obj.dateStr.split('T')

            this.newEvent.date_at = dateAndTime[0]
            this.newEvent.hour = dateAndTime[1].substr(0, 8)
            this.newEvent.user_id = this.$props.user.id
            return
        }
    }

})

</script>

<template>
    <div>
        <section>
            <Calendar @dateClick="dateClick" />
        </section>

        <section>
            <CreateEvent v-if="showModal" :form="newEvent" @closeModal="showModal = false" />
        </section>
    </div>
</template>