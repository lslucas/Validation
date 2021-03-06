<?php

namespace Respect\Validation\Rules;

use Respect\Validation\ValidatorTestCase;
use Respect\Validation\Exceptions\InvalidException;

class AtLeastTest extends \PHPUnit_Framework_TestCase
{

    public function testValid()
    {
        $valid1 = new Callback(function() {
                    return true;
                });
        $valid2 = new Callback(function() {
                    return true;
                });
        $valid3 = new Callback(function() {
                    return false;
                });
        $o = new AtLeast(2, array($valid1, $valid2, $valid3));
        $this->assertTrue($o->assert('any'));
    }

    /**
     * @expectedException Respect\Validation\Exceptions\AtLeastException
     */
    public function testInvalid()
    {
        $valid1 = new Callback(function() {
                    return false;
                });
        $valid2 = new Callback(function() {
                    return false;
                });
        $valid3 = new Callback(function() {
                    return true;
                });
        $o = new AtLeast(2, array($valid1, $valid2, $valid3));
        $this->assertFalse($o->assert('any'));
    }

}