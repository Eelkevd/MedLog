<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MailResetPasswordToken extends Notification
{
    use Queueable;

    public $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
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
        return (new MailMessage)
        ->subject("Wachtwoord wijzigen")
        ->line("U heeft aangegeven uw wachtwoord voor uw medisch dagboek op MedLog te willen wijzigen. Om uw wachtwoord te kunnen wijzigen, klikt u op de onderstaande knop.")
        ->action('Wijzig wachtwoord', url('password/reset', $this->token))
<<<<<<< HEAD
        ->line("Hartelijk dank voor uw vertrouwen in MedLog!");
=======
        ->line("Hartelijk dank voor uw vertrouwen in MedLog!);
>>>>>>> nieuwe notification aangemaakt voor nederlandstalige email bij Wijzig Wachtwoord opvraag. Wachtwoord wijzigen per email bevestiging in place
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
