<?php

namespace App\Http\Controllers;

use App\System;
use App\Game;
use Illuminate\Http\Request;

class SystemController extends Controller
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
        $systems = System::with('games')->get();
        return view('system.index', compact('systems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $system = new System();
        return view('system.create', compact('system'));
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
            'name' => 'required',
            'company' => 'required',
        ]);

        System::create($data);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\System  $system
     * @return \Illuminate\Http\Response
     */
    public function show(System $system)
    {
        $games = Game::where('system_id', '=', $system->id)->simplepaginate(15);
        return view('system.show', compact('system', 'games'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\System  $system
     * @return \Illuminate\Http\Response
     */
    public function edit(System $system)
    {
        return view('system.edit', compact('system'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\System  $system
     * @return \Illuminate\Http\Response
     */
    public function update(System $system)
    {
        $data = request()->validate([
            'name' => 'required',
            'company' => 'required',
        ]);
        $system->update($data);
        return redirect('system/' . $system->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\System  $system
     * @return \Illuminate\Http\Response
     */
    public function destroy(System $system)
    {
        //
    }
}
