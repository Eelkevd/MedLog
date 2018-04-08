<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Crypt;

class InviteEmail extends Notification
{
    use Queueable;

    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
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
      $password = Crypt::decrypt($this->user->password)
        // sends an email invite
        return (new MailMessage)
                    ->line('Iemand heeft u uitgenodigd om zijn medisch dagboek te bekijken op Medlog!')
                    ->line('In deze email vindt u uw accountgegevens. Je logged in met jouw e-mail en het onderstaande wachtwoord.')
                    // ->line('Gebruikersnaam: ')
                    // ->line($this->user->username)
                    ->line('Wachtwoord: ')
                    ->line($password)
                    ->action('Bestig mijn account', url('verify_invite'))
                    ->line('Thank you for using our application!');
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
