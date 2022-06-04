<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Subject;
use App\Models\SubjectClass;
use Exception;
use Illuminate\Console\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\Factory;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;

class SubjectclassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        return view("admin.subject_class.subject_class", [
            'groups' => Group::all(),
            'subjects' => Subject::all(),
            'subject_class' => SubjectClass::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view("admin.subject_class.create_subject_class", [
            'groups' => Group::all(),
            'subjects' => Subject::all(),
            'subject_class' => SubjectClass::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request  $request): RedirectResponse
    {
        $this->validate($request, [
            'groups_id' => 'required',
            'subject_id' => 'required',
        ]);
        $sc = new SubjectClass();
        $sc->groups_id = $request->input('groups_id');
        $sc->subject_id = $request->input('subject_id');
        $sc->save();
        return redirect(route('subjectclass.index'))->with('status', __('wu.status.teacher.create'));
    }

    /**
     * Display the specified resource.
     *
     * @return View
     */
    public function show(): View
    {
        return view("admin.subject_class.show_subject_class", [
            'groups' => Group::all(),
            'subjects' => Subject::all()->sortBy('name'),
            'subject_class' => SubjectClass::all()->sortBy('groups_id'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Group $group
     * @return View
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Group $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  SubjectClass $sc
     * @return JsonResponse
     */
    public function destroy(SubjectClass $sc): JsonResponse
    {
        try {
            $sc->delete();
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
