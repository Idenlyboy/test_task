<?php

namespace App\Controllers;

use App\Models\User;
use App\Validations\ContactValidation;

class ContactController
{
    protected ContactValidation $validator;
    protected User $user;

    public function __construct() {
        $this->user = new User();
        $this->validator = new ContactValidation;
    }

    public function main()
    {
        return '<a href="frontend/main.php"></a>';
    }

    public function create()
    {
        $contacts = $this->user->get_contacts();
        return $contacts;
    }
        
    public function store($contact_name, $contact_number)
    {
        //$contact_name = $_POST->input('contact_name');
        //$contact_number = $_POST->input('contact_number');

        if ($this->validator->validated($contact_name, $contact_number))
        {
            $this->user->add_contact($contact_name, $contact_number);
            return;
        }
    }

    public function delete($contact_id)
    {
        
        if ($this->user->id_exists($contact_id))
        {
            $this->user->remove_contact($contact_id);
            return;
        }
    }
}

