<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TeacherSubject;
use App\Models\User;
use Exception;
use Illuminate\Console\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\View\Factory;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;

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
            'ts' =>TeacherSubject::all(),
            'subject' => Subject::all(),
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
        return redirect(route('teacher.index'))->with('status', __('wu.teacher.status.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Teacher $teacher
     * @return View
     */
    public function show(Teacher $teacher): View
    {
        return view("admin.teacher.showteacher", [
            'teacher' => $teacher
        ]);
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
        return redirect(route('teacher.index'))->with('status', __('wu.teacher.status.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Teacher $teacher
     * @return JsonResponse
     */
    public function destroy(Teacher $teacher): JsonResponse
    {
        try {
//            $id_teacher = Teacher::all();
//            $id_user = $id_teacher->users_id->where('id', $teacher);
//            $user_delete = User::all();
//            foreach ($user_delete as $user_deletes){
//                if($user_deletes->id == $id_user)
//                {
//                    $user_delete->delete();
//                }
//            }
            $teacher->delete();
            Session::flash('status', __('wu.teacher.status.delete'));
            return response()->json([
                'status' => 'success'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Wystąpił błąd!'
            ])->setStatusCode(500);
        }
        //TODO: Usuwanie konta
    }
}
