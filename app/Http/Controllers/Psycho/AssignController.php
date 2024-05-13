<?php

namespace App\Http\Controllers\Psycho;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class AssignController extends Controller
{
    public function assignGamesIndex()
    {
        $students = Student::paginate(10);
        return view('psychologist.assign.students-index', ['students' => $students]);
    }
}
