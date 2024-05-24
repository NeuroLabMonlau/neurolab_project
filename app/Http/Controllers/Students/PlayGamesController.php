<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\GameTestStudent;
use App\Models\Student;
use Illuminate\Http\Request;

class PlayGamesController extends Controller
{
    public function index()
    {
        $studentId = Student::where('user_id', auth()->user()->id)->first()->id;

        $pendingTests = GameTestStudent::where('student_id', $studentId)
            ->where('played', 'false')
            ->with(['tests', 'games'])
            ->get();
        
        return view('web.sections.student.games', ['pendingTests' => $pendingTests]);
    }

    public function play($student_id, $gameTest_id) {

       return redirect('https://neurolab.alumnes-monlau.com?id=' . $student_id . '&gameTest_id='. $gameTest_id);
    }

}
