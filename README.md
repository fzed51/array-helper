# array-helper

Classe de manipulation de tableau. Permet d'utiliser les fonction de base des tableau de maniere POO.
Cette classe applique le principe d'immutabilité.

## Installation

Installation simple dans votre projet avec composer

```bash
composer require fzed51/array-helper
```

## Instanciation

```php
<?php
$array = new \Helper\ArrayObject([]);
```

## Liste des méthodes héritée des fonctions d'origine

- `array_change_key_case`

  Change la casse de toutes les clés d'un tableau
  ```php
      $array = new \Helper\ArrayObject(['Abc'=>1]);
      $array = $array->changeKeyCase(); // ['abc'=>1]
  ```
  **changeKetCase** ( [_int_ $case = CASE_LOWER]) : _\Helper\ArrayObject_
  - case : Soit CASE_UPPER (majuscules), soit CASE_LOWER (minuscules, valeur par défaut)

- `array_chunk`

  Sépare un tableau en tableaux de taille inférieure
  ```php
      $array = new \Helper\ArrayObject([1,2,3]);
      $array = $array->chunk(2); // [[1,2],[3]]
  ```
  **chunk** ( _int_ $size, _bool_ $preserve_keys = FALSE) : _\Helper\ArrayObject_
  - size : La taille de chaque tableau
  - preserve_keys : Lorsque définit à TRUE, les clés seront préservées. Par défaut, vaut FALSE ce qui réindexera le tableau résultant numériquement

- `array_column`

  Retourne les valeurs d'une colonne d'un tableau d'entrée
  ```php
      $array = new \Helper\ArrayObject([
          ['id'=>1, 'nom'=>'jean'],
          ['id'=>2, 'nom'=>'marie'],
      ]);
      $array = $array->column('nom'); // ['jean','marie']
  ```
  **column** ( _mixed_ $column_key, _mixed_ $index_key = NULL) : _\Helper\ArrayObject_
  - column_key : La colonne de valeurs à retourner. Cette valeur peut être la clé entière de la colonne que vous souhaitez récupérer, ou bien le nom de la clé pour un tableau associatif ou le nom de la propriété. Il peut aussi valoir NULL pour retourner le tableau complet ou des objets (ceci peut être utile en conjonction du paramètre index_key pour ré-indexer le tableau).
  - index_key : La colonne à utiliser comme index/clé pour le tableau retourné. Cette valeur peut être la clé entière de la colonne, ou le nom de la clé. La valeur est cast comme d'habitude pour les clés du tableau (cependant, les objects qui supportent une conversion en chaîne de charactère sont aussi autorisé).
  
- `array_combine`

  Crée un tableau à partir de deux autres tableaux
  ```php
      $array = new \Helper\ArrayObject(['d','e','f']);
      $values = ['a','b','c'];
      $array = $array->combine($values); // ['d'=>'a','e'=>'b','f'=>'c']
      $array = $array->combine($values,true); // ['a'=>'d','b'=>'e','c'=>'f']
  ```
  **combine** ( _array_ $values, _bool_ $isKey = FALSE) : _\Helper\ArrayObject_
  - values : Tableau de valeurs à utiliser
  - isKey : Indique si le tableau _values_ doit être utilisé comme tableau de clé
  
- `array_count_values`

  Compte le nombre de valeurs d'un tableau
  ```php
      $array = new \Helper\ArrayObject([1,"hello",1,"world","hello"]);
      $array = $array->countValues(); // [1=> 2,"hello"=>2,"world"=>1]
  ```
  **countValues** () : _\Helper\ArrayObject_

- `array_diff`

  Calcule la différence entre des tableaux
  ```php
      $array = new \Helper\ArrayObject(['a'=>'green','red','blue','red']);
      $array = $array->diff(['b'=>'green','yellow','red']); // ['blue']
  ```
  **diff** (_array_ $array , _array_ $...) : _\Helper\ArrayObject_
  - array : Le tableau avec lequel comparer
  - ... : Plus de tableaux avec lesquels comparer

- `array_udiff`

  Calcule la différence entre deux tableaux en utilisant une fonction rappel
  ```php
      $call = function ($key1, $key2) { return $key1 === $key2 ? 0 : (($key1 > $key2) ? 1 : -1); };
      $array = new \Helper\ArrayObject(['a'=>'green','red','blue','red']);
      $array = $array->uDiff($call,['b'=>'green','yellow','red']); // ['blue']
  ```
  **uDiff** (_callable_ $valueCompare, _array_ $array , _array_ $...) : _\Helper\ArrayObject_
  - valueCompare : La fonction de comparaison, doit retourner un nombre <0, =0 ou >0
  - array : Le tableau avec lequel comparer
  - ... : Plus de tableaux avec lesquels comparer
    
