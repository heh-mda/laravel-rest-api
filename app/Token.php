<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    public function generate()
    {
        $this->token = str_random(80);
        $this->save();

        return $this->token;
    }
}
