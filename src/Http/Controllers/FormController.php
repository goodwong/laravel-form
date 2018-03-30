<?php

namespace Goodwong\Form\Http\Controllers;

use Goodwong\Form\Entities\Form;
use Goodwong\Form\Events\FormViewed;
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
        if ($base_id = $request->input('clone_from')) {
            $form = Form::findOrFail($base_id)->replicate();
        } else {
            $form = new Form;
        }
        $form->fill($request->all());
        $form->save();
        return $form;
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Goodwong\Form\Entities\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Form $form)
    {
        event(new FormViewed($request->user() ? $request->user()->id : null, $form));
        return $form->makeVisible('settings');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Goodwong\Form\Entities\Form  $form
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
     * @param  \Goodwong\Form\Entities\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {
        if ($request->input('updated_at') != $form->updated_at) {
            return response()->json("编辑冲突，有人在这段时间编辑过本条数据，请刷新后重新编辑保存", 409);
        }
        $form->update($request->all());
        return $form->makeVisible('settings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Goodwong\Form\Entities\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        $form->delete();
        return response()->json(null, 204);
    }
}
