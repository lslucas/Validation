<?php

namespace Respect\Validation\Exceptions;

class NoneOfException extends AbstractNestedException
{

    public static $defaultTemplates = array(
        self::STANDARD => 'None of these rules must pass for {{name}}',
    );
    

}
