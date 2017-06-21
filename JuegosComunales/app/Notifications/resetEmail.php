<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword;

class resetEmail extends ResetPassword
{
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Sistema de Juegos Comunales - Recuperar Contraseña')
             ->greeting('¡Hola!')
             
                    ->line('Está recibiendo este mensaje porque realizó una solicitud de recuperar
                    contraseña del Sistema de Juegos Comunales de Grecia.')
                    ->action('Recuperar Contraseña', route('password.reset', $this->token))
                    ->line('Si no realizalizó solicitud para recuperar contraseña, por favor ignore este mensaje.')
                    ->salutation('Saludos, Comité Cantonal de Deportes y Recreación de Grecia.');
    }

    
}
