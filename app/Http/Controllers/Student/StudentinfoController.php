<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class StudentinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $user = Auth::user();
        $studentquery = Student::all();
        foreach ($studentquery as $festudent){
            if($festudent->users_id == $user->id){
                $studentname = $festudent->name;
                $studentsurname = $festudent->surname;
                $studentpesel = $festudent->PESEL;
                $studentgroupid = $festudent->groups_id;
            }
        }
        $groupquery = Group::all();
        foreach ($groupquery as $fegroup){
            if($fegroup->id == $studentgroupid){
                $groupname = $fegroup->name;
            }
        }
        return view('student.info.user',[
            'studentname' => $studentname,
            'studentsurname' => $studentsurname,
            'studentpesel' => $studentpesel,
            'groupname' => $groupname,
            'user' => $user,
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
        return view('student.info.editpass', [
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
