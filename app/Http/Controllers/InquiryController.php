<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:120'],
            'last_name' => ['nullable', 'string', 'max:120'],
            'company_name' => ['required', 'string', 'max:180'],
            'company_website' => ['nullable', 'url', 'max:255'],
            'company_country' => ['nullable', 'string', 'max:120'],
            'company_city' => ['nullable', 'string', 'max:120'],
            'company_address' => ['nullable', 'string', 'max:255'],
            'zip' => ['nullable', 'string', 'max:30'],
            'phone_country_code' => ['nullable', 'string', 'regex:/^\+\d{1,3}$/'],
            'phone_number' => ['nullable', 'string', 'max:60'],
            'email' => ['required', 'email', 'max:180'],
            'message' => ['required', 'string'],
        ]);

        $data['ip_address'] = $request->ip();
        $data['user_agent'] = $request->userAgent();

        $inquiry = Inquiry::create($data);

        if (env('CONTACT_EMAIL_ENABLED', false)) {
            \App\Jobs\SendInquiryEmail::dispatch($inquiry->id);
        }

        return redirect()->back()->with('success', 'Thank you! Your inquiry has been submitted.');
    }
}
