<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordResetNotification extends Notification
{
    use Queueable;

    private $token;
    private $email;
    private $name;
    
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token, $email, $name)
    {
        $this->token = $token;
        $this->email = $email;
        $this->name = $name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        /**
         * Line break in salutation message doesn't work with ' character
         * It's necessary use " character to really does work
        */

        $url = 'http://localhost:8000/password/reset/' . $this->token . '?email=' . $this->email;
        $minutes = config('auth.passwords.' . config('auth.defaults.passwords') . '.expire');

        return (new MailMessage)
            ->subject('Recuperação de Senha')
            ->greeting('Olá ' . $this->name)
            ->line('Alguém, esperamos que você, solicitou a redefinição de senha no nosso sistema.')
            ->line('')
            ->action('Clique no link para mudar sua senha', $url)
            ->line('O link acima expira em ' . $minutes . ' minutos.')
            ->line('')
            ->line('Caso você não tenha requisitado a alteração de senha, apenas desconsidere este e-mail.')
            ->salutation("\r\n\r\n Atenciosamente,  \r\n " . env('APP_NAME'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
