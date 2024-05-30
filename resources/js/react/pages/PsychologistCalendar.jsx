import React, { useEffect, useState } from "react";

import FullCalendar from "@fullcalendar/react";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import timeGridPlugin from "@fullcalendar/timegrid";
import dayjs from "dayjs";
import { useForm } from "react-hook-form";

const PsychologistCalendar = ({ id }) => {
    const [events, setEvents] = useState([]);
    const [users, setUsers] = useState([]);
    const [search, setSearch] = useState("");
    const [modal, setModal] = useState(false);
    const [day, setDay] = useState();

    const {
        register,
        handleSubmit,
        formState: { errors },
    } = useForm();

    const dateClick = (date) => {
        setModal(true);
        setDay(date.dateStr);
    };

    useEffect(() => {
        const fetchEvents = async () => {
            await axios
                .get(`/psychologist/appointments/sender/${Number(id)}`)
                .then((response) => {
                    setEvents(response.data);
                })
                .catch((error) => {
                    console.log(error);
                });
        };
        fetchEvents();
    }, []);

    useEffect(() => {
        const fetchUsers = async () => {
            await axios
                .get(`/psychologist/appointments/search/users?search=${search}`)
                .then((response) => {
                    setUsers(response.data.data);
                })
                .catch((error) => {
                    console.error(error);
                });
        };
        fetchUsers();
    }, [search]);

    const onSubmit = handleSubmit(async (formData) => {
        const dataFormmated = {
            title: formData.title,
            description: formData.description,
            start: `${dayjs(day).format("YYYY-MM-DD HH:mm:ss")}`,
            end: `${dayjs(day)
                .add(formData.duration, "seconds")
                .format("YYYY-MM-DD HH:mm:ss")}`,
            receiver_id: Number(formData.receiver_id),
            sender_id: id,
        };

        axios
            .post("/psychologist/appointments", dataFormmated)
            .then((response) => {
                setModal(false);
                window.location.reload();
            })
            .catch((error) => {
                console.error(error);
            });

    });

    return (
        <div className="mt-8">
            <div className=" z-0 ">
                <FullCalendar
                    plugins={[dayGridPlugin, interactionPlugin, timeGridPlugin]}
                    initialView={"timeGridWeek"}
                    headerToolbar={{
                        left: "prev,next today",
                        center: "title",
                        right: "dayGridMonth,timeGridWeek,timeGridDay",
                    }}
                    allDaySlot={false}
                    selectable={true}
                    dateClick={dateClick}
                    eventColor="#3788d8"
                    events={events}
                />
            </div>

            {modal && (
                <div className="z-50 absolute">
                    <div className="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
                        <div className="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                            <div className="fixed inset-0 transition-opacity">
                                <div className="absolute inset-0 bg-zinc-500 opacity-75"></div>
                            </div>
                            <span className="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
                            <div
                                className="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                                role="dialog"
                                aria-modal="true"
                                aria-labelledby="modal-headline"
                            >
                                <form onSubmit={onSubmit}>
                                    <div className="flex flex-1 justify-center items-center">
                                        <h2 className="text-2xl font-bold text-zinc-900 px-4 py-2">
                                            Eventos
                                        </h2>
                                    </div>

                                    <div className="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                        <div>
                                            <div className="mb-4">
                                                <label
                                                    htmlFor="exampleFormControlInput1"
                                                    className="block text-zinc-700 text-sm font-bold mb-2"
                                                >
                                                    Título
                                                </label>
                                                <input
                                                    type="text"
                                                    className="shadow appearance-none border rounded w-full py-2 px-3 text-zinc-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="exampleFormControlInput1"
                                                    placeholder="Ingresa el motivo de la consulta"
                                                    {...register("title", {
                                                        required: {
                                                            value: true,
                                                            message:
                                                                "El campo es requerido",
                                                        },
                                                        maxLength: {
                                                            value: 100,
                                                            message:
                                                                "El campo no puede tener más de 100 caracteres",
                                                        },
                                                        minLength: {
                                                            value: 5,
                                                            message:
                                                                "El campo no puede tener menos de 5 caracteres",
                                                        },
                                                    })}
                                                />

                                                {errors.title && (
                                                    <p className="text-red-500 text-xs italic mt-2">
                                                        {errors.title.message}
                                                    </p>
                                                )}
                                            </div>

                                            <div className="mb-4">
                                                <label
                                                    htmlFor="exampleFormControlInput1"
                                                    className="block text-zinc-700 text-sm font-bold mb-2"
                                                >
                                                    Descripción
                                                </label>
                                                <textarea
                                                    className="shadow appearance-none border rounded w-full py-2 px-3 text-zinc-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="exampleFormControlInput1"
                                                    placeholder="Ingresa una descripción"
                                                    {...register("description")}
                                                ></textarea>
                                            </div>

                                            <div className="mb-4">
                                                <label
                                                    htmlFor="exampleFormControlInput1"
                                                    className="block text-zinc-700 text-sm font-bold mb-2"
                                                >
                                                    Fecha
                                                </label>
                                                <input
                                                    disabled
                                                    type="text"
                                                    {...register("day")}
                                                    value={dayjs(day).format(
                                                        "DD/MM/YYYY"
                                                    )}
                                                    className="shadow appearance-none border rounded w-full py-2 px-3 text-zinc-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="exampleFormControlInput1"
                                                    placeholder="Enter pass"
                                                />
                                                {errors.day && (
                                                    <p className="text-red-500 text-xs italic mt-2">
                                                        {errors.day.message}
                                                    </p>
                                                )}
                                            </div>
                                            <div className="mb-4">
                                                <label
                                                    htmlFor="exampleFormControlInput2"
                                                    className="block text-zinc-700 text-sm font-bold mb-2"
                                                >
                                                    Hora
                                                </label>
                                                <input
                                                    disabled
                                                    value={dayjs(day).format(
                                                        "HH:mm"
                                                    )}
                                                    {...register("hour")}
                                                    type="time"
                                                    className="shadow appearance-none border rounded w-full py-2 px-3 text-zinc-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="exampleFormControlInput2"
                                                />
                                            </div>
                                            <div className="col-span-6 sm:col-span-3">
                                                <label
                                                    htmlFor="timeSesion"
                                                    className="block text-sm font-medium leading-5 text-zinc-700"
                                                >
                                                    Duración
                                                </label>
                                                <select
                                                    id="timeSesion"
                                                    {...register("duration")}
                                                    className="mt-1 block form-select w-full py-2 px-3 border border-zinc-300 text-black bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                                >
                                                    <option value="900">
                                                        15 minutos
                                                    </option>
                                                    <option value="1800">
                                                        30 minutos
                                                    </option>
                                                    <option value="3600">
                                                        1 hora
                                                    </option>
                                                    <option value="21600">
                                                        6 horas
                                                    </option>
                                                    <option value="43200">
                                                        12 horas
                                                    </option>
                                                </select>
                                            </div>

                                            <div className="col-span-6 sm:col-span-3">
                                                <label
                                                    htmlFor="search"
                                                    className="block text-sm font-medium leading-5 text-zinc-700"
                                                >
                                                    Buscar usuario
                                                </label>
                                                <input
                                                    id="search"
                                                    type="text"
                                                    className="mt-1 block form-input w-full py-2 px-3 border border-zinc-300 text-black bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                                    placeholder="Buscar usuario"
                                                    onChange={(e) =>
                                                        setSearch(
                                                            e.target.value
                                                        )
                                                    }
                                                />
                                            </div>

                                            <div className="col-span-6 sm:col-span-3">
                                                <label
                                                    htmlFor="receiverUser"
                                                    className="block text-sm font-medium leading-5 text-zinc-700"
                                                >
                                                    Usuario receptor
                                                </label>
                                                <select
                                                    id="receiverUser"
                                                    {...register(
                                                        "receiver_id",
                                                        {
                                                            required: {
                                                                value: true,
                                                                message:
                                                                    "El campo es requerido",
                                                            },
                                                        }
                                                    )}
                                                    className="mt-1 block form-select w-full py-2 px-3 border border-zinc-300 text-black bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                                >
                                                    {users &&
                                                        users.map((user) => (
                                                            <option
                                                                className="text-black"
                                                                key={user.id}
                                                                value={user.id}
                                                            >
                                                                {user.username}{" "}
                                                                - {user.email}
                                                            </option>
                                                        ))}
                                                </select>

                                                {errors.receiver_id && (
                                                    <p className="text-red-500 text-xs italic mt-2">
                                                        {
                                                            errors.receiver_id
                                                                .message
                                                        }
                                                    </p>
                                                )}
                                            </div>
                                        </div>
                                    </div>
                                    <div className="bg-zinc-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                        <button
                                            type="submit"
                                            className="inline-flex justify-center w-full border border-teal-500 bg-teal-500 text-black rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-teal-600 focus:outline-none focus:shadow-outline"
                                        >
                                            Guardar
                                        </button>
                                        {/* <button
                                                        type="button"
                                                        className="inline-flex justify-center w-full border border-red-500 text-red-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-red-600 focus:outline-none focus:shadow-outline"
                                                    >
                                                        Eliminar
                                                    </button> */}
                                        <button
                                            onClick={() => setModal(false)}
                                            type="button"
                                            className="inline-flex justify-center w-full border border-zinc-200 bg-zinc-200 text-zinc-700 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-zinc-300 focus:outline-none focus:shadow-outline"
                                        >
                                            atrás
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            )}
        </div>
    );
};

export default PsychologistCalendar;
