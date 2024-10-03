@extends('admin.layouts.master')
@section('title')
    Edit Employee: {{ $employee->first_name }} {{ $employee->last_name }}
@endsection

@section('content')
    <div class="row mb-4">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Employees</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.employees.index') }}">
                                Employees
                            </a>
                        </li>

                        <li class="breadcrumb-item active">
                            Edit Employee:
                            {{ $employee->last_name }} {{ $employee->first_name }}
                        </li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <form action="{{ route('admin.employees.update', $employee) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Profile Picture</label>


                            <div class="text-center">
                                <div class="position-relative d-inline-block">
                                    <div class="position-absolute bottom-0 end-0">
                                        <label for="project-image-input" class="mb-0" data-bs-toggle="tooltip"
                                            data-bs-placement="right" title="Select Image">
                                            <div class="avatar-xs">
                                                <div
                                                    class="avatar-title bg-light border rounded-circle text-muted cursor-pointer shadow font-size-16">
                                                    <i class='bx bxs-image-alt'></i>
                                                </div>
                                            </div>
                                        </label>
                                        <input class="form-control d-none" value="" id="project-image-input"
                                            type="file" accept="image/png, image/gif, image/jpeg" name="profile_picture"
                                            onchange="previewImage(event)">
                                    </div>
                                    <div class="avatar-lg">
                                        <div class="avatar-title bg-light">
                                            {{-- <img src id="projectlogo-img" class="avatar-lg h-auto" style="height: 100%" /> --}}

                                            @if (!empty($employee->profile_picture))
                                                <img src='data:image/jpeg;base64,{{ base64_encode($employee->profile_picture) }}'
                                                    id="projectlogo-img" class="avatar-lg h-auto" />
                                            @else
                                                <img src id="projectlogo-img" />
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" name="first_name"
                                        class="form-control @error('first_name')
                                    is-invalid
                                    @enderror"
                                        placeholder="Nhập tên" value="{{ $employee->first_name }}" tabindex="1">

                                    @error('first_name')
                                        <div class="invalid-feedback text-validate">
                                            *{{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email')
                                    is-invalid
                                    @enderror"
                                        placeholder="Nhập email" value="{{ $employee->email }}" tabindex="3">
                                    @error('email')
                                        <div class="invalid-feedback text-validate">
                                            *{{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Date Of Birth</label>
                                    <input
                                        class="form-control @error('date_of_birth')
                                        is-invalid
                                    @enderror"
                                        type="date" name="date_of_birth" id="example-date-input"
                                        value="{{ $employee->date_of_birth }}" tabindex="5" />
                                    @error('date_of_birth')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Salary</label>
                                    <input type="tel" name="salary"
                                        class="form-control @error('salary')
                                        is-invalid
                                    @enderror"
                                        placeholder="Nhập lương" value="{{ $employee->salary }}" tabindex="7">
                                    @error('salary')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="last_name"
                                        class="form-control @error('last_name')
                                    is-invalid
                                    @enderror"
                                        placeholder="Nhập họ" value="{{ $employee->last_name }}" tabindex="2">
                                    @error('last_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="tel" name="phone"
                                        class="form-control @error('phone')
                                    is-invalid
                                    @enderror"
                                        placeholder="Nhập số điện thoại" value="{{ $employee->phone }}" tabindex="4">
                                    @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Hire Date</label>

                                    <input
                                        class="form-control @error('hire_date')
                                    is-invalid
                                    @enderror"
                                        name="hire_date" type="datetime-local" id="example-datetime-local-input"
                                        value="{{ $employee->hire_date }}" tabindex="6" />
                                    @error('hire_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" name="address"
                                        class="form-control @error('address')
                                        is-invalid
                                    @enderror"
                                        placeholder="Nhập địa chỉ" value="{{ $employee->address }}" tabindex="8">

                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Publish</h5>

                        <div class="mb-3">
                            <div class="form-check form-switch mb-3">
                                <label class="form-check-label">is_active</label>
                                <input class="form-check-input" type="checkbox"
                                    {{ $employee->is_active ? 'checked' : '' }} name="is_active">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Department</label>

                            <select name="department_id" id="" class="form-select">
                                <option value="1">IT</option>
                                <option value="2">Nhân Sự</option>
                                <option value="3">Kinh Doanh</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Manager</label>

                            <select name="manager_id" id="" class="form-select">
                                <option value="1">IT</option>
                                <option value="2">Nhân Sự</option>
                                <option value="3">Kinh Doanh</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="text-center mb-4">
                    <button class="btn btn-primary" type="submit" id="btn-submit-employee">
                        Submit
                    </button>
                </div>
            </div>
        </div>

    </form>
@endsection

@section('script')
    <script src="{{ asset('assets/js/admin/employee/edit.js') }}"></script>
@endsection
