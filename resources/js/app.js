import "./bootstrap";

import { createApp } from "vue";
// import calendar from "../views/components/vue/calendar.vue";
// import minicalendar from "../views/components/vue/minicalendar.vue";
// import calendarcreate from "../views/components/vue/psychologist/calendarcreate.vue";
import Calendar from "../views/components/vue/psychologist/Calendar.vue";
import CalendarView from "../views/components/vue/psychologist/CalendarView.vue";
import { InertiaApp } from "@inertiajs/inertia-vue3";
import PortalVue from "portal-vue";

window.app = createApp({
    components: {
        // calendar,
        // minicalendar,
        // calendarcreate,
        Calendar,
        CalendarView,
        PortalVue,
    },
}).mount("#app");

window.eventBus = new Vue();

new Vue({
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) =>
                    require(`../views/components/vue/psychologist/${name}`)
                        .default,
            },
        }),
}).$mount(app);

// const searchInput = document.getElementById('searchInput');
// searchInput.addEventListener("input", restartTimer, false);

// function search() {

//     let sel = document.querySelector("#searchCategory").value;
//     const searchResultsContainer = document.getElementById('results');
//     const searchTerm = searchInput.value;

//     switch (sel) {
//         case 'name':
//             fetch('/psychologist/search', { // Realiza una petición al archivo controller.php
//                 method: 'POST', // Método POST
//                 headers: {
//                     "Content-Type": "application/json", // Tipo de contenido JSON
//                     "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//                 },
//                 body: JSON.stringify({ action: "searchingName", searchTerm: searchTerm }) // Cuerpo de la petición
//             })
//                 .then(response => response.json()) // Convierte la respuesta en JSON
//                 .then(data => {
//                     console.log(data.results);
//                 })
//                 .catch(error => console.error('Error:', error));
//             break;
//         case 'dni':

//             break;
//         case 'email':

//             break;
//         default:
//             break;
//     }

// }

// function restartTimer() {
//     setTimeout(search, 1000);
// }
