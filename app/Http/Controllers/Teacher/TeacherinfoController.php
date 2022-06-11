<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Student;
use App\Models\Subject;
use App\Models\SubjectClass;
use App\Models\Teacher;
use App\Models\TeacherSubject;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class TeacherinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $user = Auth::user();
        $teacherquery = Teacher::all();
        foreach ($teacherquery as $feteacher){
            if($feteacher->users_id == $user->id){
                $teacherid = $feteacher->id;
                $teachername = $feteacher->name;
                $teachersurname = $feteacher->surname;
            }
        }
        return view('teacher.info.user',[
            'teacherid' => $teacherid,
            'teachername' => $teachername,
            'teachersurname' => $teachersurname,
            'user' => $user,
            'ts' => TeacherSubject::all(),
            'subject' => Subject::all(),
            'sc' => SubjectClass::all(),
            'group' => Group::all(),
        ]);
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
        //
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
     * @param  User $user
     * @return View
     */
    public function edit(User $user): View
    {
        return view('teacher.info.editpass', [
            'user' => $user,
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
        $password = $request->input('password');
        $passwordhash = Hash::make($password);
        $user->fill([
            'password' => $passwordhash,
        ]);
        $user->save();
        return redirect(route('studentinfo.index'))->with('status', __('wu.status.student.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
