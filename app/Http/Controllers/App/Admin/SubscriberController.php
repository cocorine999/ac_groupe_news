<?php

namespace App\Http\Controllers\App\Admin;

use App\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class SubscriberController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Subscriber();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('enfold.backend.admin.subscribers.index')->with('abonnements', Subscriber::latest()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('enfold.backend.admin.subscribers.create');
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
                'email' => 'required|unique:subscribers,email,id'
            ]);

            $this->model->create([
                'email' => $request->email,
            ]);
            DB::commit();
            \Toastr::success('Souscription effectuée');
            return redirect()->back();
        } catch (Exception $e) {
            \Toastr::success($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $subscriber
     * @return \Illuminate\Http\Response
     */
    public function show($subscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $subscriber
     * @return \Illuminate\Http\Response
     */
    public function edit($subscriber)
    {
        return view('enfold.backend.admin.subscribers.edit')->with('subscriber', Subscriber::findOrfail($subscriber));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $subscriber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $subscriber)
    {

        DB::beginTransaction();
        try {
            $this->validate($request, [

                'email' => [
                    'required',
                    'string',
                    'max:100',
                    Rule::unique('subscribers', 'email')->ignore($subscriber, 'id'),

                ]
            ]);

            $this->model->findOrfail($subscriber)->update([
                'email' => $request->email,
            ]);

            DB::commit();
            \Toastr::success('Mis à jour effectuée');

            return redirect()->route('enfold.backend.admin.subscribers.index');
        } catch (Exception $e) {
            \Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $subscriber
     * @return \Illuminate\Http\Response
(     */
    public function destroy($subscriber)
    {
        DB::beginTransaction();
        try {
            $this->model->findOrfail($subscriber)->delete();
            DB::commit();
            \Toastr::success('Suppression effectuée');
            return $this->index();
        } catch (Exception $e) {
            \Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }
}