<?php

namespace App\Traits;

trait HasEnum
{
    /**
     * Set a given attribute on the model.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return mixed
     */
    public function setAttribute($key, $value)
    {
        if ($enum = self::getEnum($key)) {
            $value = Str::singular($value);
            $id = array_search($value, constant("self::$enum"));
            if ($id) {
                $this->attributes[$key] = $id;
                return $this;
            }
        } else {

            return parent::setAttribute($key, $value);
        }

    }
    /**
     * Get an attribute from the model.
     *
     * @param  string  $key
     * @return mixed
     */
    public function getAttribute($key)
    {
        if ($enum = self::getEnum($key)) {
            return constant("self::$enum")[$this->attributes[$key]];
        }

        $keyWithoutIdAtTheEnd = rtrim($key, '_id');
        if(self::getEnum($keyWithoutIdAtTheEnd)) {
            return $this->attributes[$keyWithoutIdAtTheEnd];
        }

        return parent::getAttribute($key);
    }
    /**
     * Handle dynamic method calls into the model.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public static function __callStatic($method, $parameters)
    {
        $pattern = '/^get(([A-Z][a-z]+)+)I[dD]$/';
        if( preg_match($pattern, $method, $matches) ) {
            $key = Str::snake($matches[1]);
            if ($enum = self::getEnum($key)) {
                $value = strtolower($parameters[0]);
                $value = Str::singular($value);

                return array_search($value, constant("self::$enum") );
            }
        }
        return parent::__callStatic($method, $parameters);
    }
    /**
     * Get the enum.
     *
     * @param  string  $key
     * @return enum
     */
    public static function getEnum($key)
    {
        return array_search($key, self::$enums);
    }
}
