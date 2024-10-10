@extends('admin.layouts.master')
@section('title')
Show Student: {{ $student->name }}
@endsection

@section('content')

<div class="row mb-4">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Student: {{ $student->name }}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.students.index') }}">
                            Students
                        </a>
                    </li>

                    <li class="breadcrumb-item active">
                        Show Student: {{ $student->name }}
                    </li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card mx-n4 mt-n4 bg-info-subtle">
            <div class="card-body">
                <div class="text-center mb-4">
                    <h5 class="mt-3 mb-1">
                        Student: {{ $student->name }}
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <ul class="list-unstyled vstack gap-3 mb-0">
                    <li>
                        <div class="d-flex">
                            <i class="mdi mdi-email-outline font-size-18 text-primary"></i>
                            <div class="ms-3">
                                <h6 class="mb-1 fw-semibold">Email:</h6>
                                <span class="text-muted">
                                    {{ $student->email }}
                                </span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="d-flex">
                            <i class="ri-graduation-cap-line font-size-18 text-primary"></i>
                            <div class="ms-3">
                                <h6 class="mb-1 fw-semibold">Classroom:</h6>
                                <span class="text-muted">
                                    {{ $student->classroom->name }}
                                </span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="d-flex">
                            <i class="ri-account-circle-line font-size-18 text-primary"></i>
                            <div class="ms-3">
                                <h6 class="mb-1 fw-semibold">Teacher:</h6>
                                <span class="text-muted">
                                    {{ $student->classroom->teacher_name }}
                                </span>
                            </div>
                        </div>
                    </li>
                    <li class="hstack gap-2 mt-3">
                        <a href="candidate-overview.html#!" class="btn btn-soft-primary w-100">Hire Now</a>
                        <a href="candidate-overview.html#!" class="btn btn-soft-danger w-100">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--end col-->
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <h5 class="mb-3">Passports</h5>
                <p class="text-muted">
                    Passport Number:
                    <span class="badge bg-info p-2 fs-6">{{ $student->passport->passport_number }}</span>

                </p>
                <p class="text-muted mb-4">
                    Issued Date:
                    <span class="badge bg-info p-2 fs-6">{{ $student->passport->issued_date }}</span>
                </p>

                <p class="text-muted mb-4">
                    Expiry Date:
                    <span class="badge bg-info p-2 fs-6">{{ $student->passport->expiry_date }}</span>
                </p>

                <h5 class="mb-3">Subjects</h5>
                <ul class="verti-timeline list-unstyled">

                    @foreach ($student->subjects as $subject)
                    <li class="event-list">
                        <div class="event-timeline-dot">
                            <i class="bx bx-right-arrow-circle"></i>
                        </div>
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <div>
                                    <h6 class="font-size-14 mb-1">
                                        {{ $subject->name }}
                                    </h6>
                                    <p class="text-muted">
                                        Credit: {{ $subject->credits }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body border-bottom">
                        <h5 class="mb-3">Social Media</h5>
                        <div class="hstack gap-2">
                            <a href="candidate-overview.html#!" class="btn btn-soft-primary"><i class="bx bxl-facebook align-middle me-1"></i>
                                Facebook
                            </a>
                            <a href="candidate-overview.html#!" class="btn btn-soft-info"><i class="bx bxl-twitter align-middle me-1"></i>
                                Twitter</a>
                            <a href="candidate-overview.html#!" class="btn btn-soft-pink"><i class="bx bxl-instagram align-middle me-1"></i>
                                Instagram</a>
                            <a href="candidate-overview.html#!" class="btn btn-soft-success"><i class="bx bxl-whatsapp align-middle me-1"></i>
                                Whatsapp</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end col-->
</div>

@endsection
