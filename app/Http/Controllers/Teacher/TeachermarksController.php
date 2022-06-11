<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Student;
use App\Models\StudentMarks;
use App\Models\Subject;
use App\Models\SubjectClass;
use App\Models\Teacher;
use App\Models\TeacherSubject;
use Illuminate\Console\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Factory;
use Illuminate\View\View;

class TeachermarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $user = Auth::user();
        $teacher = Teacher::all();
        foreach ($teacher as $teachers){
            if($teachers->users_id == $user->id){
                $teacher_id = $teachers->id;
            }
        }
        return view('teacher.marks.subject', [
            'ts' => TeacherSubject::all(),
            'subject' => Subject::all(),
            'teacher_id' => $teacher_id,
        ]);
        //TODO: Najpierw sprawdzić jakie przedmioty ma wykładowca i wypisać, potem grupy przypisane do przedmiotu a potem studenci w grupie
    }

    /**
     * Display the specified resource.
     *
     * @param  $subjects
     * @return View
     */
    public function showgroup($subjects): View
    {
        return view("teacher.marks.group", [
            'subject_id' => $subjects,
            'sc' => SubjectClass::all(),
            'group' => Group::all(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  $subjects
     * @param  $groups
     * @return View
     */
    public function showstudent($subjects, $groups): View
    {
        return view("teacher.marks.marks", [
            'subject_id' => $subjects,
            'group_id' => $groups,
            'student' => Student::all(),
            'sm' => StudentMarks::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param   $groups
     * @param   $subjects
     * @param   $student
     * @param   $sm_id
     * @return View
     */
    public function editmarks($groups, $subjects, $student, $sm_id): View
    {
//        $studentquery = Student::where('id', $student)->get();
//        $subjectquery = Subject::where('id', $subjects)->get();
//        $groupquery = Group::where('id', $groups)->get();
//        $studentname = Student::select('name')->where('id', $student)->first();
        $groupquery = Group::all();
        foreach ($groupquery as $fegroup){
            if($fegroup->id == $groups){
                $groupname = $fegroup->name;
            }
        }
        $studentquery = Student::all();
        foreach ($studentquery as $festudent){
            if($festudent->id == $student){
                $studentname = $festudent->name;
                $studentsurname = $festudent->surname;
            }
        }
        $subjectquery = Subject::all();
        foreach ($subjectquery as $fes){
            if($fes->id == $subjects){
                $subjectname = $fes->name;
            }
        }
        $smquery = StudentMarks::all();
        $marks = 0;
        foreach ($smquery as $fesm){
            if($fesm->id == $sm_id){
                $marks = $fesm->marks;
                break;
            }
        }
        return view("teacher.marks.editmarks", [
            'id_sm' => $sm_id,
            'id_group' => $groups,
            'id_subject' => $subjects,
            'id_student' => $student,
            'groupsname' => $groupname,
            'studentname' => $studentname,
            'studentsurname' => $studentsurname,
            'subjectname' => $subjectname,
            'marks' => $marks,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param   $groups
     * @param   $subjects
     * @param   $student
     * @param   $id_sm
     * @return RedirectResponse
     */
    public function update(Request $request,$groups, $subjects, $student, $id_sm): RedirectResponse
    {
        if($id_sm == 0){
            $marks = $request->input('marks');
            if($marks == 0){
                return redirect(route('teachermarks.index'))->with('status', __('Pierwsze'));
            }
            else{
                $Studentmarks = new StudentMarks();
                $this->validate($request, [
                    'id_student' => 'required',
                    'id_subject' => 'required',
                    'marks' => 'required',
                ]);
                $Studentmarks->student_id = $request->input('id_student');
                $Studentmarks->subject_id = $request->input('id_subject');
                $Studentmarks->marks = $request->input('marks');
                $Studentmarks->save();
                return redirect(route('teachermarks.index'))->with('status', __('Drugie'));
            }
        }else{
            $marks = $request->input('marks');
            if($marks == 'U'){
                $Studentmarks = StudentMarks::find($id_sm);
                $Studentmarks->delete();
                return redirect(route('teachermarks.index'))->with('status', __('Trzecie'));
            }
            else{
                $Studentmarks = StudentMarks::find($id_sm);
                $Studentmarks->fill([
                    'id_student' => $request->input('id_student'),
                    'id_subject' => $request->input('id_subject'),
                    'marks' => $request->input('marks'),
                ]);
                $Studentmarks->save();
                return redirect(route('teachermarks.index'))->with('status', __('Czwarte'));
            }
        }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
