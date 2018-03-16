<?php

namespace App\Traits;
use Illuminate\Support\Facades\Crypt;

trait Encryptions
{

    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->encryptable))
        {
          if ($value) {
            $value = Crypt::encrypt($value);
          }
        }

        return parent::setAttribute($key, $value);
    }

    public function getAttribute($key)
    {
        if (in_array($key, $this->encryptable))
        {
          if ($this->attributes[$key]) {
            return Crypt::decrypt($this->attributes[$key]);
          }
        }

        return parent::getAttribute($key);
    }

    public function attributesToArray()
    {
        $attributes = parent::attributesToArray();

        foreach ($attributes as $key => $value)
        {
            if (in_array($key, $this->encryptable))
            {
              if ($value) {
                $attributes[$key] = Crypt::decrypt($value);
              }
            }
        }

        return $attributes;
    }
  }
