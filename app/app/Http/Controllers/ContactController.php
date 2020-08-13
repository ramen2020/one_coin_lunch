<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // お問い合わせ入力画面
    public function index()
    {
        return view('contact.contact');
    }

    // お問い合わせ確認画面
    public function confirm(Request $request)
    {
        $contact_content = $request->all();
        return view('contact.confirm', compact('contact_content'));
    }

    // お問い合わせ完了画面
    public function thanks(Request $request)
    {
        $contact_content = $request->except('submit');
        // 戻るボタン
        if ($request->submit === '戻る') {
            return redirect()->route('contact.index')->withInput($contact_content);
        }
        dd($request);

        $request->session()->regenerateToken();
        \Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($contact_content));

        return view('contact.thanks', compact('contact_content'));
    }
}
