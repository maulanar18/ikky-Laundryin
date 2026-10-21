<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessProfile extends Model
{
    use HasFactory;

    protected $table = 'business_profiles';

    protected $fillable = [
        'name',
        'tagline',
        'sub_tagline',
        'description',
        'owner_name',
        'owner_title',
        'owner_bio',
        'owner_photo',
        'price_info',
        'address',
        'phone',
        'whatsapp_number',
        'email',
        'working_hours',
        'google_maps_link',
        'social_facebook',
        'social_instagram',
        'social_twitter',
    ];
}
