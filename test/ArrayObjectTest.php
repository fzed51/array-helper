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

    /**
     * test de changeKeyCase
     */
    public function testChangeKeyCase(): void
    {
        $o = ['Aze' => 1];
        $e = array_change_key_case($o);
        $a = new ArrayObject($o);
        self::assertEquals($e, $a->changeKeyCase()->getArrayCopy());
    }

    /**
     * test de chunk
     */
    public function testChunk(): void
    {
        $o = [1, 2, 3, 4, 5];
        $e = array_chunk($o, 2);
        $a = new ArrayObject($o);
        self::assertEquals($e, $a->chunk(2)->getArrayCopy());
    }
}