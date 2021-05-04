<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfor extends Model
{
    use HasFactory;
    protected $table = 'contact_infors';
    protected $fillable = [
        'contact_address', 'contact_address_des', 'contact_phone', 'contact_phone_des',
        'contact_email', 'contact_email_des',
    ];
}
