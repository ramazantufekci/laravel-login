<?php
namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Notifications\Messages\MailMessage;

class VerifyEmail extends Notification
{
    public function via($notifiable){
        return ['mail'];
    }

    public function toMail($notifiable)
    {	
        $verifyUrl = URL::temporarySignedRoute('verification.verify',
        Carbon::now()->addMinutes(60),
        ['id'=>$notifiable->getKey(),
        'hash'=>sha1($notifiable->getEmailForVerification())
        ]
    );
    return (new MailMessage)
    ->subject('naber')
    ->line('sdsdgdf')
    ->action('url',$verifyUrl)
    ->line('attik bir kere');

    }
}