- `array_diff_assoc`
  
  Calcule la différence de deux tableaux, en prenant aussi en compte les clés
  ```php
      $array = new \Helper\ArrayObject([1,'a'=>'b',2,'c'=>'d']);
      $array = $array->diffAssoc([1,4,'a'=>'b',2]); // [2,'c'=>'d']
  ```
  **diffAssoc** (_array_ $array , _array_ $...) : _\Helper\ArrayObject_
  - array : Le tableau à comparer
  - ... : Plus de tableaux à comparer

- `array_diff_uassoc`

  Calcule la différence entre deux tableaux associatifs, à l'aide d'une fonction de rappel
  ````php
    $call = function ($key1, $key2) { return $key1 === $key2 ? 0 : (($key1 > $key2) ? 1 : -1); };
    $array = new \Helper\ArrayObject(['a'=>1,1,'b'=>2,'c'=>3,2]);
    $array = $array->diffUAssoc($call,['c'=>4,'d'=>5,3]); // ['a'=>1,'b'=>2,2]
  ````
    **diffUAssoc** (_callable_ $keyCompare, _array_ $array , _array_ $...) : _\Helper\ArrayObject_
    - keyCompare : La fonction de comparaison doit retourner un entier inférieur à, égal à, ou supérieur à 0 si le premier argument est considéré comme, respectivement, inférieur à, égal à, ou supérieur au second.
    - array : Le tableau à comparer
    - ... : Plus de tableaux à comparer

- `array_udiff_assoc`

  Calcule la différence entre des tableaux avec vérification des index, compare les données avec une fonction de rappel
  ````php
    $call = function ($key1, $key2) { return $key1 === $key2 ? 0 : (($key1 > $key2) ? 1 : -1); };
    $array = new \Helper\ArrayObject(['a'=>1,1,'b'=>2,'c'=>3,2]);
    $array = $array->uDiffAssoc($call,['c'=>4,'d'=>5,3]); // ['a'=>1,'b'=>2,2]
  ````
  **uDiffAssoc** (_callable_ $valueCompare, _array_ $array , _array_ $...) : _\Helper\ArrayObject_
  - valueCompare : La fonction de comparaison doit retourner un entier inférieur à, égal à, ou supérieur à 0 si le premier argument est considéré comme, respectivement, inférieur à, égal à, ou supérieur au second.
  - array : Le tableau à comparer
  - ... : Plus de tableaux à comparer
  
- `array_udiff_uassoc`

  Calcule la différence de deux tableaux associatifs, compare les données et les index avec une fonction de rappel
  ````php
    $callKey = function ($key1, $key2) { return $key1 === $key2 ? 0 : (($key1 > $key2) ? 1 : -1); };
    $callVal = function ($key1, $key2) { return $key1 === $key2 ? 0 : (($key1 > $key2) ? 1 : -1); };
    $array = new \Helper\ArrayObject(['a'=>1,1,'b'=>2,'c'=>3,2]);
    $array = $array->uDiffUAssoc($callVal,$callKey,['c'=>4,'d'=>5,3]); // ['a'=>1,'b'=>2,2]
  ````
  **uDiffUAssoc** (_callable_ $valueCompare, _callable_ $keyCompare, _array_ $array , _array_ $...) : _\Helper\ArrayObject_
  - valueCompare : La fonction de comparaison doit retourner un entier inférieur à, égal à, ou supérieur à 0 si le premier argument est considéré comme, respectivement, inférieur à, égal à, ou supérieur au second.
  - keyCompare : La fonction de comparaison doit retourner un entier inférieur à, égal à, ou supérieur à 0 si le premier argument est considéré comme, respectivement, inférieur à, égal à, ou supérieur au second.
  - array : Le tableau à comparer
  - ... : Plus de tableaux à comparer

- `array_diff_key`
  
  Calcule la différence de deux tableaux en utilisant les clés pour comparaison
  ```php
      $array = new \Helper\ArrayObject(['a'=>1,'b'=>2,'c'=>3]);
      $array = $array->diffKey(['c'=>4,'e'=>5]); // ['a'=>1,'b'=>2]
  ```
  **diffKey** (_array_ $array , _array_ $...) : _\Helper\ArrayObject_
  - array : Le tableau à comparer
  - ... : Plus de tableaux à comparer

