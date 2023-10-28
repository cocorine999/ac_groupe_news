<?php

namespace App\Http\Controllers\App\Admin;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class TagController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Tag();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('enfold.backend.admin.tags.index')->with('tags', Tag::latest()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('enfold.backend.admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            $this->validate($request, [
                'name' => 'required|unique:tags,name,id'
            ]);

            $this->model->create([
                'name' => strtoupper($request->name),
                'slug' => strtolower($request->name),
            ]);

            DB::commit();
            \Toastr::success('Enregistrement effectué');
            return $this->index();
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($tag)
    {
        return view('enfold.backend.admin.tags.edit')->with('tag', Tag::findOrfail($tag));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tag)
    {

        DB::beginTransaction();
        try {
            $this->validate($request, [

                'name' => [
                    'required',
                    'string',
                    'max:100',
                    Rule::unique('tags', 'name')->ignore($tag, 'id'),

                ]
            ]);

            $this->model->findOrfail($tag)->update([
                'name' => strtoupper($request->name),
                'slug' => strtolower($request->name),
            ]);

            DB::commit();
            \Toastr::success('Mis à jour effectuée');

            return $this->index();
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($tag)
    {
        DB::beginTransaction();
        try {
            $tg = $this->model->findOrfail($tag);

            if ($tg->posts()->count() != 0) {

                \Toastr::warning('Cette action ne peut être effectuée ');

                return $this->index();
            }
            $tg->delete();
            DB::commit();
            \Toastr::success('Suppression effectuée');

            return $this->index();
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}