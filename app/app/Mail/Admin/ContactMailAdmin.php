<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class ContactMailAdmin extends Mailable
{
    use Queueable, SerializesModels;

    protected $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from(env('MAIL_FROM_ADDRESS'))
            ->subject('【OneCoinLunch】お問い合わせを受け付けました')
            ->view('contact.admin.mail')
            ->with(['content' => $this->content]);
    }
}
