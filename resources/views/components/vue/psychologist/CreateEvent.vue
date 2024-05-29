<template>
    <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
        <div
            class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
        >
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <!-- This element is to trick the browser into centering the modal contents. -->
            <span
                class="hidden sm:inline-block sm:align-middle sm:h-screen"
            ></span
            >​
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog"
                aria-modal="true"
                aria-labelledby="modal-headline"
            >
                <form>
                    <div
                        class="flex justify-between border-b border-gray-100 px-5 py-4"
                    >
                        <div>
                            <i
                                class="fas fa-exclamation-circle text-blue-500"
                            ></i>
                            <span class="font-bold text-gray-700 text-lg"
                                >Eventos</span
                            >
                        </div>
                        <div>
                            <button>
                                <i
                                    class="fa fa-times-circle text-red-500 hover:text-red-600 transition duration-150"
                                ></i>
                            </button>
                        </div>
                    </div>
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class>
                            <!-- end Buscador -->
                            <div class="mb-4">
                                <label
                                    for="exampleFormControlInput1"
                                    class="block text-gray-700 text-sm font-bold mb-2"
                                    >Motivo:</label
                                >
                                <input
                                    v-model="form.title"
                                    type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="exampleFormControlInput1"
                                    placeholder="Ingresa el motivo de la consulta"
                                    autocomplete="off"
                                />
                                <!-- <div v-if="$page.errors.title" class="text-red-500">{{ $page.errors.title[0]}}</div> -->
                            </div>
                            <div class="mb-4">
                                <label
                                    for="exampleFormControlInput1"
                                    class="block text-gray-700 text-sm font-bold mb-2"
                                    >Fecha</label
                                >
                                <input
                                    v-model="form.date_at"
                                    disabled="true"
                                    type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="exampleFormControlInput1"
                                    placeholder="Enter pass"
                                />
                            </div>
                            <div class="mb-4">
                                <label
                                    for="exampleFormControlInput2"
                                    class="block text-gray-700 text-sm font-bold mb-2"
                                    >Hora</label
                                >
                                <input
                                    v-model="form.hour"
                                    disabled="true"
                                    type="time"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="exampleFormControlInput2"
                                />
                            </div>
                            <!-- start select -->
                            <div class="col-span-6 sm:col-span-3">
                                <label
                                    for="timeSesion"
                                    class="block text-sm font-medium leading-5 text-gray-700"
                                    >Duración</label
                                >
                                <select
                                    v-model="form.session"
                                    id="timeSesion"
                                    class="mt-1 block form-select w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                >
                                    <option value="900">15 minutos</option>
                                    <option value="1800">30 minutos</option>
                                    <option value="3600">1 hora</option>
                                    <option value="21600">6 horas</option>
                                    <option value="43200">12 horas</option>
                                </select>
                            </div>
                            <!-- end select -->
                        </div>
                    </div>
                    <div
                        class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
                    >
                        <button
                            @click.prevent="store(form)"
                            type="button"
                            class="inline-flex justify-center w-full border border-teal-500 bg-teal-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-teal-600 focus:outline-none focus:shadow-outline"
                        >
                            Guardar
                        </button>
                        <button
                            type="button"
                            class="inline-flex justify-center w-full border border-red-500 text-red-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-red-600 focus:outline-none focus:shadow-outline"
                        >
                            Eliminar
                        </button>
                        <button
                            @click.prevent="closeModal"
                            type="button"
                            class="inline-flex justify-center w-full border border-gray-200 bg-gray-200 text-gray-700 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-gray-300 focus:outline-none focus:shadow-outline"
                        >
                            atrás
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Modal",
    props: {
        form: {
            type: Object,
            default: () => {},
        },
    },
    components: {},
    methods: {
        closeModal() {
            this.$emit("closeModal");
        },
        store(form) {
            this.$emit("saveAppt", form);
        },
    },
};
</script>

<style scoped>
.top-100 {
    top: 100%;
}

.bottom-100 {
    bottom: 100%;
}

.max-h-select {
    max-height: 300px;
}
</style>
