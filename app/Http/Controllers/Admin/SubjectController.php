<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGroupRequest;
use App\Models\Group;
use App\Models\Subject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view("admin.subject.subject", [
            'subject' => Subject::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view("admin.subject.createsubject");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $subject = new Subject();
        $subject->name = $request->input('name');
        $subject->save();
        return redirect(route('subject.index'))->with('status', __('wu.status.subject.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Subject $subject
     * @return View
     */
    public function show(Subject $subject): View
    {
        return view("admin.subject.showsubject", [
            'subject' => $subject
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Subject $subject
     * @return View
     */
    public function edit(Subject $subject): View
    {
        return view("admin.subject.editsubject", [
            'subject' => $subject
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Subject $subject
     * @return RedirectResponse
     */
    public function update(Request $request, Subject $subject): RedirectResponse
    {
        $subject->fill($request->all());
        $subject->save();
        return redirect(route('subject.index'))->with('status', __('wu.status.subject.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Subject $subject
     * @return JsonResponse
     */
    public function destroy(Subject $subject): JsonResponse
    {
        try {
            $subject->delete();
            Session::flash('status', __('wu.status.groups.delete'));
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
