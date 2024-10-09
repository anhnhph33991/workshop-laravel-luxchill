@extends('admin.layouts.master')
@section('title', 'Users')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Users</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">List User</li>
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
                                <a href="#"
                                    class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2 addCustomers-modal">
                                    <i class="mdi mdi-plus me-1"></i>
                                    New User
                                </a>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive min-vh-100">
                        <table class="table align-middle table-nowrap dt-responsive nowrap w-100">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($users as $user)
                                    <tr>
                                        <td class="dtr-control sorting_1" tabindex="0">
                                            <div class="d-none">{{ $user->id }}</div>
                                            <div class="form-check font-size-16"> <input class="form-check-input"
                                                    type="checkbox" id="customerlistcheck-1"> <label
                                                    class="form-check-label" for="customerlistcheck-1"></label> </div>
                                        </td>

                                        <td>
                                            {{ $user->name }}
                                        </td>

                                        <td>{{ $user->email }}</td>

                                        <td>{{ $user->phone->value }}</td>

                                        <td>

                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle card-drop"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                </a>

                                                <ul class="dropdown-menu dropdown-menu-end" style="">
                                                    {{-- <li>
                                                <a href="{{ route('admin.employees.edit', $employee) }}" class="dropdown-item edit-list">
                                            <i class="mdi mdi-pencil font-size-16 text-success me-1"></i>
                                            Edit
                                            </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('admin.employees.show', $employee) }}" class="dropdown-item edit-list">
                                                    <i class="fa-regular fa-eye font-size-16 text-warning me-1" style="color: #FFD43B;"></i>
                                                    Show
                                                </a>
                                            </li> --}}
                                                    {{-- <li>
                                                <form action="{{ route('admin.employees.destroy', $employee) }}" method="post" id="form-delete-employee-{{ $employee->id }}">
                                            @csrf
                                            @method('DELETE')

                                            <button type="button" onclick="handleDelete({{ $employee->id }})" class="dropdown-item remove-list">
                                                <i class="mdi mdi-trash-can font-size-1 text-danger me-1"></i>
                                                Delete
                                            </button>

                                            </form>
                                            </li> --}}
                                                </ul>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                        <div class="row">
                            {{ $users->links('admin.layouts.components.pagination') }}
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