- `array_diff_ukey`

  Calcule la différence entre deux tableaux en utilisant une fonction de rappel sur les clés pour comparaison
  ```php
      $call = function ($key1, $key2) { return $key1 === $key2 ? 0 : (($key1 > $key2) ? 1 : -1); };
      $array = new \Helper\ArrayObject(['a'=>1,'b'=>2,'c'=>3]);
      $array = $array->diffUKey($call,['c'=>4,'e'=>5]); // ['a'=>1,'b'=>2]
  ```
  **diffUKey** (_callable_ $keyCompare, _array_ $array , _array_ $...) : _\Helper\ArrayObject_
  - keyCompare : La fonction de comparaison doit retourner un entier inférieur à, égal à, ou supérieur à 0 si le premier argument est considéré comme, respectivement, inférieur à, égal à, ou supérieur au second.
  - array : Le tableau à comparer
  - ... : Plus de tableaux à comparer

- `array_fill`

  Remplit un tableau avec une même valeur
  ```php
      $array = \Helper\ArrayObject::fill(0,5,'a'); // ['a','a','a','a','a']
  ```
  **fill** ( _int_ $startIndex , _int_ $nbElement , _mixed_ $value ) : _\Helper\ArrayObject_
  - startIndex : Le premier index du tableau retourné.
  - nbElement : Nombre d'éléments à insérer. Doit être supérieur ou égal à zéro.
  - value : Valeur à utiliser pour remplir le tableau 

- `array_fill_keys`

  Remplit un tableau avec des valeurs, en spécifiant les clés
  ```php
      $array = \Helper\ArrayObject::fillKey(['a','b','c'],'a'); // ['a'=>'a','b'=>'a','c'=>'a']
  ```
  **fillKey** ( _array_ $keys , _mixed_ $value ) : _\Helper\ArrayObject_
  - keys : Tableau de valeurs qui sera utilisé comme clés. Les valeurs illégales pour les clés seront converties en chaînes de caractères.
  - value : Valeur à utiliser pour remplir le tableau
  
- `array_filter`
 
  ```php
      $array = new \Helper\ArrayObject([1,2,3,4]);
      $array = $array->map(function($i){return $i>2;}); // [3,4]
  ```
  **filter** ( [_callable_ $callback [, _int_ $flag = 0 ]] ) : _\Helper\ArrayObject_
  - callback : La fonction de rappel à utiliser  
  - flag : Drapeau indiquant quels sont les arguments à envoyer à la fonction de rappel callback :
    - `ARRAY_FILTER_USE_KEY` - passer la clé comme seul argument à callback au lieu de la valeur.
    - `ARRAY_FILTER_USE_BOTH` - passer à la fois la valeur et la clé comme arguments de callback au lieu de la valeur.

- `array_flip`

  Remplace les clés par les valeurs, et les valeurs par les clés
  ```php
      $array = new \Helper\ArrayObject(['a'=>'b', 'c'=>'d']);
      $array = $array->flip(); // ['b'=>'a', 'd'=>'c']
  ```
  **flip** () : _\Helper\ArrayObject_

- `array_intersect`

- `array_uintersect`

- `array_intersect_assoc`

- `array_uintersect_assoc`
  
- `array_uintersect_uassoc`

- `array_intersect_uassoc`

- `array_intersect_key`

- `array_intersect_ukey`

- `array_key_exists`

- `array_key_first`

- `array_key_last`

- `array_keys`

- `array_map`
 
  ```php
      $array = new \Helper\ArrayObject([['id'=>1],['id'=>2]]);
      $array = $array->map(function($i){return $i['id'];}); // [1,2]
  ```
  **array_map** ( _callable_ $callback [, _array_ $... ] ) : _\Helper\ArrayObject_
  - array1 : Un tableau à exécuter via la fonction de rappel callback.
  - ... : Liste variable d'arguments tableaux supplémentaires à exécuter via la fonction de rappel callback.

- `array_merge_recursive`

- `array_merge`

- `array_multisort`

- `array_pad`

- `array_pop`

- `array_product`

- `array_push`

- `array_rand`

- `array_reduce`

- `array_replace_recursive`

- `array_replace`

- `array_reverse`

- `array_search`

- `array_shift`

- `array_slice`

- `array_splice`

- `array_sum`

- `array_unique`

- `array_unshift`

- `array_values`

- `array_walk_recursive`

- `array_walk`

- `array`

- `arsort`

- `asort`

- `compact`

- `count`

- `current`

- `end`

- `extract`

- `in_array`

- `key_exists`

- `key`

- `krsort`

- `ksort`

- `list`

- `natcasesort`

- `natsort`

- `next`

- `pos`

- `prev`

- `range`

- `reset`

- `rsort`

- `shuffle`

- `sizeof`

- `sort`

- `uasort`

- `uksort`

- `usort`
