<script>
import Calendar from './Calendar.vue';
import CreateEvent from './CreateEvent.vue';
import { defineComponent } from 'vue';

export default defineComponent({
    components: {
        Calendar,
        CreateEvent
    },
    data(){
        return {
            showModal: false
        }
    },
    methods: {
        dateClick(arg){
            console.log(arg)
            this.$data.showModal = true
        }
    }

})

</script>

<template>
    <div>
        <!-- <h1 class="text-2xl font-semibold text-gray-900 mb-4">
            Calendar View
        </h1> -->
        <section>
            <Calendar @dateClick="dateClick"/>
        </section>

        <section>
            <CreateEvent v-if="showModal" @closeModal="showModal = false"/>

        </section>
    </div>
</template>