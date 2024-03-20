<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use function Webmozart\Assert\Tests\StaticAnalysis\integer;

class EmployeeFilter extends AbstractFilter
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
        $builder->where('last_name', 'like', "%{$value}%")
            ->orWhere('first_name', 'like', "%{$value}%")
            ->orWhere('middle_name', 'like', "%{$value}%")
            ->orWhere('id', $value);
    }

}
