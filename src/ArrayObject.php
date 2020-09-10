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

    /**
     * Retourne les valeurs d'une colonne d'un tableau d'entrée
     * @param mixed $column_key La colonne de valeurs à retourner. Cette valeur peut être la clé entière de la colonne
     *     que vous souhaitez récupérer, ou bien le nom de la clé pour un tableau associatif ou le nom de la propriété.
     *     Il peut aussi valoir NULL pour retourner le tableau complet ou des objets (ceci peut être utile en
     *     conjonction du paramètre index_key pour ré-indexer le tableau).
     * @param mixed $index_key La colonne à utiliser comme index/clé pour le tableau retourné. Cette valeur peut être
     *     la clé entière de la colonne, ou le nom de la clé. La valeur est cast comme d'habitude pour les clés du
     *     tableau (cependant, les objects qui supportent une conversion en chaîne de charactère sont aussi autorisé).
     * @return \Helper\ArrayObject<mixed>
     */
    public function column($column_key, $index_key = null): self
    {
        $a = $this->getArrayCopy();
        return new self(array_column($a, $column_key, $index_key));
    }

    /**
     * Crée un tableau à partir de deux autres tableaux
     * @param mixed[] $values Tableau de valeurs à utiliser
     * @param bool $isKey Indique si le tableau _values_ doit être utilisé comme tableau de clé
     * @return \Helper\ArrayObject<mixed,mixed>
     */
    public function combine(array $values, bool $isKey = false): self
    {
        $a = $this->getArrayCopy();
        return $isKey ? new self(array_combine($values, $a)) : new self(array_combine($a, $values));
    }

    /**
     * Compte le nombre de valeurs d'un tableau
     * @return \Helper\ArrayObject<mixed,mixed>
     */
    public function countValues(): self
    {
        $a = $this->getArrayCopy();
        return new self(array_count_values($a));
    }

    /**
     * Calcule la différence de deux tableaux, en prenant aussi en compte les clés
     * @param mixed[] $array Le tableau à comparer
     * @param mixed[] ...$other Plus de tableaux à comparer
     * @return \Helper\ArrayObject<mixed>
     */
    public function diffAssoc(array $array, array ...$other): self
    {
        $a = $this->getArrayCopy();
        return new self(array_diff_assoc($a, $array, ...$other));
    }

    /**
     * Calcule la différence de deux tableaux en utilisant les clés pour comparaison
     * @param mixed[] $array Le tableau à comparer
     * @param mixed[] ...$other Plus de tableaux à comparer
     * @return \Helper\ArrayObject<mixed>
     */
    public function diffKey(array $array, array ...$other): self
    {
        $a = $this->getArrayCopy();
        return new self(array_diff_key($a, $array, ...$other));
    }

    /**
     * Calcule la différence entre deux tableaux associatifs, à l'aide d'une fonction de rappel
     * @param callable $keyCompare La fonction de comparaison des clés
     * @param mixed[] $array Le tableau à comparer
     * @param mixed[] ...$other Plus de tableaux à comparer
     * @return \Helper\ArrayObject<mixed>
     */
    public function diffUAssoc(callable $keyCompare, array $array, array ...$other): self
    {
        $a = $this->getArrayCopy();
        $lastArgs = $other;
        $lastArgs[] = $keyCompare;
        return new self(array_diff_uassoc($a, $array, ...$lastArgs));
    }

    /**
     * Calcule la différence entre des tableaux avec vérification des index, compare les données avec une fonction de
     * rappel
     * @param callable $ValueCompare La fonction de comparaison des clés
     * @param mixed[] $array Le tableau à comparer
     * @param mixed[] ...$other Plus de tableaux à comparer
     * @return \Helper\ArrayObject<mixed>
     */
    public function uDiffAssoc(callable $ValueCompare, array $array, array ...$other): self
    {
        $a = $this->getArrayCopy();
        $lastArgs = $other;
        $lastArgs[] = $ValueCompare;
        return new self(array_udiff_assoc($a, $array, ...$lastArgs));
    }
}
