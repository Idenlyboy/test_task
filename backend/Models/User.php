<?php

namespace backend\Models;


use Models\Contact;

class User{
    private $contacts = [];
    private $data_path = '';

    public function __construct()
    {
        $this->$data_path = 'Database\data.json';
        $json_data = file_get_contents($data_path);

        if (json_validate($json_data))
        {
            $data = json_decode($json_data, false);
            $this->$contacts = $data;
            return;
        }
        Console::Log::error("Ошибка! Невалидный формат сохранённых данных!");
    }

    public function add_contact($contact_name, $contact_number)
    {
        $new_contact = new Contact;

        $new_contact->$name = $contact_name;
        $new_contact->$number = $contact_number;

        $this->$contacts->array_push($new_contact);
        $this->save();
    }

    public function remove_contact($contact_id)
    {
        unset($this->$contacts[$contact_id]);
        $this->save();
        return;
    }

    public function id_exists($contact_id)
    {
        return in_array($contact_id, $this->$contacts);
    }

    private function save()
    {
        $data = json_encode($contacts);
        $data_file = fopen($this->$data_path, 'w');
        fwrite($data_file, $data);
        fclose($data_file);
    }

    public function get_contacts()
    {
        return $this->$contacts;
    }
}