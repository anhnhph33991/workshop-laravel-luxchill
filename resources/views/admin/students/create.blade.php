@extends('admin.layouts.master')
@section('title', 'Create Student')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Create Student</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.students.index') }}">List Student</a>
                    </li>
                    <li class="breadcrumb-item active">Create Student</li>
                </ol>
            </div>
        </div>
    </div>


    <form action="{{ route('admin.students.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">-Student</div>

                        <div class="mb-3">
                            <label class="form-label">Student Name</label>
                            <input type="text" class="form-control @error('student.name') is-invalid @enderror" name="student[name]" placeholder="Enter Student Name" value="{{ old('student.name') }}">

                            @error('student.name')
                            <div class="text-danger fst-italic">*{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Student Email</label>
                            <input type="email" class="form-control @error('student.email') is-invalid @enderror" name="student[email]" placeholder="Enter Student Email" value="{{ old('student.email') }}">

                            @error('student.email')
                            <div class="text-danger fst-italic">*{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Classrom</label>
                            <select id="select-classrom" class="select2 form-control select2-multiple" data-placeholder="Select Classroom..." name="student[classroom_id]">
                                @foreach ($classrooms as $classroom)
                                <option value="">Select Classroom</option>
                                <option value="{{ $classroom->id }}" {{ old('student.classroom_id') == $classroom->id ? 'selected' : '' }}>
                                    {{ $classroom->name }}
                                </option>
                                @endforeach
                            </select>

                            @error('student.classroom_id')
                            <div class="text-danger fst-italic">*{{ $message }}</div>
                            @enderror

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">-Passport</div>

                        <div class="mb-3">
                            <label class="form-label">Passport Number</label>
                            <input type="number" class="form-control @error('passport.passport_number') is-invalid @enderror" name="passport[passport_number]" placeholder="Enter Passport Number" value="{{ old('passport.passport_number') }}">

                            @error('passport.passport_number')
                            <div class="text-danger fst-italic">*{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Issued Date</label>
                                    <input class="form-control" type="date" name="passport[issued_date]" id="example-date-input" value="{{ old('passport.issued_date') }}" />

                                    @error('passport.issued_date')
                                    <div class="text-danger fst-italic">*{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Expiry Date</label>
                                    <input class="form-control" type="date" name="passport[expiry_date]" id="example-date-input" value="{{ old('passport.expiry_date') }}" />

                                    @error('passport.expiry_date')
                                    <div class="text-danger fst-italic">*{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-title">-Subjects</div>

                        <div class="mb-3">
                            <label class="form-label">Select Subjects</label>
                            <select id="select-subject-multiple" class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ..." name="subjects[]">
                                @foreach ($subjects as $key => $subject)
                                <option value="{{ $key }}">{{ $subject }}</option>
                                @endforeach
                            </select>

                            @error('subjects')
                            <div class="text-danger fst-italic">*{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="text-center mb-4">
            <button class="btn btn-primary" type="submit" id="btn-submit-employee">
                Submit
            </button>
        </div>

    </form>

</div>


@endsection

@section('script')
<script src="{{ asset('assets/js/admin/students/create.js') }}"></script>
@endsection
