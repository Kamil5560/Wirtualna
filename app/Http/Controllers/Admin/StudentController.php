<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Console\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\Factory;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        return view('admin.student.student', [
            'student' => Student::paginate(10),
            'user' => User::all(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.student.createstudent', [
            'student' => Student::all(),
            'user' => User::all(),

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
            'surname' => 'required',
            'PESEL' => 'required', 'min:11', 'max:11', 'numeric',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => 'required',
        ]);
        $user = new User();
        $student = new Student();
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
        $student->name = $request->input('name');
        $student->surname = $request->input('surname');
        $student->PESEL = $request->input('PESEL');
        $student->users_id = $user_id;
        $student->save();
        return redirect(route('student.index'))->with('status', __('wu.status.student.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Student $student
     * @return View
     */
    public function show(Student $student): View
    {
        return view("admin.student.showstudent", [
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Student $student
     * @return View
     */
    public function edit(Student $student): View
    {
        return view("admin.student.editstudent", [
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Student $student
     * @return RedirectResponse
     */
    public function update(Request $request, Student $student): RedirectResponse
    {
        $student->fill([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'PESEL' => $request->input('PESEL'),
            'users_id' => $request->input('users_id'),
        ]);
        $student->save();
        return redirect(route('student.index'))->with('status', __('wu.status.student.update'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Student $student
     * @return JsonResponse
     */
    public function destroy(Student $student): JsonResponse
    {
        try {
            $student->delete();
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