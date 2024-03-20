<?php

namespace App\Http\Controllers;

use App\Http\Filters\EmployeeFilter;
use App\Http\Requests\employee\FilterRequest;
use App\Http\Requests\employee\StoreRequest;
use App\Http\Requests\employee\UpdateRequest;
use App\Models\Access;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(EmployeeFilter::class, ['queryParams' =>array_filter($data)]);

        $employess = Employee::filter($filter)->paginate(10);

        return view('employess.index', compact('employess'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employess.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Employee::firstOrCreate($data);
        User::where('id', $data['user_id'])->update(['access_id'=> 2]);

        return redirect()->route('employess.index');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($employees)
    {
        $employee = Employee::find($employees);
        $user = $employee->user;
        $access = $user->access;
        $accesses = Access::all();
        return view('employess.edit', compact('employee', 'user', 'access', 'accesses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        User::where('id', $id)->update([
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'access_id' => $request->input('access_id'),
            ]);
        $data = Arr::except($request->input(), ['phone', 'email', 'access_id']);
        Employee::find($id)->update($data);
        return redirect()->route('employess.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Employee::find($id)->delete();
        return redirect()->route('employess.index');
    }
}
