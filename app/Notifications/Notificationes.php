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
     * Clase de notificación para enviar un correo electrónico al usuario cuando se registre con éxito en la aplicación.
     * El correo incluye un saludo personalizado, información sobre el registro exitoso, el número de identificación
     * (NIS) registrado y un enlace para acceder al sistema.
     * La notificación se envía a través del canal de correo electrónico (mail) y utiliza la clase MailMessage para
     * construir el contenido del correo.
     * Cada método en esta clase tiene una función específica:
     * - via(): Define los canales de entrega de la notificación (en este caso, solo correo electrónico).
     * - toMail(): Construye el mensaje de correo electrónico que se enviará al usuario, incluyendo el asunto, saludo,
     *  líneas de contenido y un botón de acción.
     * - toArray(): Proporciona una representación en array de la notificación, que puede ser utilizada para almacenar
     *  la notificación en la base de datos o para otros fines, aunque en este caso no se ha implementado ningún contenido
     *  específico en el array.
     * 
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
