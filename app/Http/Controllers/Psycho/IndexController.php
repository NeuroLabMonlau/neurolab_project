<?php

namespace App\Http\Controllers\Psycho;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Student;
use App\Models\Tutor;

class IndexController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $courses = Course::all();
        $users = User::all();

        $students = Student::all();
        $tutors = Tutor::all();

        return view('psychologist.users.index', [
            'roles' => $roles, 
            'courses' => $courses,
            'students' => $students,
            'tutors' => $tutors,
            'users' => $users
        ]);
    }
}
