<?php
namespace Model\User;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class ModelName extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, ModelHelpers, ModelRelationships;

    protected $table = 'users';

    protected $hidden = ['password', 'remember_token'];
    protected $guarded = ['id'];

    public function id()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getPhone()
    {
        return $this->phone;
    }

}
