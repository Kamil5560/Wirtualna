<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\SubjectClass;
use App\Models\Teacher;
use App\Models\TeacherSubject;
use Exception;
use Illuminate\Console\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\Factory;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;

class TeachersubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        return view('admin.teacher_subject.teacher_subject', [
            'teacher' => Teacher::all(),
            'subject' => Subject::all(),
            'teacher_subject' => TeacherSubject::all(),
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.teacher_subject.create_teacher_subject', [
            'teacher' => Teacher::all(),
            'subject' => Subject::all(),
            'teacher_subject' => TeacherSubject::all(),
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
            'teacher_id' => 'required',
            'subjects_id' => 'required',
        ]);
        $ts = new TeacherSubject();
        $ts->teacher_id = $request->input('teacher_id');
        $ts->subject_id = $request->input('subjects_id');
        $ts->save();
        return redirect(route('teachersubject.index'))->with('status', __('wu.teachersubject.status.create'));

    }

    /**
     * Display the specified resource.
     *
     * @return View
     */
    public function show(): View
    {
        return view('admin.teacher_subject.show_teacher_subject', [
            'teacher' => Teacher::all(),
            'subject' => Subject::all()->sortBy('name'),
            'teacher_subject' => TeacherSubject::all()->sortBy('teacher_id'),
        ]);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  TeacherSubject $ts
     * @return JsonResponse
     */
    public function destroy(TeacherSubject $ts): JsonResponse
    {
        try {
            $ts->delete();
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
