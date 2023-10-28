<?php

namespace App\Http\Controllers\App\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;
use Exception;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{ 
    private $model;

    public function __construct()
    {
        $this->model = new Message();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('enfold.backend.messages')->with('messages', Message::latest()->get());
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
                'name' => 'required|string|max:50',
                'email' => 'required|email',
                'message' => 'required|string|max:255',
            ]);

            $this->model->create([
                'name' => strtoupper($request->name),
                'message' => $request->message,
                'email' => $request->email,
            ]);

            DB::commit();
            \Toastr::success('Message envoyé');
            return redirect()->back();
        } catch (Exception $e) {
            \Toastr::success($e->getMessage());
            return response()->json($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $message
     * @return \Illuminate\Http\Response
     */
    public function destroy($message)
    {
        DB::beginTransaction();
        try {
            $msg = $this->model->findOrfail($message);

            $msg->delete();
            DB::commit();
            \Toastr::success('Suppression effectuée');

            return redirect()->back();
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
