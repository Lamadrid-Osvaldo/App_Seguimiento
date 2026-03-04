<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Notificationes extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Registrado con Exito')
                    ->greeting('Hola, ' . $notifiable->nombre . '.')
                    ->line('Tu cuenta ha sido registrada con éxito.')
                    ->line('Tu número de identificación (NIS) registrado es: ' . $notifiable->nis)
                    ->action('Entrar al sistema', url('/login'))
                    ->line('Si no reconoces esta acción, por favor contacta a soporte.')
                    ->salutation('Saludos, ' . config('app.name') . ' Equipo SENA');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
