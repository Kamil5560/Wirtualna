<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeacherRequest;
use App\Models\Group;
use App\Models\Teacher;
use App\Models\User;
use Exception;
use Illuminate\Auth\GuardHelpers;
use Illuminate\Console\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\Factory;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;
use function GuzzleHttp\Promise\all;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        return view('admin.teacher.teacher', [
            'teachers' => Teacher::paginate(10),
            'users' => User::all(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view("admin.teacher.createteacher", [
            'users' => User::all(),
            'teacher' => Teacher::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request   $request
     * @return RedirectResponse
     */
    public function store(Request  $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => 'required',
        ]);
        $user = new User();
        $teacher = new Teacher();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = $request->input('role');
        $user->save();
        $data_user = User::all();
        $email = $request->input('email');
        foreach ($data_user as $users){
            if($users->email == $email) {
                $user_id = $users->id;
                break;
            }
        }
        $teacher->name = $request->input('name');
        $teacher->surname = $request->input('surname');
        $teacher->users_id = $user_id;
        $teacher->save();
        return redirect(route('teacher.index'))->with('status', __('wu.status.teacher.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Teacher $teacher
     * @param  User $user
     * @return View
     */
    public function edit(Teacher $teacher, User $user): View
    {
        return view("admin.teacher.editteacher", [
            'teacher' => $teacher,
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Teacher $teacher
     * @return RedirectResponse
     */
    public function update(Request $request, Teacher $teacher): RedirectResponse
    {
        $teacher->fill([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'users_id' => $request->input('users_id'),
        ]);
        $teacher->save();
        return redirect(route('teacher.index'))->with('status', __('wu.status.teacher.update'));
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
