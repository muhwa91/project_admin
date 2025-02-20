<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'member';
    protected $primaryKey = 'mb_id';
    public $timestamps = false; // created_at, updated_at 사용 안 함

    protected $fillable = [
        'mb_right',
        'mb_status',
        'mb_login_id',
        'mb_pwd',
        'mb_name',
        'mb_phone',
        'mb_email',
        'login_token',
    ];

    protected $hidden = [
        'mb_pwd',
    ];

    // Laravel의 기본 비밀번호 필드인 `password`를 `mb_pwd`로 사용하도록 설정
    public function getAuthPassword()
    {
        return $this->mb_pwd;
    }
}
