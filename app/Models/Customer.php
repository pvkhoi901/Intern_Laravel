<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'customer_id',
        'email',
        'address',
        'customer_notes',
        'phone',
        'identity_card',
        'type',
        'bank_account',
        'contact',
        'invoice_address',
        'position',
        'tax_code',
        'term_debt',
        'description_allowable_debt',
        'unit',
        'user_created',
        'allowable_debt_limit',
    ];

    public function phone_zalos()
    {
        return $this->hasMany(PhoneZalo::class);
    }
}
