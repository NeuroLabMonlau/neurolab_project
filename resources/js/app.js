import './bootstrap';

import { createApp } from 'vue'
import calendar from '../views/components/vue/calendar.vue'
import minicalendar from '../views/components/vue/minicalendar.vue'

window.app = createApp({
    components: {
        calendar, minicalendar
    },
}).mount('#app');