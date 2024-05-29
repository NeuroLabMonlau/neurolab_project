<script>
import { defineComponent } from "vue";
import FullCalendar from "@fullcalendar/vue3";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import interactionPlugin from "@fullcalendar/interaction";
import { INITIAL_EVENTS } from "../../../../js/event-utils";
import axios from "axios";

export default defineComponent({
    components: {
        FullCalendar,
    },
    data() {
        return {
            calendarOptions: {
                plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin],
                headerToolbar: {
                    left: "prev,next today",
                    center: "title",
                    right: "dayGridMonth,timeGridWeek,timeGridDay",
                },
                initialView: "timeGridWeek",
                selectable: true,
                height: "auto",
                allDaySlot: false,
                slotMinTime: "08:00:00",
                slotMaxTime: "21:00:00",
                selectMirror: true,
                dayMaxEvents: true,
                eventsSet: this.handleEvents,
                dateClick: this.handleDateClick,
            },
            currentEvents: [],
        };
    },
    beforeMount() {
        axios
            .get("/api/appointments")
            .then((response) => {
                console.log("response.data:", response.data);
                this.$data.calendarOptions.events = response.data;
            })
            .catch((error) => {
                console.log("error al recoger eventos:", error.message);
            });
        // this.$data.calendarOptions.events = axios.get("/api/appointments").
        // {
        //     url: "/api/appointments",
        //     method: "GET",
        //     failure: (error) => {
        //         console.log("error al recoger eventos:", error.message);
        //     },
        // };
    },
    mounted() {
        eventBus.$on("refreshCalendar", function () {
            this.refreshCalendar();
        });
    },
    methods: {
        handleEvents(events) {
            this.currentEvents = events;
        },
        handleDateClick(clickInfo) {
            this.$emit("dateClick", clickInfo);
        },
    },
});
</script>

<template>
    <div class="demo-app">
        <div class="demo-app-main">
            <FullCalendar class="demo-app-calendar" :options="calendarOptions">
                <template v-slot:eventContent="arg">
                    <b>{{ arg.timeText }}</b>
                    <i>{{ arg.event.title }}</i>
                </template>
            </FullCalendar>
        </div>
    </div>
</template>
