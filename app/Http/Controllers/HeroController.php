<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Weapon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class HeroController extends Controller
{
    /**
     * Display a listing of the heroes.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $heroes = new ResourceCollection(Hero::with('weapons')->latest()->paginate());
        return Inertia::render('Heroes', ['heroes' => $heroes]);
    }

    /**
     * Maybe we should put this in API directory and protect it with token
     */
    public function getDamage(Request $request, $hero_id, $weapon_id): \Illuminate\Http\RedirectResponse
    {
        $hero = Hero::where('id', $hero_id)->first();
        $weapon_id = Weapon::where('id', $weapon_id)->first();

        $health = $hero->health - $weapon_id->damage;
        if($health < 0) {
            $health = 0;
        }

        $hero->health = $health;
        $hero->save();
        $hero->refresh();

        return Redirect::back()->with('success', 'Health updated.');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function show(Hero $hero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function edit(Hero $hero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hero $hero)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hero $hero)
    {
        //
    }
}
