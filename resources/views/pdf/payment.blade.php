<!DOCTYPE html>
<html>
<head>
    <title>OET Payment Confirmation</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            font-size: 15px;
            background-color: #f8f9fa;
            padding: 40px;
            color: #212529;
        }

        .container {
            max-width: 750px;
            margin: auto;
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.08);
        }

        .logo-wrapper {
            text-align: center;
            margin-bottom: 25px;
        }

        .logo-wrapper img {
            max-width: 90px;
        }

        .logo-content {
            margin-top: 10px;
        }

        .logo-content h4 {
            margin: 0;
            font-size: 20px;
            font-weight: 700;
            color:rgb(0, 0, 0);
        }

        .logo-content p {
            font-size: 13px;
            color: #6c757d;
        }

        h2 {
            text-align: center;
            margin: 30px 0 20px;
            font-size: 22px;
            color: #198754;
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 10px;
        }

        table.details {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            font-size: 15px;
        }

        table.details th,
        table.details td {
            padding: 12px 14px;
            text-align: left;
            vertical-align: top;
            border-bottom: 1px solid #dee2e6;
        }

        table.details th {
            width: 40%;
            background-color: #f1f3f5;
            font-weight: 600;
            color:rgb(0, 0, 0);
        }

        table.details td {
            background-color: #ffffff;
            color:rgb(0, 0, 0);
        }

        table.details tr:last-child td {
            border-bottom: none;
        }
    </style>
</head>
<body>

<div class="container">

    <!-- Logo and Header Block -->
    <div class="logo-wrapper">
        <img src="{{ public_path('asset/logo.png') }}" alt="Logo">
        <div class="logo-content">
            <h4>National Council For Hotel Management And Catering Technology</h4>
            <p>(An Autonomous Body Under Ministry of Tourism, Govt. of India)</p>
        </div>
    </div>

    <h2>OET Seat Allotment Payment Receipt</h2>

    <table class="details">
        <tr><th>Roll No:</th><td>{{ $payment->roll_no }}</td></tr>
        <tr><th>Candidate Name:</th><td>{{ $payment->candidate_name }}</td></tr>
        <tr><th>Email:</th><td>{{ $payment->email }}</td></tr>
        <tr><th>Mother’s Name:</th><td>{{ $payment->mother_name }}</td></tr>
        <tr><th>OET Round:</th><td>{{ $payment->oet_round }}</td></tr>
        <tr><th>OET Rank:</th><td>{{ $payment->oet_rank }}</td></tr>
        <tr><th>Category:</th><td>{{ $payment->category }}</td></tr>
        <tr><th>Amount Paid:</th><td>₹{{ number_format($payment->amount) }}</td></tr>
        <tr><th>Date:</th><td>{{ $payment->created_at->format('d-m-Y H:i') }}</td></tr>
    </table>

</div>

</body>
</html>
