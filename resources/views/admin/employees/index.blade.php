@extends('admin.layouts.master')
@section('title', 'Employees')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Employees</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Employees</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box me-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <input type="text" class="form-control" id="searchTableList" placeholder="Search...">
                                    <i class="bx bx-search-alt search-icon"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <a href="{{ route('admin.employees.create') }}"
                                    class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2 addCustomers-modal">
                                    <i class="mdi mdi-plus me-1"></i>
                                    New Employee
                                </a>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive min-vh-100">
                        <table class="table align-middle table-nowrap dt-responsive nowrap w-100">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Avatar</th>
                                    <th>First_Name</th>
                                    <th>Last_Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Hire_Date</th>
                                    <th>Salary</th>
                                    <th>Is_Active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($employees as $employee)
                                    <tr>
                                        <td class="dtr-control sorting_1" tabindex="0">
                                            <div class="d-none">{{ $employee->id }}</div>
                                            <div class="form-check font-size-16"> <input class="form-check-input"
                                                    type="checkbox" id="customerlistcheck-1"> <label
                                                    class="form-check-label" for="customerlistcheck-1"></label> </div>
                                        </td>


                                        @php
                                            $avatar =
                                                'data:image/jpeg;base64,' . base64_encode($employee->profile_picture);
                                        @endphp

                                        <td>
                                            <img src="{{ $avatar }}" alt="" width="50px" height="50px">
                                        </td>
                                        <td>
                                            {{ $employee->first_name }}
                                        </td>
                                        <td>
                                            {{ $employee->last_name }}
                                        </td>
                                        <td>
                                            {{ $employee->email }}
                                        </td>
                                        <td>
                                            {{ $employee->phone }}
                                        </td>

                                        <td>
                                            {{ $employee->hire_date }}
                                        </td>
                                        <td>
                                            {{ $employee->salary }}
                                        </td>
                                        <td>
                                            <span class="badge font-size-12 p-2 {{ $employee->is_active ? 'text-bg-success' : 'text-bg-danger' }}">
                                                {{ $employee->is_active ? 'Active' : 'No Active' }}
                                            </span>
                                        </td>
                                        <td>

                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle card-drop"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                </a>

                                                <ul class="dropdown-menu dropdown-menu-end" style="">
                                                    <li>
                                                        <a href="{{ route('admin.employees.edit', $employee) }}"
                                                            class="dropdown-item edit-list">
                                                            <i class="mdi mdi-pencil font-size-16 text-success me-1"></i>
                                                            Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('admin.employees.show', $employee) }}"
                                                            class="dropdown-item edit-list">
                                                            <i class="fa-regular fa-eye font-size-16 text-warning me-1"
                                                                style="color: #FFD43B;"></i>
                                                            Show
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('admin.employees.destroy', $employee) }}"
                                                            method="post" id="form-delete-employee-{{ $employee->id }}">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="button"
                                                                onclick="handleDelete({{ $employee->id }})"
                                                                class="dropdown-item remove-list">
                                                                <i
                                                                    class="mdi mdi-trash-can font-size-1 text-danger me-1"></i>
                                                                Delete
                                                            </button>

                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                        <div class="row">
                            {{ $employees->links('admin.layouts.components.pagination') }}
                        </div>


                    </div>
                    <!-- end table responsive -->
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>

@endsection

@section('script')
    <script src="{{ asset('assets/js/admin/employee/index.js') }}"></script>
@endsection
