<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InquiryController extends Controller
{
  public function sidebarInquiry(Request $request)
  {
    // printArray($request->toArray());
    // die;
    $request->validate(
      [
        'treatment_name' => 'required',
        'name' => [
          'required',
          'regex:/^[a-zA-Z\s]+$/u', // Allow only alphabetic characters and spaces
        ],
        'country_code' => 'required|numeric',
        'mobile' => 'required|numeric',
        'email' => 'required|email',
        'age' => 'required',
        'gender' => 'required',
        'nationality' => 'required',
        'medical_report' => 'nullable|max:5000|mimes:jpg,jpeg,pdf',
        'message' => [
          'required',
          'string',
          'max:500', // You can adjust the max length as needed
          'regex:/^[a-zA-Z0-9\s!@#$%^&*(),.?:"{}|<>]+$/',
        ],
      ]
    );
    $field = new Lead();
    $field->treatment_name = $request['treatment_name'];
    $field->name = $request['name'];
    $field->c_code = $request['country_code'];
    $field->mobile = $request['mobile'];
    $field->email = $request['email'];
    $field->age = $request['age'];
    $field->gender = $request['gender'];
    $field->nationality = $request['nationality'];
    $field->message = $request['message'];
    $field->source = 'Sidebar Form';
    $field->page_url = $request['page_url'];
    if ($request->hasFile('medical_report')) {
      $fileOriginalName = $request->file('medical_report')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('medical_report')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('medical_report')->move('uploads/medical_reports/', $file_name);
      if ($move) {
        $field->medical_report = $file_name;
        $field->medical_report_path = 'uploads/medical_reports/' . $file_name;
      } else {
        session()->flash('emsg', 'Some problem occured. File not uploaded.');
      }
    }
    $field->save();
    session()->flash('smsg', 'Your inquiry has been submitted succesfully. We will contact you soon.');

    $emaildata = [
      'treatment_name' => $request['treatment_name'],
      'age' => $request['age'],
      'gender' => $request['gender'],
      'nationality' => $request['nationality'],
      'name' => $request['name'],
      'email' => $request['email'],
      'c_code' => $request['country_code'],
      'mobile' => $request['mobile'],
      'inquiry_message' => $request['message'],
      'source' => $request['source'],
      'source_path' => $request['page_url'],
    ];
    $dd = ['to' => $request['email'], 'to_name' => $request['name'], 'subject' => 'Inquiry'];

    Mail::send(
      'mails.inquiry-reply',
      $emaildata,
      function ($message) use ($dd) {
        $message->to($dd['to'], $dd['to_name']);
        $message->subject($dd['subject']);
        $message->priority(1);
      }
    );

    $dd2 = ['to' => TO_EMAIL, 'cc' => CC_EMAIL, 'to_name' => TO_NAME, 'cc_name' => CC_NAME, 'subject' => 'New Inquiry'];

    Mail::send(
      'mails.inquiry-mail-to-team',
      $emaildata,
      function ($message) use ($dd2) {
        $message->to($dd2['to'], $dd2['to_name']);
        $message->cc($dd2['cc'], $dd2['cc_name']);
        $message->subject($dd2['subject']);
        $message->priority(1);
      }
    );

    return redirect('thank-you');
  }
  public function getFreeQuote(Request $request)
  {
    // printArray($request->toArray());
    // die;
    $request->validate(
      [
        'treatment_name' => 'required',
        'name' => [
          'required',
          'regex:/^[a-zA-Z\s]+$/u', // Allow only alphabetic characters and spaces
        ],
        'country_code' => 'required|numeric',
        'mobile' => 'required|numeric',
        'email' => 'required|email',
        'age' => 'required',
        'gender' => 'required',
        'nationality' => 'required',
        'medical_report' => 'nullable|max:5000|mimes:jpg,jpeg,pdf',
        'message' => [
          'required',
          'string',
          'max:500', // You can adjust the max length as needed
          'regex:/^[a-zA-Z0-9\s!@#$%^&*(),.?:"{}|<>]+$/',
        ],
      ]
    );
    $field = new Lead();
    $field->treatment_name = $request['treatment_name'];
    $field->name = $request['name'];
    $field->c_code = $request['country_code'];
    $field->mobile = $request['mobile'];
    $field->email = $request['email'];
    $field->age = $request['age'];
    $field->gender = $request['gender'];
    $field->nationality = $request['nationality'];
    $field->message = $request['message'];
    $field->source = 'Get Free Quote';
    $field->page_url = $request['page_url'];
    if ($request->hasFile('medical_report')) {
      $fileOriginalName = $request->file('medical_report')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('medical_report')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('medical_report')->move('uploads/medical_reports/', $file_name);
      if ($move) {
        $field->medical_report = $file_name;
        $field->medical_report_path = 'uploads/medical_reports/' . $file_name;
      } else {
        session()->flash('emsg', 'Some problem occured. File not uploaded.');
      }
    }

    $field->save();
    session()->flash('smsg', 'Your inquiry has been submitted succesfully. We will contact you soon.');

    $emaildata = [
      'treatment_name' => $request['treatment_name'],
      'age' => $request['age'],
      'gender' => $request['gender'],
      'nationality' => $request['nationality'],
      'name' => $request['name'],
      'email' => $request['email'],
      'c_code' => $request['country_code'],
      'mobile' => $request['mobile'],
      'inquiry_message' => $request['message'],
    ];
    $dd = ['to' => $request['email'], 'to_name' => $request['name'], 'subject' => 'Inquiry'];

    Mail::send(
      'mails.inquiry-reply',
      $emaildata,
      function ($message) use ($dd) {
        $message->to($dd['to'], $dd['to_name']);
        $message->subject($dd['subject']);
        $message->priority(1);
      }
    );

    $dd2 = ['to' => TO_EMAIL, 'cc' => CC_EMAIL, 'to_name' => TO_NAME, 'cc_name' => CC_NAME, 'subject' => 'New Inquiry'];

    Mail::send(
      'mails.inquiry-mail-to-team',
      $emaildata,
      function ($message) use ($dd2) {
        $message->to($dd2['to'], $dd2['to_name']);
        $message->cc($dd2['cc'], $dd2['cc_name']);
        $message->subject($dd2['subject']);
        $message->priority(1);
      }
    );

    return redirect('thank-you');
  }
  public function contactUs2(Request $request)
  {
    return "You are bot.";
  }
  public function contactUs(Request $request)
  {
    // printArray($request->toArray());
    // die;
    $request->validate(
      [
        'name' => [
          'required',
          'regex:/^[a-zA-Z\s]+$/u', // Allow only alphabetic characters and spaces
        ],
        'mobile' => 'required|numeric',
        'email' => 'required|email',
        'message' => [
          'required',
          'string',
          'max:500', // You can adjust the max length as needed
          'regex:/^[a-zA-Z0-9\s!@#$%^&*(),.?:"{}|<>]+$/',
        ],
        'honeypot' => 'nullable',
      ]
    );

    // Check if the honeypot field is empty, treat it as a bot submission
    if (!empty($request->input('honeypot'))) {
      // Handle as a bot submission (you can log or take other actions)
      return response()->json(['error' => 'Bot detected.']);
    }

    $field = new Lead();
    $field->name = $request['name'];
    $field->mobile = $request['mobile'];
    $field->email = $request['email'];
    $field->message = $request['message'];
    $field->source = 'Contact US Form';
    $field->page_url = $request['page_url'];

    $field->save();
    session()->flash('smsg', 'Your inquiry has been submitted succesfully. We will contact you soon.');

    $emaildata = [
      'name' => $request['name'],
      'email' => $request['email'],
      'mobile' => $request['mobile'],
      'inquiry_message' => $request['message'],
      'source' => $request['source'],
      'source_path' => $request['page_url'],
    ];
    $dd = ['to' => $request['email'], 'to_name' => $request['name'], 'subject' => 'Inquiry'];

    Mail::send(
      'mails.inquiry-reply',
      $emaildata,
      function ($message) use ($dd) {
        $message->to($dd['to'], $dd['to_name']);
        $message->subject($dd['subject']);
        $message->priority(1);
      }
    );

    $dd2 = ['to' => TO_EMAIL, 'cc' => CC_EMAIL, 'to_name' => TO_NAME, 'cc_name' => CC_NAME, 'subject' => 'New Inquiry'];

    Mail::send(
      'mails.inquiry-mail-to-team',
      $emaildata,
      function ($message) use ($dd2) {
        $message->to($dd2['to'], $dd2['to_name']);
        $message->cc($dd2['cc'], $dd2['cc_name']);
        $message->subject($dd2['subject']);
        $message->priority(1);
      }
    );

    return redirect('thank-you');
  }
  public function thankyou(Request $request)
  {
    $title = 'Thank You';
    $page_url = url()->current();

    $countries = Country::orderBy('name', 'asc')->get();
    $phonecodes = Country::select('phonecode', 'name')->distinct()->orderBy('phonecode', 'asc')->get();

    $data = compact('title', 'page_url', 'countries', 'phonecodes',);
    return view('front.thank-you')->with($data);
  }
}
