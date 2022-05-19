<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class ProjectFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const COST = 'cost';
    public const PIVOT = 'pivot';
    public const SORT = 'sort';
    public const ID = 'id';


    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::COST => [$this, 'cost'],
            self::PIVOT => [$this, 'pivot'],
            self::SORT => [$this, 'sort'],
            self::ID => [$this, 'id'],
        ];
    }

    public function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }

    public function cost(Builder $builder, $value)
    {
        $builder->where('cost', $value);
    }

    public function pivot(Builder $builder, $value)
    {
        $builder->with($value);
    }

    public function sort(Builder $builder, $value)
    {
        $builder->orderBy($value);
    }
    public function id(Builder $builder, $value)
    {
        $builder->where('id',$value);
    }

}
