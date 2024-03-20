<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use function Webmozart\Assert\Tests\StaticAnalysis\integer;

class GoodFilter extends AbstractFilter
{
    public const ID = 'id';
    public const NAME = 'name';
    public const CATEGORY_ID = 'category_id';


    protected function getCallbacks(): array
    {
        return[
            self::ID => [$this, 'id'],
            self::NAME => [$this, 'name'],
            self::CATEGORY_ID => [$this, 'category_id']
        ];
    }

    public function id(Builder $builder, $value)
    {
        $builder->where('id', $value);
    }

    public function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }

    public function category_id(Builder $builder, $value)
    {
        $builder->where('category_id', $value);
    }

}
