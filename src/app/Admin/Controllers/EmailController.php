<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Mail\Notice;

class EmailController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Email';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $users = User::get();
        return view('email', compact('users'));
    }

    public function send(Request $request){
        // dd(true);
        $users = User::get();
        // ②メール送信に使うインスタンスを生成
        $welcomeMail = new Notice();

				// ③メール送信
        Notice::send( $welcomeMail );

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
			return redirect()->route()->with(compact('messages', 'users'));
        }
    }
}
