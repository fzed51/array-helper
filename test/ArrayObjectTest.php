<?php


use Helper\ArrayObject;
use PHPUnit\Framework\TestCase;

/**
 * Class ArrayObjectTest
 */
class ArrayObjectTest extends TestCase
{
    /**
     * test de __construct
     */
    public function testConstruct(): void
    {
        $a = new ArrayObject();
        self::assertInstanceOf(ArrayObject::class, $a);
        self::assertInstanceOf(\ArrayObject::class, $a);
    }
}