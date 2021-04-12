<?php

namespace App\Notifications\User;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends ResetPassword
{
    public function toMail($notifiable)
    {
        return (new MailMessage)
            // ->line('You are receiving this email because we received a password reset request for your account.')
            // ->action('Reset Password', url(config('url').route('user.password.reset', $this->token, false)))
            // ->line('If you did not request a password reset, no further action is required.');
            ->subject('パスワード再設定')
            ->line('下記のボタンをクリックしてリンク先でパスワードをリセットしてください。')
            ->action('Reset Password', url(config('url').route('user.password.reset', $this->token, false)))
            ->line('もしこのメールに心当たりがない場合、メールを破棄してください。');
    }
}