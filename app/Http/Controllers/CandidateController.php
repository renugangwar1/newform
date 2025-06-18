<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Payment;
use PDF;

class CandidateController extends Controller
{
    public function index()
    {
        return view('form');
    }

   public function search(Request $request)
{
    $request->validate([
        'roll_no' => ['required', 'digits_between:1,20'],
        'father_name' => ['required', 'regex:/^[\pL\s]+$/u'], 
        'mobile' => ['required', 'digits:10'], 
        'dob' => 'required|date'
    ], [
        'roll_no.required' => 'Roll Number is required.',
        'father_name.required' => 'Father\'s Name is required.',
        'father_name.regex' => 'Father\'s Name must contain only letters.',
        'mobile.required' => 'Mobile number is required.',
        'mobile.digits' => 'Mobile number must be exactly 10 digits.',
        'dob.required' => 'Date of Birth is required.',
        'dob.date' => 'Invalid Date of Birth format.',
    ]);

    $candidate = Candidate::where('roll_no', $request->roll_no)
        ->where('father_name', $request->father_name)
        ->where('mobile', $request->mobile)
        ->where('dob', $request->dob)
        ->first();

    if ($candidate) {
        return redirect()->route('form')
            ->with('data', $candidate)
            ->with('search_inputs', $request->only(['roll_no', 'father_name', 'mobile', 'dob']));
    } else {
        return redirect()->route('form')->with('error', 'No record found');
    }
}


   

public function pay(Request $request)
{
    $request->validate([
        'roll_no' => 'required',
        'candidate_name' => 'required',
        'email' => 'required|email',
        'mother_name' => 'required',
        'oet_round' => 'required',
        'oet_rank' => 'required',
        'category' => 'required',
        'amount' => 'required|numeric',
    ]);

    $payment = Payment::create([
        'roll_no' => $request->roll_no,
        'candidate_name' => $request->candidate_name,
        'email' => $request->email,
        'mother_name' => $request->mother_name,
        'oet_round' => $request->oet_round,
        'oet_rank' => $request->oet_rank,
        'category' => $request->category,
        'amount' => $request->amount,
    ]);

    return redirect()->route('form')
        ->with('success', 'payment successful.')
        ->with('payment_id', $payment->id); 
}
public function generatePDF($id)
{
    $payment = Payment::findOrFail($id);

    $pdf = PDF::loadView('pdf.payment', compact('payment'));

    return $pdf->download('OET_Confirmation_'.$payment->roll_no.'.pdf');
}


public function generateAllotmentLetter($id)
{
    $payment = Payment::findOrFail($id);

    $pdf = Pdf::loadView('pdf.allotment_letter', compact('payment'));
    return $pdf->download('OET_Allotment_Letter_'.$payment->roll_no.'.pdf');
}

}
