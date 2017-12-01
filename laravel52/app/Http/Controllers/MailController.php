<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Jobs\SendReminderEmail;

class MailController extends Controller
{
    //其他方法

    //发送提醒邮件
    public function sendReminderEmail(Request $request,$id){
        $user = \App\User::findOrFail($id);
//        $user = User::find($id);

        /*Mail::send('emails.reminder', ['user' => $user], function ($m) use ($user) {
            $m->from('xw_box@163.com', '您还有未待办的事情');
//            $m->from('xw_run@qq.com', '您还有未待办的事情');
            $m->to($user->email)->subject('待办提醒');
        });*/
        $job = (new SendReminderEmail($user))->delay(15);
        $this->dispatch($job);
    }
}