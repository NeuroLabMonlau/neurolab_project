<script>
import Calendar from "./Calendar.vue";
import CreateEvent from "./CreateEvent.vue";
import { defineComponent } from "vue";
import formatTime from "../../../../js/Mixins/transformTime";
import { Inertia } from "@inertiajs/inertia";

export default defineComponent({
    components: {
        Calendar,
        CreateEvent,
    },
    props: {
        user: {
            type: Object,
            required: true,
        },
    },
    data() {
        return {
            showModal: false,
            newEvent: {
                title: "",
                date_at: "",
                hour: "",
                user_id: "",
                sender_id: "",
                session: 1800,
            },
        };
    },
    methods: {
        dateClick(arg) {
            console.log(arg);
            this.$data.showModal = true;
            this.setModalOpen(arg);
        },
        closeModal() {
            this.$data.showModal = false;
        },
        setModalOpen(obj) {
            let dateAndTime = obj.dateStr.split("T");

            this.newEvent.date_at = dateAndTime[0];
            this.newEvent.hour = dateAndTime[1].substr(0, 8);
            this.newEvent.user_id = this.$props.user.id;
            return;
        },
        saveAppt(param) {
            if (param.title == "" || param.title == null) {
                alert("No puedes dejar el campo motivo vacio");
                return;
            }

            let dataAppt = this.setDurationSesion(param);

            Inertia.post("/psychologist/appointment", dataAppt, {
                onSuccess: (page) => {
                    if (Object.entries(page.props.errors).length === 0) {
                        this.closeModal();
                    }
                },
            });

            Inertia.on("error", (event) => {
                event.preventDefault();
                console.log("capuramos el error: ", event.message);
            });
        },
        setDurationSesion(form) {
            let dateApt = form.date_at + " " + form.hour;

            let initSession = new Date(dateApt);

            const getSecondsSession = initSession.getSeconds() + form.session;

            initSession.setSeconds(getSecondsSession);

            return {
                title: form.title,
                start: dateApt,
                end: formatTime(initSession),
                session: form.session,
                user_id: form.user_id,
            };
        },
    },
});
</script>

<template>
    <div>
        <section>
            <Calendar @dateClick="dateClick" />
        </section>

        <section>
            <CreateEvent
                v-if="showModal"
                :form="newEvent"
                @closeModal="showModal = false"
                @saveAppt="saveAppt"
            />
        </section>
    </div>
</template>
