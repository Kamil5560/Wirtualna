<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGroupRequest;
use App\Models\Group;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view("admin.group.group", [
            'groups' => Group::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view("admin.group.creategroup");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreGroupRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreGroupRequest $request): RedirectResponse
    {
        $group = new Group($request->validated());
        $group->save();
        return redirect(route('AdminGroup'))->with('status', 'Group stored!');
    }

    /**
     * Display the specified resource.
     *
     * @param  Group  $group
     * @return View
     */
    public function show(Group $group): View
    {
        return view("admin.group.showgroup", [
            'group' => $group
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Group  $group
     * @return View
     */
    public function edit(Group $group): View
    {
        return view("admin.group.editgroup", [
            'group' => $group
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Group  $group
     * @return RedirectResponse
     */
    public function update(Request $request, Group $group): RedirectResponse
    {
        $group->fill($request->all());
        $group->save();
        return redirect(route('AdminGroup'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Group  $group
     * @return JsonResponse
     */
    public function destroy(Group $group): JsonResponse
    {
        try {
            $group->delete();
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
