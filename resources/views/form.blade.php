<!DOCTYPE html>
<html>
<head>
    <title>OET Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }

        .logo-wrapper {
            text-align: center;
            margin-top: 40px;
        }

        .logo-wrapper img {
            max-width: 100px;
        }

        .logo-content h4 {
            font-weight: bold;
            margin-top: 10px;
        }

        .form-section {
            background-color: #ffffff;
            padding: 40px;
            margin: 30px auto;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0,0,0,0.05);
        }

        .form-section h5 {
            font-weight: 600;
            border-bottom: 2px solid #0d6efd;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: 500;
        }

        input[disabled] {
            background-color: #f0f0f0 !important;
        }

        .btn-submit {
            width: 100%;
            font-size: 16px;
            padding: 10px;
        }

        .alert {
            margin-top: 25px;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, 0.25);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="logo-wrapper">
        <img src="{{ asset('asset/logo.png') }}" alt="Logo">
        <div class="logo-content">
            <h4>National Council For Hotel Management And Catering Technology</h4>
            <p class="text-muted">(An Autonomous Body Under Ministry of Tourism, Govt. of India)</p>
        </div>
    </div>

    <form method="POST" action="{{ session('data') ? route('pay') : route('search') }}">
        @csrf

        <div class="form-section">
            <h5>OET Candidate Search</h5>

            <div class="row g-4">
                <div class="col-md-3">
                    <label class="form-label">Roll Number</label>
                    <input type="text" name="roll_no" class="form-control"
                        value="{{ old('roll_no', session('search_inputs.roll_no') ?? '') }}"
                        {{ session('data') ? 'disabled' : '' }} required
                        pattern="\d+" title="Only numeric digits allowed"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Father’s Name</label>
                    <input type="text" name="father_name" class="form-control"
                        value="{{ old('father_name', session('search_inputs.father_name') ?? '') }}"
                        {{ session('data') ? 'disabled' : '' }} required
                        oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Mobile No.</label>
                    <input type="text" name="mobile" class="form-control"
                        value="{{ old('mobile', session('search_inputs.mobile') ?? '') }}"
                        {{ session('data') ? 'disabled' : '' }} required
                        maxlength="10"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Date of Birth</label>
                    <input type="date" name="dob" class="form-control"
                        value="{{ old('dob', session('search_inputs.dob') ?? '') }}"
                        {{ session('data') ? 'disabled' : '' }} required>
                </div>
            </div>

            @if(session('data'))
                @foreach(session('search_inputs') as $key => $value)
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endforeach
            @endif

            @if(!session('data'))
                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger text-center">{{ session('error') }}</div>
            @endif

            @if(session('data'))
                @php $data = session('data'); @endphp

                <hr class="my-4">
                <h5>Candidate Details</h5>

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label">Name of Candidate</label>
                        <input type="text" class="form-control" value="{{ $data->candidate_name }}" disabled>
                    </div>
                   
                    <div class="col-md-6">
                        <label class="form-label">Mother’s Name</label>
                        <input type="text" class="form-control" value="{{ $data->mother_name }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Round of OET</label>
                        <input type="text" class="form-control" value="{{ $data->oet_round }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Rank Secured</label>
                        <input type="text" class="form-control" value="{{ $data->oet_rank }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Category</label>
                        <input type="text" class="form-control" value="{{ $data->category }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Admission Category</label>
                        <input type="text" class="form-control" value="{{ $data->admission_category }}" disabled>
                    </div>
                     <div class="col-md-6">
                        <label class="form-label">Email ID</label>
                        <input type="email" class="form-control" value="{{ $data->email }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"><b>Seat Confirmation Fee</b></label>
                        <input type="text" class="form-control" value="20000" disabled>
                    </div>
                </div>

                {{-- Hidden fields for payment --}}
                <input type="hidden" name="candidate_name" value="{{ $data->candidate_name }}">
                <input type="hidden" name="email" value="{{ $data->email }}">
                <input type="hidden" name="mother_name" value="{{ $data->mother_name }}">
                <input type="hidden" name="oet_round" value="{{ $data->oet_round }}">
                <input type="hidden" name="oet_rank" value="{{ $data->oet_rank }}">
                <input type="hidden" name="category" value="{{ $data->category }}">
                <input type="hidden" name="admission_category" value="{{ $data->admission_category }}">
                <input type="hidden" name="amount" value="20000">
                <input type="hidden" name="roll_no" value="{{ $data->roll_no }}">

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success btn-submit">Pay </button>
                </div>
            @endif
@if(session('success'))
    <div class="alert alert-success text-center mt-4">
        {{ session('success') }} <br>
        <a href="{{ route('payment.pdf', ['id' => session('payment_id')]) }}" class="btn btn-outline-primary mt-2">Download Payment Receipt</a>
        <a href="{{ route('allotment.letter', ['id' => session('payment_id')]) }}" class="btn btn-outline-success mt-2">Download Allotment Letter</a>
    </div>
@endif

        </div>
    </form>
</div>

</body>
</html>
