<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Mail\Admin\ContactMailAdmin;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    // お問い合わせ入力画面
    public function index()
    {
        return view('contact.contact');
    }

    // お問い合わせ確認画面
    public function confirm(ContactRequest $request)
    {
        $contact_content = $request->all();
        return view('contact.confirm', compact('contact_content'));
    }

    // お問い合わせ完了画面
    public function thanks(ContactRequest $request)
    {
        $contact_content = $request->except('submit');
        // 戻るボタン
        if ($request->submit === '戻る') {
            return redirect()->route('contact.index')->withInput($contact_content);
        }

        $request->session()->regenerateToken();
        // 管理者へメール
        \Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMailAdmin($contact_content));
        // ユーザーへメール
        \Mail::to($contact_content['email'])->send(new ContactMail($contact_content));

        return view('contact.thanks', compact('contact_content'));
    }
}
