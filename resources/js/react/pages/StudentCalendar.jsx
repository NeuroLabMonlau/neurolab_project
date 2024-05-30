import React, { useEffect, useState } from "react";

import FullCalendar from "@fullcalendar/react";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import timeGridPlugin from "@fullcalendar/timegrid";
import dayjs from "dayjs";

const StudentCalendar = ({ id }) => {

    const [events, setEvents] = useState([]);

    useEffect(() => {
        const fetchData = async () => {
            await axios
                .get(`/student/appointments/receiver/${Number(id)}`)
                .then((response) => {
                    setEvents(response.data);
                })
                .catch((error) => {
                    console.error(error);
                });
        };
        fetchData();
    }, []);

    return (
        <div className="rounded-lg bg-white p-3">
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
                eventColor="#3788d8"
                events={events}
            />
        </div>
    );
};

export default StudentCalendar;
