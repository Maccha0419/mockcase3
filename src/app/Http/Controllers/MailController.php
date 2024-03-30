<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Notice;
use App\Models\User;
use App\Admin\Controllers\EmailController;

class MailController extends Controller
{
    public function search(Request $request)
    {
    }

	public function send(Request $request){
        $users = User::get();
        // ②メール送信に使うインスタンスを生成
        $welcomeMail = new Notice();
				// ③メール送信
        Mail::send( $welcomeMail );

        // ④補足：ここで宛先を追加することもできる
        // Mail::to($request->test1)
        //     ->cc($request->test2)
        //     ->bcc($request->test3)
        //     ->send($welcomeMail);
        // ⑤送信成功か確認
        if (count(Mail::failures()) > 0) {
            $message = 'メール送信に失敗しました';
            // 元の画面に戻る
            return back()->withInput($users)->withErrors($messages);
        } else{
            $messages = 'メールを送信しました';
			// 別のページに遷移する
			return redirect();
        }
    }
}
