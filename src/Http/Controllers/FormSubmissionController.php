<?php

namespace Goodwong\LaravelForm\Http\Controllers;

use Goodwong\LaravelForm\Entities\Form;
use Goodwong\LaravelForm\Entities\FormSubmission;
use Goodwong\LaravelForm\Events\FormSubmitted;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Goodwong\LaravelForm\Entities\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function index(Form $form)
    {
        return FormSubmission::orderBy('id', 'desc')
        ->where('form_id', $form->id)
        ->get();
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
        $formSubmission = new FormSubmission($request->all());
        $formSubmission->form_id = $form->id;
        if (!isset($formSubmission->user_id) && $request->user()) {
            $formSubmission->user_id = $request->user()->id;
        }
        $formSubmission->save();

        event(new FormSubmitted($formSubmission->user_id, $form, $formSubmission));
        return $formSubmission;
    }

    /**
     * Display the specified resource.
     *
     * @param  \Goodwong\LaravelForm\Entities\Form  $form
     * @param  \Goodwong\LaravelForm\Entities\FormSubmission  $formSubmission
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form, FormSubmission $formSubmission)
    {
        return $formSubmission;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Goodwong\LaravelForm\Entities\FormSubmission  $formSubmission
     * @return \Illuminate\Http\Response
     */
    public function edit(FormSubmission $formSubmission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Goodwong\LaravelForm\Entities\Form  $form
     * @param  \Goodwong\LaravelForm\Entities\FormSubmission  $formSubmission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form, FormSubmission $formSubmission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Goodwong\LaravelForm\Entities\Form  $form
     * @param  \Goodwong\LaravelForm\Entities\FormSubmission  $formSubmission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form, FormSubmission $formSubmission)
    {
        $formSubmission->delete();
        return response()->json(null, 204);
    }
}
