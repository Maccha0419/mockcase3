<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class Notice extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to('aaa@example.com')
            ->cc('bbb@example.com')
            ->bcc('ccc@example.com')
            ->from('XXX@XXXX','佐藤一郎')
            ->subject('会員登録が完了しました')
            ->view('sent_email');         // 本文（HTMLメール）
            // ->text('sent_email_text');   // 本文（プレーンテキストメール）
    }
}
