<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use function Webmozart\Assert\Tests\StaticAnalysis\integer;

class VideocardFilter extends AbstractFilter
{

    public const NAME = 'name';


    protected function getCallbacks(): array
    {
        return[
            self::NAME => [$this, 'name'],
        ];
    }



    public function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }



}
