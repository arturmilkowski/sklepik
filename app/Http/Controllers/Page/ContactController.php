<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact\Contact;
use App\Http\Requests\Contact\ContactRequest;

class ContactController extends Controller
{
    public function create(): View
    {
        return view('page.contact.create');
    }

    public function store(ContactRequest $request): RedirectResponse
    {
        $spam = $request->input('i_am_not_a_robot');
        if ($spam) {
            return redirect()->route('pages.index');
        }
        $validated = $request->validated();
        Mail::to(env('MAIL_FROM_ADDRESS', 'hello@example.com'), env('MAIL_FROM_NAME'))->send(new Contact($validated));

        return redirect()->route('pages.contacts.thank')->with('mail_sent', 'mail sent');
    }

    public function thank(): View | RedirectResponse
    {
        // only if mail just has send
        if (session()->exists('mail_sent')) {
            session()->forget('mail_sent');

            return view('page.contact.thank');
        }

        return redirect()->route('pages.index');
    }
}
