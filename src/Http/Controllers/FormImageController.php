<?php

namespace Goodwong\LaravelForm\Http\Controllers;

use Goodwong\LaravelForm\Entities\Form;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
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
     * @param  \Goodwong\LaravelForm\Entities\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Form $form)
    {
        $path = "forms/{$form->id}/images";

        $path = $request->file('image')->store($path, 'public');

        return response()->json(['url' => url("storage/{$path}")]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Goodwong\LaravelForm\Entities\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Goodwong\LaravelForm\Entities\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Goodwong\LaravelForm\Entities\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Goodwong\LaravelForm\Entities\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        //
    }
}
