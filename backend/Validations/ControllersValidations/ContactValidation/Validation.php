<?php


class Validation
{
    public function validated($contact_name, $contact_number)
    {
        if (!is_name($contact_name))
        {
            Console::Log::error("Ошибка, неправильный формат имени контакта!");
            return false;
        } 

        if (!is_number($contact_number))
        {
            Console::Log::error("Ошибка, неправильный формат номера контакта!");
            return false;
        }

        return true;
    }

    public function is_name($contact_name)
    {
        if (length($contact_name) == 0 or length($contact_name) >= 101)
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