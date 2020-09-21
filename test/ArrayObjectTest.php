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
        $array = new ArrayObject($o);
        $a = $array->changeKeyCase()->getArrayCopy();
        self::assertEquals($e, $a);
        self::assertNotEquals($o, $a);
    }

    /**
     * test de chunk
     */
    public function testChunk(): void
    {
        $o = [1, 2, 3, 4, 5];
        $e = array_chunk($o, 2);
        $array = new ArrayObject($o);
        $a = $array->chunk(2)->getArrayCopy();
        self::assertEquals($e, $a);
        self::assertNotEquals($o, $a);
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
        $array = new ArrayObject($o);
        $a = $array->map($callback)->getArrayCopy();
        self::assertEquals($e, $a);
        self::assertNotEquals($o, $a);
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
        $array = new ArrayObject($o);
        $a = $array->filter($callback)->getArrayCopy();
        self::assertEquals($e, $a);
        self::assertNotEquals($o, $a);
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
        $array = new ArrayObject($o);
        $a = $array->column('prenom')->getArrayCopy();
        self::assertEquals($e, $a);
        self::assertNotEquals($o, $a);
    }

    /**
     * test de combine
     */
    public function testCombine(): void
    {
        $o = ['d', 'e', 'f'];
        $array = new ArrayObject($o);
        $values = ['a', 'b', 'c'];
        $e = array_combine($o, $values);
        $e2 = array_combine($values, $o);
        $a = $array->combine($values)->getArrayCopy();
        $a2 = $array->combine($values, true)->getArrayCopy();
        self::assertEquals($e, $a);
        self::assertNotEquals($o, $a);
        self::assertEquals($e2, $a2);
        self::assertNotEquals($o, $a2);
    }

    /**
     * test de countValues
     */
    public function testCountValues(): void
    {
        $o = ['d', 'e', 'f', 'e', 'd', 'e'];
        $array = new ArrayObject($o);
        $e = array_count_values($o);
        $a = $array->countValues()->getArrayCopy();
        self::assertEquals($e, $a);
        self::assertNotEquals($o, $a);
    }

    /**
     * test de diffAssoc
     */
    public function testDiffAssoc(): void
    {
        $o = ['a' => 'vert', 'b' => 'marron', 'c' => 'bleu', 'rouge'];
        $array = new ArrayObject($o);
        $arr = ['a' => 'vert', 'jaune', 'rouge'];
        $e = array_diff_assoc($o, $arr);
        $a = $array->diffAssoc($arr)->getArrayCopy();
        self::assertEquals($e, $a);
        self::assertNotEquals($o, $a);
    }

    /**
     * test de deffKey
     */
    public function testDiffKey(): void
    {
        $o = ['a' => 1, 'b' => 2, 'c' => 3];
        $t = ['c' => 4, 'e' => 5];
        $array = new ArrayObject($o);
        $e = array_diff_key($o, $t);
        $a = $array->diffKey($t)->getArrayCopy();
        self::assertEquals($e, $a);
        self::assertNotEquals($o, $a);
    }

    /**
     * test de diffUAssoc
     */
    public function testDiffUAssoc(): void
    {
        $call = function ($key1, $key2) {
            if ($key1 === $key2) {
                return 0;
            }
            return $key1 > $key2 ? 1 : -1;
        };
        $o = ['a' => 1, 1, 'b' => 2, 'c' => 3, 2];
        $array = new ArrayObject($o);
        $t = ['c' => 3, 'd' => 5, 1];
        $t2 = ['a' => 6, 4, 5];
        $e = array_diff_uassoc($o, $t, $call);
        $a = $array->diffUAssoc($call, $t)->getArrayCopy();
        self::assertEquals($e, $a);
        self::assertNotEquals($o, $a);
        $e2 = array_diff_uassoc($o, $t, $t2, $call);
        $a2 = $array->diffUAssoc($call, $t, $t2)->getArrayCopy();
        self::assertEquals($e2, $a2);
        self::assertNotEquals($o, $a2);
    }

    /**
     * test de uDiffAssoc
     */
    public function testUDiffAssoc(): void
    {
        $call = function ($key1, $key2) {
            if ($key1 === $key2) {
                return 0;
            }
            return $key1 > $key2 ? 1 : -1;
        };
        $o = ['a' => 1, 1, 'b' => 2, 'c' => 3, 2];
        $array = new ArrayObject($o);
        $t = ['c' => 3, 'd' => 5, 1];
        $e = array_udiff_assoc($o, $t, $call);
        $a = $array->uDiffAssoc($call, $t)->getArrayCopy();
        self::assertEquals($e, $a);
        self::assertNotEquals($o, $a);
    }

    /**
     * test de uDiffUAssoc
     */
    public function testUDiffUAssoc(): void
    {
        $call = function ($key1, $key2) {
            if ($key1 === $key2) {
                return 0;
            }
            return $key1 > $key2 ? 1 : -1;
        };
        $o = ['a' => 1, 1, 'b' => 2, 'c' => 3, 2];
        $array = new ArrayObject($o);
        $t = ['c' => 3, 'd' => 5, 1];
        $e = array_udiff_assoc($o, $t, $call);
        $a = $array->uDiffUAssoc($call, $call, $t)->getArrayCopy();
        self::assertEquals($e, $a);
        self::assertNotEquals($o, $a);
    }

    /**
     * test de diffUKey
     */
    public function testDiffUKey(): void
    {
        $call = function ($key1, $key2) {
            if ($key1 === $key2) {
                return 0;
            }
            return $key1 > $key2 ? 1 : -1;
        };
        $o = ['a' => 1, 1, 'b' => 2, 'c' => 3, 2];
        $array = new ArrayObject($o);
        $t = ['c' => 3, 'd' => 5, 1];
        $e = array_udiff_assoc($o, $t, $call);
        $a = $array->diffUKey($call, $t)->getArrayCopy();
        self::assertEquals($e, $a);
        self::assertNotEquals($o, $a);
    }

    /**
     * test de fill
     */
    public function testFill(): void
    {
        $e = array_fill(0, 5, 'a');
        $a = ArrayObject::fill(0, 5, 'a')->getArrayCopy();
        self::assertEquals($e, $a);
    }

    /**
     * test de fillKey
     */
    public function testFillKey(): void
    {
        $e = array_fill_keys(['a', 'b', 'c'], 'a');
        $a = ArrayObject::fillKey(['a', 'b', 'c'], 'a')->getArrayCopy();
        self::assertEquals($e, $a);
    }

    /**
     * test de flip
     */
    public function testFlip(): void
    {
        $o = ['a' => 1, 'b' => 2, 'c' => 3];
        $array = new ArrayObject($o);
        $e = array_flip($o);
        $a = $array->flip()->getArrayCopy();
        self::assertEquals($e, $a);
        self::assertNotEquals($o, $a);
    }

    /**
     * test de diff
     */
    public function testDiff(): void
    {
        $o = ['a' => 1, 'b' => 2, 'c' => 3];
        $t = ['a' => 3, 'b' => 4];
        $array = new ArrayObject($o);
        $e = array_diff($o, $t);
        $a = $array->diff($t)->getArrayCopy();
        self::assertEquals($e, $a);
        self::assertNotEquals($o, $a);
    }
}
