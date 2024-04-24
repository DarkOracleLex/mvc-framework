<?php

namespace App\Services;

class JsonService
{
    private static function getDecodedJson()
    {
        return json_decode(file_get_contents(appPath() . '/../storage/db.json'));
    }

    public static function all()
    {
        return self::getDecodedJson()->contacts;
    }

    public function getOne(int $id)
    {
        $contacts = self::all();

        return $contacts[(string)$id];
    }

    public static function create()
    {
        $json = self::getDecodedJson();

        $id = ++$json->id;

        $json->contacts->$id = [
            'name' => $_POST['name'],
            'phone' => $_POST['phone'],
        ];

        file_put_contents(appPath() . '/../storage/db.json', json_encode($json));
    }

    public static function delete(int $id): void
    {
        $json = self::getDecodedJson();

        $id = (string)$id;

        if (isset($json->contacts->$id)) {
            unset($json->contacts->$id);
        } else {
            abort(404);
        }

        file_put_contents(appPath() . '/../storage/db.json', json_encode($json));
    }
}