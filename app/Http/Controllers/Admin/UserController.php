<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Console\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\View\Factory;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        return view("admin.user.admin", [
            'user' => User::All(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view("admin.user.createadmin", [
            'users' => User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => 'required',
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = $request->input('role');
        $user->save();
        return redirect(route('user.index'))->with('status', __('wu.status.user.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return View
     */
    public function show(User $user): View
    {
        return view("admin.user.showuser", [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return View
     */
    public function edit(User $user): View
    {
        return view("admin.user.edituser", [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $user->fill([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);
        $role = $request->input('role');
        $password = $request->input('password');
        if($password != null){
            $passwordhash = Hash::make($password);
            $user->fill([ 'password' => $passwordhash ]);
        }
        else{
            $user->fill(['password' => $request->input('passwordhash'),]);
        }
        $user->save();

        if($role == 'teacher'){
            $status = redirect(route('teacher.index'))->with('status', __('wu.status.user.update'));
        }elseif($role == 'student'){
            $status = redirect(route('home'))->with('status', __('wu.status.user.update'));
        }else{
            $status = redirect(route('home'))->with('status', __('wu.status.user.update'));
        }
        return $status;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        try {
            $user->delete();
            return response()->json([
                'status' => 'success'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Wystąpił błąd!'
            ])->setStatusCode(500);
        }
    }
}
