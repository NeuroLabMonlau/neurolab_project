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
    protected $role;
    protected $course;
    protected $user;
    protected $student;
    protected $tutor;

    public function __construct(Role $role, Course $course, User $user, Student $student, Tutor $tutor)
    {
        $this->role = $role;
        $this->course = $course;
        $this->user = $user;
        $this->student = $student;
        $this->tutor = $tutor;
    }

    public function index()
    {
        $data = $this->getData();

        return view('psychologist.users.index', $data);
    }

    public function usersFilterByRole(Request $request)
    {
        $data = $this->getData();
        $role_id = $request['role'];
        
        return view('psychologist.users.index', array_merge($data, ['filterByRole' => $role_id] ?? null));
    }

    private function getData()
    {
        return [
            'roles' => $this->role->all(),
            'courses' => $this->course->all(),
            'students' => $this->student->all(),
            'tutors' => $this->tutor->all(),
            'users' => $this->user->all()
        ];
    }
}
