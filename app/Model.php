<!-- Model -->

<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\Crypt;

class Model extends Eloquent
{
    protected $guarded = [];

    protected $encrypted;

    public function getAttribute($key)
    {
        if (array_key_exists($key, array_flip($this->encrypted)))
        {
            return Crypt::decrypt(parent::getAttribute($key));
        }

        return parent::getAttribute($key);
    }

    public function setAttribute($key, $value)
    {
        if (array_key_exists($key, array_flip($this->encrypted)))
        {
            parent::setAttribute($key, Crypt::encrypt($value));
            return;
        }

        parent::setAttribute($key, $value);
    }
}
