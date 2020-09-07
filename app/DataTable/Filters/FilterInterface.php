<?php
namespace App\DataTable\Filters;



use Illuminate\Database\Eloquent\Builder;

interface FilterInterface
{
    public static function apply(Builder $builder,$method,$value);
}
