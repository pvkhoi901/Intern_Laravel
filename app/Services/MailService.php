<?php 

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Mail\InformUserProfile;
class MailService 
{
    public function sendUserProfile($user, $filename)
    {
        Mail::to($user['email'])->send(new InformUserProfile($user, $filename));
    }

}

    