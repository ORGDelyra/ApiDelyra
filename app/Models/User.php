<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sactum\HasApiTokens;
use Laravel\Sanctum\HasApiTokens as SanctumHasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use SanctumHasApiTokens,HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $fillable =
    [
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'telefono',
        'correo',
        'password',
        'cuenta_bancaria',
        'id_rol'
    ];

    protected $allowSort = [
        'id',
        'primer_nombre',
        'id_rol'
    ];
    public function rol()
    {
        return $this->belongsTo(Rol::class,'id_rol'); 
    }

    public function branches()
    {
        return $this->hasMany(Branch::class,'id_usuario');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'id_usuario');
    }

    public function service(){
        return $this->hasOne(Service::class, 'id_usuario');
    }
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
}
