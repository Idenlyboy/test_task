<?php

namespace Controllers;

use Models\User;
use Validations\ControllersValidations\ContactValidation\Validation;

class ContactController
{
    private Validation $validator;
    private User $user;

    public function create()
    {
        $this->$user = new User();
        $contacts = $this->$user->get_contacts();
    }
        
    public function store(Request $request)
    {
        $contact_name = $request->input('contact_name');
        $contact_number = $request->input('contact_number');

        if ($validator->validated($contact_name, $contact_number))
        {
            $this->$user->add_contact($contact_name, $contact_number);
            return;
        }

        Console::Log::error("Ошибка при добавлении контакта!");
    }

    public function delete(Request $request)
    {
        $contact_id = $request->input('contact_id');
        
        if ($this->$user->id_exists($contact_id))
        {
            $this->$user->remove_contact($contact_id);
            return;
        }
        Console::Log::error("Ошибка, данный контакт не существует!");
    }
}

