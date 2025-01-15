<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user';

    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
            if (empty($model->token)) {
                $model->token = Str::random(60);
            }
        });
    }

    protected $fillable = [
        'username',
        'password',
        'nama',
        'no_pegawai',
        'email',
        'divisi_id',
        'bagian_id',
        'jabatan_id',
        'token',
        'status_aktivasi'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
