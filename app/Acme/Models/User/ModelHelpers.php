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

    public function isNs()
    {
    	return $this->role == 'ns';
    }

    public function isDirector()
    {
        return $this->role = 'director';
    }

    public function isBirinchi()
    {
        return $this->role = 'birinchi';
    }

    public function isMuzkanal()
    {
        return $this->role = 'muzkanal';
    }
}

