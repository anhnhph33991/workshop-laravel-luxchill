<?php

namespace App\Http\Controllers;

use App\Helpers\Alert;
use App\Helpers\Toastr;
use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    private const VIEW_PATH = 'admin.employees.';
    public function index()
    {
        $employees = Employee::query()->latest('id')->paginate(2);
        return view(self::VIEW_PATH . __FUNCTION__, compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::VIEW_PATH . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        try {
            $data = $request->all();
            $data['is_active'] = $request->boolean('is_active', false);

            if ($request->hasFile('profile_picture')) {
                $data['profile_picture'] = $request->file('profile_picture')->getContent();
            }

            Employee::create($data);
            Toastr::success(null, 'Thêm mới thành công');
            return redirect()->route('admin.employees.index');
        } catch (\Throwable $th) {
            Log::error('LuxChill Error' . $th->getMessage());
            Toastr::error(null, 'Thêm mới không thành công');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view(self::VIEW_PATH . __FUNCTION__, compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view(self::VIEW_PATH . __FUNCTION__, compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        try {
            $data = $request->all();
            $data['is_active'] = $request->boolean('is_active', false);

            if ($request->hasFile('profile_picture')) {
                $data['profile_picture'] = $request->file('profile_picture')->getContent();
            }

            $employee->update($data);

            Toastr::success(null, 'Chỉnh Sửa thành công');
            return back();
        } catch (\Throwable $th) {
            Log::error('LuxChill Error' . $th->getMessage());
            Toastr::error(null, 'Chỉnh sửa không thành công');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        Alert::success('Bạn đã xóa vĩnh viễn', 'LuxChill Thông Báo');
        return back();
    }
}
