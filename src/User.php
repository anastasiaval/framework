<?php

namespace src;

class User {

    public $email;

    public function setEmail($dirtyEmail) {
        $this->email = Sanitizer::email($dirtyEmail);
    }

}

