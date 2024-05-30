import React from "react";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import PsychologistCalendar from "./pages/PsychologistCalendar";
import StudentCalendar from "./pages/StudentCalendar";

const App = (props) => {
    const { data } = props;
    
    return (
        <BrowserRouter>
            <div className="">
                <Routes>
                    <Route
                        path="/psychologist/calendar"
                        element={<PsychologistCalendar id={data} />}
                    ></Route>

                    <Route
                        path="/student/dashboard/calendar"
                        element={<StudentCalendar id={data} />}
                    ></Route>
                </Routes>
            </div>
        </BrowserRouter>
    );
};

export default App;
