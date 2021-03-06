<?php

namespace Respect\Validation\Rules;

use DateTime;

class Date extends AbstractRule
{

    public $format = null;

    protected function formatDate(DateTime $date)
    {
        return $date->format($this->format);
    }

    public function __construct($format=null)
    {
        $this->format = $format;
    }

    public function validate($input)
    {
        if ($input instanceof DateTime)
            return true;
        elseif (!is_string($input))
            return false;
        elseif (is_null($this->format))
            return false !== strtotime($input);
        else
            return $input === date($this->format, strtotime($input));
    }

}
