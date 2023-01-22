<?php

namespace App\Http\Controllers;

use App\Models\Weapon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Inertia\Inertia;

class WeaponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $weapons = new ResourceCollection(Weapon::with('heroes')->latest()->paginate());
        return Inertia::render('Weapons', ['weapons' => $weapons]);
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
     * @param  \App\Models\Weapon  $weapon
     * @return \Illuminate\Http\Response
     */
    public function show(Weapon $weapon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Weapon  $weapon
     * @return \Illuminate\Http\Response
     */
    public function edit(Weapon $weapon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Weapon  $weapon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Weapon $weapon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Weapon  $weapon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Weapon $weapon)
    {
        //
    }
}
