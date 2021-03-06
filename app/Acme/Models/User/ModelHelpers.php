<?php
namespace Model\User;

trait ModelHelpers
{
    public function isAdmin()
    {
    	return $this->role == 'admin';
    }

    public function isManager()
    {
    	return $this->role == 'manager';
    }

    public function isDoer()
    {
    	return $this->role == 'doer';
    }
}