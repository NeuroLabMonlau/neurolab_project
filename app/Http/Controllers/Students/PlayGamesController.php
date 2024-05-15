<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\GameTestStudent;
use Illuminate\Http\Request;

class PlayGamesController extends Controller
{
    public function index()
    {
        $pendingTests = GameTestStudent::where('student_id', auth()->user()->id)
            ->where('played', 'false')
            ->with('tests')
            ->get();
        return view('web.sections.student.games', ['pendingTests' => $pendingTests]);
    }
}
