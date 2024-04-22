<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\GameTest;
use App\Models\GameTestStudent;

class ApiController extends Controller
{
    public function index()
    {
        $games = GameTest::with(['game', 'category'])->get();
        return response()->json($games);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'time' => 'integer',
                'score' => 'integer',
                'errors' => 'integer',
            ]);

            $gameTestScore = new GameTestStudent();
            $gameTestScore->student_id = $request->input('student_id');
            $gameTestScore->time = $request->input('time');
            $gameTestScore->score = $request->input('score');
            $gameTestScore->errors = $request->input('errors');
            $gameTestScore->creation_user = $request->input('creation_user');
            $gameTestScore->update_user = $request->input('update_user');
            $gameTestScore->save();

            return response()->json($gameTestScore, 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }

    }
}
