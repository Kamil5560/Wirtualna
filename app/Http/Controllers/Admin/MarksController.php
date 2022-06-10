<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Student;
use App\Models\StudentMarks;
use App\Models\Subject;
use App\Models\SubjectClass;
use Illuminate\Console\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\Factory;
use Illuminate\View\View;

class MarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        return view('admin.marks.group', [
            'groups' => Group::all(),
            'student' => Student::all(),
            'marks' => StudentMarks::all(),
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
     * @param  Group $group
     * @return View
     */
    public function showsubject(Group $group): View
    {
        return view("admin.marks.subject", [
            'groups' => $group,
            'student' => Student::all(),
            'subject' => Subject::all(),
            'sc' => SubjectClass::all(),
            'sm' => StudentMarks::all(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  $group
     * @param  $subjects
     * @return View
     */
    public function showmarks($group, $subjects): View
    {
        $sm_id = 0;
        return view("admin.marks.marks", [
            'group_id' => $group,
            'groups' => Group::all(),
            'student' => Student::all(),
            'subject_id' => $subjects,
            'sm' => StudentMarks::all(),
            'sm_id' => $sm_id,
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
        return view("admin.marks.editmarks", [
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
                return redirect(route('marks.index'))->with('status', __('Pierwsze'));
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
                return redirect(route('marks.index'))->with('status', __('Drugie'));
            }
        }else{
            $marks = $request->input('marks');
            if($marks == 'U'){
                $Studentmarks = StudentMarks::find($id_sm);
                $Studentmarks->delete();
                return redirect(route('marks.index'))->with('status', __('Trzecie'));
            }
            else{
                $Studentmarks = StudentMarks::find($id_sm);
                $Studentmarks->fill([
                    'id_student' => $request->input('id_student'),
                    'id_subject' => $request->input('id_subject'),
                    'marks' => $request->input('marks'),
                ]);
                $Studentmarks->save();
                return redirect(route('marks.index'))->with('status', __('Czwarte'));
            }
        }
    }

    //TODO: zmienić statusy

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
