<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // get all the characters
        $characters = \App\Character::all();
        // load the view and pass the characters
        return view('welcome', ['characters' => $characters]);
    }

    /**
     * Display the view to create the resource.
     *
     * @return Response
     */
    public function create()
    {
        // load the view to enter a new character
        return view('submit');
    }

    /**
     * Store the new resource resource.
     *
     * @return Response
     */
    public function store()
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'actor' => 'required|max:255',
            'description' => 'required|max:255',
        ]);
        $character = tap(new \App\Character($data))->save();
        return redirect('/');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // get the character
    $character = \App\Character::find($id);

    // show the view and pass the character to it
    return view('show')->with('character', $character);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // get the character
        $character = \App\Character::find($id);

        // show the edit and pass the character to it
        return view('edit')->with('character', $character);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $data = $this->validate(request(), [
            'name' => 'required|max:255',
            'actor' => 'required|max:255',
            'description' => 'required|max:255',
        ]);
    
        $character = \App\Character::findOrFail($id);
        $character->update(request()->all());
    
        return redirect('/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $character = \App\Character::findOrFail($id);
        $character->delete();

        return redirect('/');

    }

}

