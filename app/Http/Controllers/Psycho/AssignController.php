<?php

namespace App\Http\Controllers\Psycho;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Test;

class AssignController extends Controller
{
    public function assignGamesIndex($id)
    {
        $test = Test::find($id);
        $students = Student::with('course')->paginate(10);
        return view('psychologist.assign.students-index', ['students' => $students, 'test' => $test]);
    }
}
