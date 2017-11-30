<?php
namespace App\Jobs;

use DB;
use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\Mail;

class SendReminderEmail extends Job implements SelfHandling, ShouldQueue
{

    use InteractsWithQueue, SerializesModels;
    protected $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $user = $this->user;
//        Log::info('往日志文件里写信息！');
//        DB::table('info');

        Mail::send('emails.reminder', ['user' => $user], function ($m) use ($user) {
            $m->from('xw_box@163.com', '异步写入');
//            $m->from('xw_run@qq.com', '您还有未待办的事情');
            $m->to($user->email)->subject('待办提醒');
        });




        /*Mail::raw('这里填写邮件的内容',function ($message){
            // 发件人（你自己的邮箱和名称）
            $message->from('xw_box@163.com', 'yourname');
            // 收件人的邮箱地址
            $message->to($this->user);
            // 邮件主题
            $message->subject('队列发送邮件');
        });*/
        /*Mail::send('emails.welcome', $data, function ($message) {
            $message->from('us@example.com', 'Laravel');
            $message->to('foo@example.com')->cc('bar@example.com');
        });*/
       /* $mailer->send('emails.reminder',['user'=>$user],function($message) use ($user){
//            $message->from('frees7@foxmail.com', '管理员');
            $message->to($user->email)->subject('新功能发布');
        });*/
    }
}