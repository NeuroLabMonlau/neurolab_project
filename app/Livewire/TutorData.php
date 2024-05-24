<?php

namespace App\Livewire;

use App\Models\Tutor;
use App\Models\Student;
use App\Models\StudentTutorTypeRelation;
use Livewire\Component;

class TutorData extends Component
{
    public function render()
    {
        return view('livewire.tutor-data');
    }
    public function getTutor()
    {
        $student_id = Student::where('user_id', auth()->user()->id)->first();

        // dd(Student::where('user_id', auth()->user()->id)->first()->idalu);
        return  StudentTutorTypeRelation::where('id', $student_id->tutor_id)->first();
    }
}
