import './bootstrap';

import { createApp } from 'vue'
import calendar from '../views/components/vue/calendar.vue'

window.app = createApp({
    components: {
        calendar
    },
}).mount('#app');