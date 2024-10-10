<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Alert;
use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Classroom;
use App\Models\Passport;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    private const VIEW_PATH = 'admin.students.';
    public function index()
    {

        $students = Student::with(['passport', 'classroom', 'subjects'])
            ->latest('id')
            ->paginate(1);

        return view(self::VIEW_PATH . __FUNCTION__, compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classrooms = Classroom::query()->latest('id')->get();
        $subjects = Subject::query()->latest('id')->pluck('name', 'id');

        return view(self::VIEW_PATH . __FUNCTION__, compact('subjects', 'classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        try {
            DB::beginTransaction();

            $student = Student::create($request->student);

            $student->passport()->create($request->passport);

            $student->subjects()->attach($request->subjects);

            DB::commit();

            Toastr::success(null, 'Thêm sinh viên thành công');
            return redirect()->route('admin.students.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            Alert::error('Có lỗi xảy ra khi tạo sinh viên', 'LuxChill Thông Báo');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $student->load(['passport', 'classroom', 'subjects']);
        return view(self::VIEW_PATH . __FUNCTION__, compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $student->load(['passport', 'classroom', 'subjects']);
        $classrooms = Classroom::query()->latest('id')->get();
        $subjects = Subject::query()->latest('id')->pluck('name', 'id');

        return view(self::VIEW_PATH . __FUNCTION__, compact('student', 'classrooms', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        try {
            DB::beginTransaction();

            $student->update($request->student);

            $student->passport()->update($request->passport);

            $student->subjects()->sync($request->subjects);

            DB::commit();

            Toastr::success(null, 'Sửa sinh viên thành công');
            return back();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            Alert::error('Có lỗi xảy ra khi sửa sinh viên', 'LuxChill Thông Báo');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        try {
            DB::transaction(function () use ($student) {
                $student->passport()->delete();
                $student->subjects()->sync([]);
                $student->delete();
            });

            Alert::success('Bạn đã xóa thành công', 'LuxChill Thông Báo');
            return redirect()->route('admin.students.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Alert::error('Có lỗi xảy ra khi sửa sinh viên', 'LuxChill Thông Báo');
            return redirect()->route('admin.students.index');
        }
    }
}
