<?php

namespace App\Http\Controllers;

use App\Score;
use App\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ScoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scores = Score::with('game', 'user')->orderby('updated_at', 'desc')->paginate(15);

        return view('score.index', compact('scores'));
    }

    public function my()
    {
        $myscores = Score::with('game', 'user')->where('user_id', '=', Auth::user()->id)->orderBy('updated_at', 'desc')->paginate(10);
        return view('score.my', compact('myscores'));
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $games = Game::with('system')->orderby('title','asc')->get();
        $score = new Score();
        return view('score.create', compact('games', 'score'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'game_id' => 'required',
            'score' => 'required',
            'user_id' => 'required',
            'screenshot' => 'sometimes|image|max:3000',
        ]);

        $score = Score::create($data);
        $this->storeScreenshot($score);
        return back();
    }

    private function storeScreenshot($score)
        {
            if (request()->has('screenshot')) {
                $score->update([
                    'screenshot' => request()->screenshot->store('screens/' . $score->game->id, 'public'),
                ]);

                $image = Image::make(public_path('storage/' . $score->screenshot))->resize(500, null, function ($constraint) {
        $constraint->aspectRatio();
    });
                $image->save(null, 60);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function show(Score $score)
    {
        return view('score.show', compact('score'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function edit(Score $score)
    {
        $games = Game::with('system')->orderby('title', 'asc')->get();
        return view('score.edit', compact('games', 'score'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Score $score)
    {
        $data = request()->validate([
            'game_id' => 'required',
            'score' => 'required',
            'user_id' => 'required',
            'screenshot' => 'sometimes|image|max:3000',
        ]);

        $score->update($data);
        $this->storeScreenshot($score);
        return redirect('score/' . $score->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy(Score $score)
    {
        $score->delete();
        return redirect('/myscores');
    }
}
