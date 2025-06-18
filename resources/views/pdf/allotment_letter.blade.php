<!DOCTYPE html>
<html>
<head>
    <title>OET Allotment Letter</title>
    <style>
        @page {
            margin: 50px 60px;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            font-size: 15px;
            line-height: 1.6;
            color: #333;
            background-color: #fff;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 80px;
        }

        .header h4 {
            margin: 8px 0 4px;
            color:rgb(0, 0, 0);
            font-size: 18px;
        }

        .header p {
            font-size: 12px;
            color: #555;
            margin: 0;
        }

        .letter-title {
            text-align: center;
            font-size: 18px;
            margin: 25px 0;
            font-weight: bold;
            text-decoration: underline;
        }

        .content {
            font-size: 15px;
            text-align: justify;
        }

        .content p {
            margin: 8px 0;
        }

        .highlight {
            font-weight: 600;
            color: #000;
        }

        .footer {
            margin-top: 40px;
            font-size: 14px;
            color: #555;
            text-align: right;
        }

        .signature {
            margin-top: 70px;
            text-align: right;
            font-size: 14px;
        }

        .signature-line {
            margin-top: 40px;
            display: inline-block;
            border-top: 1px solid #444;
            width: 200px;
            text-align: center;
            padding-top: 5px;
        }
    </style>
</head>
<body>

    <div class="header">
        <img src="{{ public_path('asset/logo.png') }}" alt="Logo">
        <h4>National Council For Hotel Management And Catering Technology</h4>
        <p>(An Autonomous Body Under Ministry of Tourism, Govt. of India)</p>
    </div>

    <div class="letter-title">ALLOTMENT LETTER</div>

    <div class="content">
        <p>This is to certify that the following candidate has been successfully allotted a seat under the Online Entrance Test (OET) counselling process conducted by the National Council for Hotel Management and Catering Technology (NCHMCT):</p>

        <p><span class="highlight">Candidate Name:</span> {{ $payment->candidate_name }}</p>
        <p><span class="highlight">Roll Number:</span> {{ $payment->roll_no }}</p>
        <p><span class="highlight">OET Rank:</span> {{ $payment->oet_rank }}</p>
        <p><span class="highlight">Round of OET Allotment:</span> {{ $payment->oet_round }}</p>
        <p><span class="highlight">Category:</span> {{ $payment->category }}</p>
        <p><span class="highlight">Admission Category:</span> {{ $payment->admission_category }}</p>

        <p>The above-named candidate has paid the prescribed seat confirmation fee and is hereby provisionally allotted a seat in accordance with the rules and schedule of NCHMCT. This allotment is subject to successful document verification and compliance with the final admission guidelines issued by the Council.</p>

        <p>The candidate is advised to keep a copy of this letter for future reference and report to the allotted institute as per the counselling timeline.</p>
    </div>

    <div class="footer">
        Date: {{ now()->format('d-m-Y') }}
    </div>

    <div class="signature">
        <div class="signature-line">Authorized Signatory</div>
    </div>

</body>
</html>
