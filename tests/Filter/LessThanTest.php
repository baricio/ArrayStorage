<?php

namespace PHPFluent\ArrayStorage\Filter;

use DateTime;

/**
 * @covers PHPFluent\ArrayStorage\Filter\LessThan
 */
class LessThanTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldAcceptMaximumOnConstructor()
    {
        $maximum = 10;

        $filter = new LessThan($maximum);

        $this->assertAttributeSame($maximum, 'maximum', $filter);
    }

    public function testShouldValidateWhenInInterval()
    {
        $maximum = DateTime::createFromFormat('Y-m-d', '2014-03-01');
        $input = DateTime::createFromFormat('Y-m-d', '2014-02-01');

        $filter = new LessThan($maximum);

        $this->assertTrue($filter->isValid($input));
    }

    public function testShouldValidateWhenOutOfInterval()
    {
        $filter = new LessThan(10);

        $this->assertFalse($filter->isValid(11));
    }
}
