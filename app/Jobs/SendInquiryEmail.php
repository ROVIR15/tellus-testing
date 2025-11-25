<?php

namespace App\Jobs;

use App\Models\Inquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendInquiryEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $inquiryId;

    public function __construct(int $inquiryId)
    {
        $this->inquiryId = $inquiryId;
    }

    public function handle(): void
    {
        $inquiry = Inquiry::find($this->inquiryId);
        if (!$inquiry) {
            return;
        }

        $to = env('CONTACT_NOTIFICATION_EMAIL', config('mail.from.address'));
        $subject = 'New Inquiry Received';
        $body = "New inquiry received:\n" .
            "Name: {$inquiry->first_name} {$inquiry->last_name}\n" .
            "Company: {$inquiry->company_name}\n" .
            "Location: {$inquiry->company_city}, {$inquiry->company_country}\n" .
            "Address: {$inquiry->company_address} ({$inquiry->zip})\n" .
            "Phone: {$inquiry->phone_country_code} {$inquiry->phone_number}\n" .
            "Email: {$inquiry->email}\n\n" .
            "Message:\n{$inquiry->message}\n\n" .
            "IP: {$inquiry->ip_address}\n" .
            "User-Agent: {$inquiry->user_agent}";

        Mail::raw($body, function ($message) use ($to, $subject) {
            $message->to($to)->subject($subject);
        });
    }
}