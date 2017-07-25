<?php

namespace Goodwong\LaravelForm\Http\Controllers;

use Goodwong\LaravelForm\Entities\Form;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Form::orderBy('id', 'desc');
        if ($request->has('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }
        return $query->get();
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
        return Form::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \Goodwong\LaravelForm\Entities\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        return $form->makeVisible('settings');
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
        $form->update($request->all());
        return $form;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Goodwong\LaravelForm\Entities\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        $form->delete();
        return response()->json(null, 204);
    }
}
