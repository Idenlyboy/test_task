<?php

namespace App\Models;


class User{
    protected array $contacts;
    protected string $data_path = "backend/Database/data.json";

    public function __construct()
    {
        $json_data = file_get_contents($this->data_path);

        if (json_validate($json_data))
        {
            $data = json_decode($json_data, true);
            $this->set_contacts($data);
        }
    }

    public function set_contacts($new_contacts_array)
    {
        $this->contacts = $new_contacts_array;
    }

    public function add_contact($contact_name, $contact_number)
    {
        $new_contact = [
            "name" => $contact_name,
            "number" => $contact_number
        ];

        array_push($this->contacts, $new_contact);
        $this->save();
    }

    public function remove_contact($contact_id)
    {
        unset($this->contacts[$contact_id]);
        $this->save();
        return;
    }

    public function id_exists($contact_id)
    {
        return in_array($contact_id, $this->contacts);
    }

    private function save()
    {
        $data = json_encode($this->contacts);
        $data_file = fopen($this->data_path, 'w');
        fwrite($data_file, $data);
        fclose($data_file);
    }

    public function get_contacts()
    {
        return $this->contacts;
    }
}