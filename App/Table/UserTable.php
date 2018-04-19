<?php

namespace App\Table;

use Core\Table\Table;


class UserTable extends Table {


    protected $table = 'membre';


    public function getUsername($id) {

        $author = $this->query("SELECT first_name, last_name FROM {$this->table} WHERE id = ?", [$id]);
        $author = $author[0]->first_name . ' ' . $author[0]->last_name;
        return $author;
    }


    public function createMember($f_name, $l_name, $email, $pass) {

        $hashedPass = $this->hashPass($pass);

        $res = $this->create([
            'first_name' => $f_name,
            'last_name'  => $l_name,
            'email'      => $email,
            'password'   => $hashedPass
        ]);

        return $res;
    }


    private function hashPass($pass) {

        /*
         * Chiffre le mot de passe
         * @return hash
        */

        $options = [
            'cost' => 11,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        ];
        return password_hash($pass, PASSWORD_BCRYPT, $options);
    }

}
