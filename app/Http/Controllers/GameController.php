<?php

namespace App\Http\Controllers;

use App\Game;
use App\System;
use App\Score;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class GameController extends Controller
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
        $games = Game::with('system')->simplepaginate(8);

        return view('game.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $systems = System::all();
        $game = new Game();
        return view('game.create', compact('systems', 'game'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = request()->validate([
            'system_id' => 'required',
            'title' => 'required',
            'released' => 'required',
            'cover' => 'sometimes|image',
        ]);

        $game = Game::create($data);
        $this->storeCover($game);
        return back();
    }

    private function storeCover($game)
    {
        if (request()->has('cover')) {
            $game->update([
                'cover' => request()->cover->store('covers/' . $game->id, 'public'),
            ]);

            $image = Image::make(public_path('storage/' . $game->cover))->resize(null, 300, function ($constraint) {
    $constraint->aspectRatio();
});
            $image->save(null, 50);
    }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        $scores = Score::with('game', 'user')->where('game_id', '=', $game->id)->orderBy('score', 'desc')->simplepaginate(15);

        return view('game.show', compact('game', 'scores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        $systems = System::all();
        return view('game.edit', compact('systems', 'game'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Game $game)
    {
        $data = request()->validate([
            'system_id' => 'required',
            'title' => 'required',
            'released' => 'required',
            'cover' => 'sometimes|image',
        ]);

        $game->update($data);
        $this->storeCover($game);
        return redirect('game/' . $game->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
    }
}
