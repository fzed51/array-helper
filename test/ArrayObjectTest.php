<?php
/** @noinspection StaticClosureCanBeUsedInspection */
declare(strict_types=1);
/**
 * @author Fabien Sanchez
 * @ceatedAt 2020-09-06
 */

namespace Test;

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

    /**
     * test de map
     */
    public function testMap(): void
    {
        $o = [
            ['id' => 1],
            ['id' => 2],
            ['id' => 3],
            ['id' => 4],
        ];
        $callback = function ($item) {
            return $item['id'];
        };
        $e = array_map($callback, $o);
        $a = new ArrayObject($o);
        self::assertEquals($e, $a->map($callback)->getArrayCopy());
    }

    /**
     * test de filter
     */
    public function testFilter(): void
    {
        $o = [1, 2, 3, 4, 5];
        $callback = function ($item) {
            return $item > 2;
        };
        $e = array_filter($o, $callback);
        $a = new ArrayObject($o);
        self::assertEquals($e, $a->filter($callback)->getArrayCopy());
    }
}
