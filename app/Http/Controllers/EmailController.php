<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /**
     * Send contact email.
     *
     * @param  \App\Http\Requests\CreateEmailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function contact(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'content' => $request->content,
        ];

        Mail::send('email.contact', $data, function ($message) {
            $message->from(env('MAIL_FROM_ADDRESS'), 'VAG-Autoserwis');
            $message->to(env('MAIL_FROM_ADDRESS'));
            $message->subject('Formularz kontaktowy strony internetowej');
        });


        return redirect()->route('frontend.index')->with('success_email_sent', true);
    }
}
