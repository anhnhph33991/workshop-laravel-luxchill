@extends('admin.layouts.master')
@section('title')
    Show Employee: {{ $employee->first_name }}
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
                            Show Employee:
                            {{ $employee->last_name }} {{ $employee->first_name }}
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
                        <img src="data:image/jpeg;base64,{{ base64_encode($employee->profile_picture) }}" alt=""
                            class="avatar-md rounded-circle mx-auto d-block" />
                        <h5 class="mt-3 mb-1">{{ $employee->last_name }} {{ $employee->first_name }}</h5>
                        <div class="mx-auto">
                            <span class="badge {{ $employee->is_active ? 'text-bg-success' : 'text-bg-danger' }}">
                                {{ $employee->is_active ? 'Active' : 'No Active' }}
                            </span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <ul class="list-unstyled hstack gap-3 mb-0 flex-grow-1">
                            <li>
                                <i class="bx bx-map align-middle"></i>
                                {{ $employee->address }}
                            </li>
                            <li>
                                <i class="bx bx-money align-middle"></i>
                                {{ $employee->salary }} / month
                            </li>
                            <li>
                                <i class="bx bx-time align-middle"></i>
                                {{ $employee->hire_date }}
                            </li>
                        </ul>
                        <div class="hstack gap-2">
                            <button type="button" class="btn btn-primary">
                                Download CV
                                <i class="bx bx-download align-baseline ms-1"></i>
                            </button>
                            <button type="button" class="btn btn-light">
                                <i class="bx bx-bookmark align-baseline"></i>
                            </button>
                        </div>
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
                                        {{ $employee->email }}
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex">
                                <i class="bx bx-money font-size-18 text-primary"></i>
                                <div class="ms-3">
                                    <h6 class="mb-1 fw-semibold">Salary:</h6>
                                    <span class="text-muted">${{ $employee->salary }}</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex">
                                <i class="mdi mdi-phone font-size-18 text-primary"></i>
                                <div class="ms-3">
                                    <h6 class="mb-1 fw-semibold">Phone:</h6>
                                    <span class="text-muted">{{ $employee->phone }}</span>
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
                    <h5 class="mb-3">About Us</h5>
                    <p class="text-muted">
                        Very well thought out and articulate communication. Clear
                        milestones, deadlines and fast work. Patience. Infinite
                        patience. No shortcuts. Even if the client is being
                        careless. Some quick example text to build on the card
                        title and bulk the card's content Moltin gives you
                        platform.
                    </p>
                    <p class="text-muted mb-4">
                        As a highly skilled and successfull product development
                        and design specialist with more than 4 Years of My
                        experience lies in successfully conceptualizing,
                        designing, and modifying consumer products specific to
                        interior design and home furnishings.
                    </p>

                    <h5 class="mb-3">Education</h5>
                    <ul class="verti-timeline list-unstyled">
                        <li class="event-list">
                            <div class="event-timeline-dot">
                                <i class="bx bx-right-arrow-circle"></i>
                            </div>
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <div>
                                        <h6 class="font-size-14 mb-1">
                                            BACKEND DEVELOPMENT
                                        </h6>
                                        <p class="text-muted">
                                            FPT Polytechnic - (2023 - 2025)
                                        </p>

                                        <p class="text-muted mb-0">
                                            There are many variations of passages of
                                            available, but the majority alteration in some
                                            form. As a highly skilled and successfull
                                            product development and design specialist with
                                            more than 4 Years of My experience.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body border-bottom">
                            <h5 class="mb-3">Social Media</h5>
                            <div class="hstack gap-2">
                                <a href="candidate-overview.html#!" class="btn btn-soft-primary"><i
                                        class="bx bxl-facebook align-middle me-1"></i>
                                    Facebook
                                </a>
                                <a href="candidate-overview.html#!" class="btn btn-soft-info"><i
                                        class="bx bxl-twitter align-middle me-1"></i>
                                    Twitter</a>
                                <a href="candidate-overview.html#!" class="btn btn-soft-pink"><i
                                        class="bx bxl-instagram align-middle me-1"></i>
                                    Instagram</a>
                                <a href="candidate-overview.html#!" class="btn btn-soft-success"><i
                                        class="bx bxl-whatsapp align-middle me-1"></i>
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
