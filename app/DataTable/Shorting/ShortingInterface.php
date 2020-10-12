<?php
namespace App\DataTable\Shorting;



use Illuminate\Database\Eloquent\Builder;

interface ShortingInterface
{
    public static function apply(Builder $builder,$model);
}
