<?php

namespace App\Http\Controllers\Psycho;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Student;
use App\Models\Tutor;
use Illuminate\Support\Facades\View;

class IndexController extends Controller
{
    protected $role;
    protected $course;
    protected $user;
    protected $student;
    protected $tutor;
    protected $address;

    public function __construct(Role $role, Course $course, User $user, Student $student, Tutor $tutor, Address $address)
    {
        $this->role = $role;
        $this->course = $course;
        $this->user = $user;
        $this->student = $student;
        $this->tutor = $tutor;
        $this->address = $address;
    }

    public function index()
    {
        $data = $this->getData();
        $users = $data['users'];
        $tutors = $data['tutors'];
        $roles = $data['roles'];
        $courses = $data['courses'];

        return view('psychologist.users.index', compact('users', 'data', 'tutors', 'roles', 'courses'));
    }

    public function usersFilterByRole(Request $request)
    {

        $role_id = $request['role'];

        $usersQuery = $this->user->where('role_id', $role_id);
        $data = $this->getData();
        //pagination

        $users = $usersQuery->paginate(10);

        return view('psychologist.users.index', array_merge($data, ['filterByRole' => $role_id, 'users' => $users]));
    }

    public function usersFilterByCourse(Request $request)
    {

        $course_id = $request['course'];

        $usersQuery = $this->student->where('course_id', $course_id);
        $data = $this->getData();
        //pagination

        $students = $usersQuery->paginate(10);

        return view('psychologist.users.index', array_merge($data, ['filterByCourse' => $course_id, 'students' => $students]));
    }

    public function usersFilterByName(Request $request)
    {
        $searchTerm = $request['searchInput'];
        
        // Perform search query based on $searchTerm
        $resultsQuery = $this->user->where('username', 'like', "$searchTerm%");
        $data = $this->getData();
        // error_log($results);
        // return $results;
        $results = $resultsQuery->paginate(10);
        
        return view('psychologist.users.index', array_merge($data, ['filterByName' => $searchTerm, 'results' => $results]));
    }


    public function usersFilterByDni(Request $request)
    {
        $searchTerm = $request['searchInput'];
        
        // Perform search query based on $searchTerm
        $resultsQuery = $this->student->where('dni_nif', 'like', "$searchTerm%");
        $data = $this->getData();
        // error_log($results);
        // return $results;
        $results = $resultsQuery->paginate(10);
        
        return view('psychologist.users.index', array_merge($data, ['filterByDni' => $searchTerm, 'results' => $results]));
    }

    public function usersFilterByEmail(Request $request)
    {
        $searchTerm = $request['searchInput'];
        
        // Perform search query based on $searchTerm
        $resultsQuery = $this->user->where('email', 'like', "%$searchTerm%");
        $data = $this->getData();
        // error_log($results);
        // return $results;
        $results = $resultsQuery->paginate(10);
        
        return view('psychologist.users.index', array_merge($data, ['filterByEmail' => $searchTerm, 'results' => $results]));
    }

    public function search(Request $request)
    {
        $data = $request['searchCategory'];
        // Verificar el tipo de solicitud
        if (!empty($data) && $data !== null) {
            switch ($data) {
                case 'name':
                    return $this->usersFilterByName($request);
                    break;
                case 'dni':
                    return $this->usersFilterByDni($request);
                    break;
                case 'email':
                    return $this->usersFilterByEmail($request);
                    break;
                default:
                    break;
            }
        }
    }

    public function edituser(Request $request) {
        $user_id = $request['id'];
        $user = $this->user->find($user_id);
        $student = $this->student->where('user_id', $user_id)->first();
        $course = $this->course->find($student->course_id);
        $address =$this->address->where('id', $student->address_id)->first();
        return view('psychologist.users.edit', compact('user', 'student', 'course', 'address'));
    }

    public function deleteuser(Request $request) {
        $user_id = $request['id'];
        $user = $this->user->find($user_id);
        $student = $this->student->where('user_id', $user_id)->first();
        return view('psychologist.users.delete', compact('user', 'student', 'course', 'address'));
    }

    public function enabledit(Request $request)
    {
        
        return back()->with('edit', 'Edición habilitada');
    }
    

    private function getData()
    {
        $roles = $this->role->all();
        $courses = $this->course->all();
        $students = $this->student->paginate(10);
        $tutors = $this->tutor->all();
        $users = $this->user->all();
        $addresses = $this->address->all();

        return [
            'roles' => $roles,
            'courses' => $courses,
            'students' => $students,
            'tutors' => $tutors,
            'users' => $users,
            'addresses' => $addresses
        ];
    }
}
