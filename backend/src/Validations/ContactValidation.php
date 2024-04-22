<?php

namespace App\Validations;

class ContactValidation
{
    public function validated($contact_name, $contact_number)
    {
        if (!$this->is_name($contact_name))
        {
            return false;
        } 

        if (!$this->is_number($contact_number))
        {
            return false;
        }

        return true;
    }

    public function is_name($contact_name)
    {
        if (strlen($contact_name) == 0 or strlen($contact_name) >= 101)
        {
            return false;
        }
        return true;
    }

    public function is_number($contact_number)
    {
        $pattern = '~^(?:\+7|8)\d{10}$~';
        return preg_match($pattern, $contact_number);
    }
}