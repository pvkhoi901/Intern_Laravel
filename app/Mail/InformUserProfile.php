<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InformUserProfile extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $user;
    protected $filename;
    public function __construct($user, $filename)
    {
        $this->user = $user;
        $this->filename = $filename;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->filename == '/') {
            return $this->view('mails.admin.users.inform-user-profile', ['user'=> $this->user]);
        }
        return $this->view('mails.admin.users.inform-user-profile', ['user'=> $this->user])->attach($this->filename);
    }
}
