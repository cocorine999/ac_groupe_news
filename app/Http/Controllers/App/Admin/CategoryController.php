<?php

namespace App\Http\Controllers\App\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Category();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('enfold.backend.admin.categories.index')->with('categories', Category::latest()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('enfold.backend.admin.categories.create');
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
                'name' => 'required|unique:categories,name,id'
            ]);

            $imageFile = $request->file('image');
            $slug = strtolower(str_replace(" ", "-", $request->name));

            if (isset($imageFile)) {

                $this->validate($request, [
                    'image' => 'image|mimes:png,jpg,jpeg'
                ]);
                $currentDate = Carbon::now()->toDateString();
                $imageName   = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $imageFile->getClientOriginalExtension();

                $this->model->create([
                    'name' => strtoupper($request->name),
                    'slug' => $slug,
                    'image' => 'storage/category/' . $imageName,
                ]);

                DB::commit();

                if (!Storage::disk('public')->exists('category')) {
                    Storage::disk('public')->makeDirectory('category');
                }

                $img = Image::make($imageFile)->resize(100, 100)->save();

                Storage::disk('public')->put('category/' . $imageName, $img);
            } else {
                $this->model->create([
                    'name' => strtoupper($request->name),
                    'slug' => $slug,
                ]);

                DB::commit();
            }
            \Toastr::success('Enregistrement effectué');
            return $this->index();
        } catch (Exception $e) {
            DB::rollback();
            return response()->json($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $category
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
        return view('enfold.backend.admin.categories.edit')->with('category', Category::findOrfail($category));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {

        DB::beginTransaction();
        try {
            $this->validate($request, [

                'name' => [
                    'required',
                    'string',
                    'max:100',
                    Rule::unique('categories', 'name')->ignore($category, 'id'),

                ]
            ]);



            $imageFile = $request->file('image');
            $slug = strtolower(str_replace(" ", "-", $request->name));
            $category = $this->model->findOrfail($category);

            if (isset($imageFile)) {

                $this->validate($request, [
                    'image' => 'image|mimes:png,jpg,jpeg'
                ]);
                $currentDate = Carbon::now()->toDateString();
                $imageName   = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $imageFile->getClientOriginalExtension();

                $oldImage = $category->image;
                $category->update([
                    'name' => strtoupper($request->name),
                    'slug' => $slug,
                    'image' => 'storage/category/' . $imageName,
                ]);

                DB::commit();

                if (!Storage::disk('public')->exists('category')) {
                    Storage::disk('public')->makeDirectory('category');
                }

                $img = Image::make($imageFile)->resize(100, 100)->save();

                Storage::disk('public')->put('category/' . $imageName, $img);
                Storage::disk('public')->delete($oldImage);
            } else {

                $category->update([
                    'name' => strtoupper($request->name),
                    'slug' => $slug,
                ]);
                DB::commit();
            }

            \Toastr::success('Mis à jour effectuée');
            return $this->index();
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        DB::beginTransaction();
        try {
            $categorie = $this->model->findOrfail($category);
            if ($categorie->posts()->count() != 0) {

                \Toastr::warning('Cette action ne peut être effectuée ');
                return $this->index();
            }
            $categorie->delete();

            DB::commit();
            \Toastr::success('Suppression effectuée');
            return $this->index();
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}