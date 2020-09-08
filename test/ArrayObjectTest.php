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

    /**
     * test de Column
     */
    public function testColumn(): void
    {
        $o = [[
            'id' => 2135,
            'prenom' => 'John',
        ], [
            'id' => 3245,
            'prenom' => 'Sally',
        ], [
            'id' => 5342,
            'prenom' => 'Jane',
        ], [
            'id' => 5623,
            'prenom' => 'Peter',
        ]];
        $e = array_column($o, 'prenom');
        $a = new ArrayObject($o);
        self::assertEquals($e, $a->column('prenom')->getArrayCopy());
    }

    /**
     * test de combine
     */
    public function testCombine(): void
    {
        $o = ['d', 'e', 'f'];
        $array = new \Helper\ArrayObject($o);
        $values = ['a', 'b', 'c'];
        self::assertEquals(array_combine($o, $values), $array->combine($values)->getArrayCopy());
        self::assertEquals(array_combine($values, $o), $array->combine($values, true)->getArrayCopy());
    }

    /**
     * test de countValues
     */
    public function testCountValues(): void
    {
        $o = ['d', 'e', 'f', 'e', 'd', 'e'];
        $array = new \Helper\ArrayObject($o);
        $e = array_count_values($o);
        self::assertEquals($e, $array->countValues()->getArrayCopy());
    }

    /**
     * test de diffAssoc
     */
    public function testDiffAssoc(): void
    {
        $o = ['a' => 'vert', 'b' => 'marron', 'c' => 'bleu', 'rouge'];
        $array = new \Helper\ArrayObject($o);
        $arr = ['a' => 'vert', 'jaune', 'rouge'];
        $e = array_diff_assoc($o, $arr);
        self::assertEquals($e, $array->diffAssoc($arr)->getArrayCopy());
    }
}
