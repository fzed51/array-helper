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

  **changeKetCase** ( [_int_ $case = CASE_LOWER]) : _array_

  - case : Soit CASE_UPPER (majuscules), soit CASE_LOWER (minuscules, valeur par défaut)

- `array_chunk`

- `array_column`

- `array_combine`

- `array_count_values`

- `array_diff_assoc`

- `array_diff_key`

- `array_diff_uassoc`

- `array_diff_ukey`

- `array_diff`

- `array_fill_keys`

- `array_fill`

- `array_filter`

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
