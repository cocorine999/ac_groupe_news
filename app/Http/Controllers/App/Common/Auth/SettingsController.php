<?php

namespace App\Http\Controllers\App\Common\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Exception;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Throwable;

class SettingsController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new User();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('enfold.backend.settings.index')/* ->with('subscribers', Subscriber::latest()->get()) */;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $subscriber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {

        DB::beginTransaction();
        try {

            $rules = [
                'name' => 'required|max:255',
                'username' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('users', 'username')->ignore($user, 'id'),
                ],
                'phone' => [
                    'required',
                    'string',
                    'max:11',
                    Rule::unique('users', 'phone')->ignore($user, 'id'),
                ],
                'about' => 'string'
            ];

            if ($request->input('email')) {
                $mail_rules = [
                    'email' => [
                        'required',
                        'string',
                        'max:100',
                        Rule::unique('users', 'email')->ignore($user, 'id'),
                    ]
                ];

                $rules = array_merge($rules, $mail_rules);
            }

            $imageFile = $request->file('image');

            if (isset($imageFile)) {
                $image_rules = [
                    'image' => 'image|mimes:png,jpg,jpeg'
                ];
                $rules = array_merge($rules, $image_rules);
            }

            $this->validate($request, $rules);

            $user = $this->model->findOrfail($user);
            $oldImage = $user->image;

            if ($request->input('email')) {
                $email = $request->email;
            } else {
                $email = "";
            }

            if (isset($imageFile)) {

                $slug = strtolower(str_replace(" ", "-", $request->username));

                $currentDate = Carbon::now()->toDateString();
                $imageName   = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $imageFile->getClientOriginalExtension();

                $image = 'storage/avatar/' . $imageName;
            } else {
                $image = $user->image;
            }

            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'phone' => $request->phone,
                'about' => $request->about,
                'email' => $email,
                'image' => $image,
            ]);

            DB::commit();

            if (isset($imageFile)) {

                if (!Storage::disk('public')->exists('avatar')) {
                    Storage::disk('public')->makeDirectory('avatar');
                }

                $img = Image::make($imageFile)->resize(100, 100)->save();

                Storage::disk('public')->put('avatar/' . $imageName, $img);

                Storage::disk('public')->delete($oldImage);
            }
            \Toastr::success('Mis à jour effectuée');

            return redirect()->back();
        } catch (Exception $e) {
            \Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }

    public function updatePassword(Request $request)
    {

        
        DB::beginTransaction();
        try {

            if ($request->new_password != $request->new_password_confirmation) {
                \Toastr::error("Mot de passe de confirmation incorrecte");
                return redirect()->back();
            }

            $user = Auth::user();
            if (Hash::check($request->old_password, $user->password)) {

                $user->update([
                    'password' => Hash::make($request->new_password),
                ]);
            } else {
                \Toastr::error("Mot de passe actuel incorrecte");
                return redirect()->back();
            }

            DB::commit();
            \Toastr::success('Le mot de passe à bien été mis à jour');

            return redirect()->back();
        } catch (Throwable $e) {
            \Toastr::error($e->getMessage());
            return redirect()->back();
        }
    }
}