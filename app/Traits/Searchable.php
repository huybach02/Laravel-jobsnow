<?php

namespace App\Traits;

trait Searchable
{
  public function search($query, $columns = [], $keyword)
  {
    if (!empty($columns)) {
      return $query->where(function ($subQuery) use ($columns, $keyword) {
        foreach ($columns as $column) {
          $subQuery->orWhere($column, 'like', '%' . $keyword . '%');
        }
      });
    }
    return;
  }
}
