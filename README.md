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

  ```php
      $array = new \Helper\ArrayObject(['Abc'=>1]);
      $array = $array->changeKetCase(); // ['abc'=>1]
  ```
  **changeKetCase** ( [_int_ $case = CASE_LOWER]) : _\Helper\ArrayObject_
  - case : Soit CASE_UPPER (majuscules), soit CASE_LOWER (minuscules, valeur par défaut)

- `array_chunk`

  ```php
      $array = new \Helper\ArrayObject([1,2,3]);
      $array = $array->chunk(2); // [[1,2],[3]]
  ```
  **chunk** ( _int_ $size, _bool_ $preserve_keys = FALSE) : _\Helper\ArrayObject_
  - size : La taille de chaque tableau
  - preserve_keys : Lorsque définit à TRUE, les clés seront préservées. Par défaut, vaut FALSE ce qui réindexera le tableau résultant numériquement

- `array_column`

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

  ```php
      $array = new \Helper\ArrayObject(['d','e','f']);
      $values = ['a','b','c'];
      $array = $array->combine($values); // ['d'=>'a','e'=>'b','f'=>'c']
      $array = $array->combine($values,true); // ['a'=>'d','b'=>'e','c'=>'f']
  ```
  **combine** ( _array_ $values, _bool_ $isKey = FALSE) : _\Helper\ArrayObject_
  values : Tableau de valeurs à utiliser
  isKey : Indique si le tableau _values_ doit être utilisé comme tableau de clé
  
- `array_count_values`

- `array_diff_assoc`

- `array_diff_key`

- `array_diff_uassoc`

- `array_diff_ukey`

- `array_diff`

- `array_fill_keys`

- `array_fill`

- `array_filter`
 
  ```php
      $array = new \Helper\ArrayObject([1,2,3,4]);
      $array = $array->map(function($i){return $i>2;}); // [3.4]
  ```
  **filter** ( [_callable_ $callback [, _int_ $flag = 0 ]] ) : _\Helper\ArrayObject_
  - callback : La fonction de rappel à utiliser  
  - flag : Drapeau indiquant quels sont les arguments à envoyer à la fonction de rappel callback :
    - `ARRAY_FILTER_USE_KEY` - passer la clé comme seul argument à callback au lieu de la valeur.
    - `ARRAY_FILTER_USE_BOTH` - passer à la fois la valeur et la clé comme arguments de callback au lieu de la valeur.

- `array_flip`

- `array_intersect_assoc`

- `array_intersect_key`

- `array_intersect_uassoc`

- `array_intersect_ukey`

- `array_intersect`

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

- `array_udiff_assoc`

- `array_udiff_uassoc`

- `array_udiff`

- `array_uintersect_assoc`

- `array_uintersect_uassoc`

- `array_uintersect`

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
