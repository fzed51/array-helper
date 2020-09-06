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
     * @param mixed[] $input
     */
    public function __construct($input = [])
    {
        parent::__construct($input);
    }

    /**
     * Change la casse de toutes les clés d'un tableau
     * @param int $case Soit CASE_UPPER (majuscules), soit CASE_LOWER (minuscules, valeur par défaut)
     * @return \Helper\ArrayObject<mixed>
     */
    public function changeKeyCase(int $case = CASE_LOWER): self
    {
        $a = $this->getArrayCopy();
        return new self(array_change_key_case($a, $case));
    }

    /**
     * Sépare un tableau en tableaux de taille inférieure
     * @param int $size La taille de chaque tableau
     * @param bool $preserve_keys Lorsque définit à TRUE, les clés seront préservées. Par défaut, vaut FALSE ce qui
     *     réindexera le tableau résultant numériquement
     * @return \Helper\ArrayObject<mixed>
     */
    public function chunk(int $size, bool $preserve_keys = false): self
    {
        $a = $this->getArrayCopy();
        return new self(array_chunk($a, $size, $preserve_keys));
    }

    /**
     * Applique une fonction sur les éléments d'un tableau
     * @param callable $callback La fonction de rappel à exécuter pour chaque élément de chaque tableau.
     * @param array[] ...$other Liste variable d'arguments tableaux supplémentaires à exécuter via la fonction de
     *     rappel callback.
     * @return \Helper\ArrayObject<mixed>
     */
    public function map(callable $callback, array ...$other): self
    {
        $a = $this->getArrayCopy();
        return new self(array_map($callback, $a, ...$other));
    }


    /**
     * Filtre les éléments d'un tableau grâce à une fonction de rappel
     * @param callable $callback La fonction de rappel à utiliser.
     * @param int $flag Drapeau indiquant quels sont les arguments à envoyer à la fonction de rappel callback
     * @return \Helper\ArrayObject<mixed>
     */
    public function filter(callable $callback, int $flag = 0): self
    {
        $a = $this->getArrayCopy();
        return new self(array_filter($a, $callback, $flag));
    }
}
