<?php
declare(strict_types=1);
/**
 * @author Fabien Sanchez
 * @ceatedAt 2020-09-06
 */

namespace Helper;

/**
 * Class ArrayObject
 * @package Helper
 */
class ArrayObject extends \ArrayObject
{
    /**
     * ArrayObject constructor.
     * @param array $input
     */
    public function __construct($input = [])
    {
        parent::__construct($input);
    }

    /**
     * Change la casse de toutes les clés d'un tableau
     * @param int $case Soit CASE_UPPER (majuscules), soit CASE_LOWER (minuscules, valeur par défaut)
     * @return \Helper\ArrayObject
     */
    public function changeKeyCase(int $case = CASE_LOWER): self
    {
        $a = $this->getArrayCopy();
        return new self(array_change_key_case($a, $case));
    }

    /**
     * Sépare un tableau en tableaux de taille inférieure
     * @param int $size La taille de chaque tableau
     * @param bool $preserve_keys
     * @return $this Lorsque définit à TRUE, les clés seront préservées. Par défaut, vaut FALSE ce qui réindexera le
     *     tableau résultant numériquement
     */
    public function chunk(int $size, bool $preserve_keys = false): self
    {
        $a = $this->getArrayCopy();
        return new self(array_chunk($a, $size, $preserve_keys));
    }

    
}
