<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function events()
    {
        return $this->hasMany(Event::class, 'creator_id');
    }

    public function eventsFor()
    {
        return $this->hasMany(Event::class, 'event_for_id');
    }

    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }

    public function requisitionItems()
    {
        return $this->hasMany(RequisitionItem::class, 'created_by_id');
    }

    public function claimedItems()
    {
        return $this->hasMany(RequisitionItem::class, 'claimed_by_id');
    }

    public function galleryImages()
    {
        return $this->hasMany(Gallery::class);
    }
}
