<?php

namespace App\Http\Controllers\Psycho;

use App\Http\Controllers\Controller;
use App\Models\GameCategory;
use App\Models\Game;
use App\Models\Test;
use App\Models\GamesParameters;
use App\Models\GameTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GamesController extends Controller
{
    public function index()
    {
        return view('psychologist.games.index');
    }

    public function categoriesCreateIndex()
    {
        return view('psychologist.games.categories-create');
    }

    public function categoriesIndex()
    {
        $categories = DB::table('game_categories')->paginate(10);
        return view('psychologist.games.categories-index', ['categories' => $categories]);
    }

    public function createGameCategory(Request $request)
    {
        $request->validate([
            'name_category' => 'required|string|max:255'
        ]);

        $category = new GameCategory();
        $category->name_category = $request->name_category;

        $user = auth()->user();
        $category->creation_user = $user->id;
        $category->update_user = $user->id;
        try {
            $category->save();
        } catch (\Exception $e) {
            return back()->with('error', 'Error al crear la categoría');
        }
        return back()->with('success', 'Categoría creada correctamente');
    }

    public function gamesCreateIndex()
    {
        $categories = GameCategory::all();
        return view('psychologist.games.create', ['categories' => $categories]);
    }

    public function createGame(Request $request)
    {
        $request->validate([
            'name_game' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'game_path' => 'required|string|max:255',
            'game_category_id' => 'required|integer',
        ]);

        try {
            $game = new Game();
            $game->name_game = $request->name_game;
            $game->description = $request->description;
            $game->game_path = $request->game_path;
            $game->game_category_id = $request->game_category_id;
            $game->save();

            return back()->with('success', 'Juego creado correctamente');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al crear el juego');
        }
    }

    public function gameParametersIndex()
    {
        $games = Game::all();
        return view('psychologist.games.parameters-create', ['games' => $games]);
    }

    public function createGameParameters(Request $request)
    {
        $request->validate([
            'game' => 'required|integer',
            'level' => 'required|integer|in:1,5,10',
            'max_scores' => 'nullable|integer',
            'rounds' => 'nullable|integer',
            'max_errors' => 'nullable|integer',
            'max_time' => 'nullable|integer',
            'min_time' => 'nullable|integer'
        ]);

        try {
            $gameParameters = new GamesParameters();
            $gameParameters->game_id = $request->game;
            $gameParameters->level = $request->level;
            $gameParameters->max_scores = $request->max_scores;
            $gameParameters->rounds = $request->rounds;
            $gameParameters->max_errors = $request->max_errors;
            $gameParameters->max_time = $request->max_time;
            $gameParameters->min_time = $request->min_time;
            $gameParameters->save();

            return back()->with('success', 'Parámetros creados correctamente');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al crear los parámetros');
        }
    }


    public function gamesIndex()
    {
        $games = Game::all();
        return view('psychologist.games.games-index', ['games' => $games]);
    }

    public function testsIndex()
    {
        $tests = Test::all();
        return view('psychologist.games.tests-index', ['tests' => $tests]);
    }

    public function testsCreateIndex()
    {
        $games = Game::all();
        $categories = GameCategory::all();
        return view('psychologist.games.tests-create', ['games' => $games, 'categories' => $categories]);
    }

    public function createTest(Request $request)
    {
        $request->validate([
            'game_id' => 'required|integer',
            'test_name' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'level' => 'required|integer|in:1,5,10',
            'max_scores' => 'nullable|integer',
            'rounds' => 'nullable|integer',
            'max_errors' => 'nullable|integer',
            'max_time' => 'nullable|integer',
            'min_time' => 'nullable|integer'
        ]);

        $user = auth()->user();

        try {
            // Crear el test
            $test = new Test();
            $test->test_name = $request->test_name;
            $test->create_user = $user->id;
            $test->update_user = $user->id;
            $test->save();

            $testParameter = new GameTest();
            $testParameter->test_id = $test->id;
            $testParameter->game_id = $request->game_id;
            $testParameter->category_id = $request->category_id;
            $testParameter->level = $request->level;
            $testParameter->max_score = $request->max_scores;
            $testParameter->rounds = $request->rounds;
            $testParameter->max_errors = $request->max_errors;
            $testParameter->max_time = $request->max_time;
            $testParameter->min_time = $request->min_time;
            $testParameter->creation_user = $user->id;
            $testParameter->update_user = $user->id;
            $testParameter->save();
        } catch (\Exception $e) {
            return back()->with('error', 'Error al crear el test');
        }

        return back()->with('success', 'Test creado correctamente');
    }

    public function addGamesToTestIndex(){
        $games = Game::all();
        $tests = Test::all();
        $categories = GameCategory::all();
        return view('psychologist.games.tests-add-games', ['games' => $games, 'tests' => $tests, 'categories' => $categories]);
    }

    public function addGamesToTest(Request $request){
        $request->validate([
            'game_id' => 'required|integer',
            'test_id' => 'required|integer',
            'category_id' => 'required|integer',
            'level' => 'required|integer|in:1,5,10',
            'max_scores' => 'nullable|integer',
            'rounds' => 'nullable|integer',
            'max_errors' => 'nullable|integer',
            'max_time' => 'nullable|integer',
            'min_time' => 'nullable|integer'
        ]);

        $user = auth()->user();

        try {
            // Guardar el ID del test en la tabla de parámetros del test
            $testParameter = new GameTest();
            $testParameter->test_id = $request->test_id;
            $testParameter->game_id = $request->game_id;
            $testParameter->category_id = $request->category_id;
            $testParameter->level = $request->level;
            $testParameter->max_score = $request->max_scores;
            $testParameter->rounds = $request->rounds;
            $testParameter->max_errors = $request->max_errors;
            $testParameter->max_time = $request->max_time;
            $testParameter->min_time = $request->min_time;
            $testParameter->creation_user = $user->id;
            $testParameter->update_user = $user->id;
            $testParameter->save();
        } catch (\Exception $e) {
            return back()->with('error', 'Error al añadir juegos al test.');
        }

        return back()->with('success', 'Juego añadido al test correctamente');
    }

    public function categoriesEditIndex($id)
    {
        $category = GameCategory::find($id);
        return view('psychologist.games.categories-edit', ['category' => $category]);
    }

    public function updateGameCategory(Request $request)
    {
        $request->validate([
            'name_category' => 'required|string|max:255'
        ]);

        $category = GameCategory::find($request->category_id);
        $category->name_category = $request->name_category;

        $user = auth()->user();
        $category->update_user = $user->id;
        try {
            $category->save();
        } catch (\Exception $e) {
            return back()->with('error', 'Error al actualizar la categoría');
        }
        return back()->with('success', 'Categoría actualizada correctamente');
    }
}
