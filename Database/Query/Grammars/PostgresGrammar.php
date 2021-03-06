<?php namespace Modules\LivewireCore\Database\Query\Grammars;

use Modules\LivewireCore\Database\QueryBuilder;
use Illuminate\Database\Query\Grammars\PostgresGrammar as BasePostgresGrammer;
use Modules\LivewireCore\Database\Query\Grammars\Concerns\SelectConcatenations;

class PostgresGrammar extends BasePostgresGrammer
{
    use SelectConcatenations;

    /**
     * Compile an "upsert" statement into SQL.
     *
     * @param  \Modules\LivewireCore\Database\QueryBuilder $query
     * @param  array $values
     * @param  array $uniqueBy
     * @param  array $update
     * @return  string
     */
    public function compileUpsert(QueryBuilder $query, array $values, array $uniqueBy, array $update)
    {
        $sql = $this->compileInsert($query, $values);

        $sql .= ' on conflict (' . $this->columnize($uniqueBy) . ') do update set ';

        $columns = collect($update)->map(function ($value, $key) {
            return is_numeric($key)
                ? $this->wrap($value) . ' = ' . $this->wrapValue('excluded') . '.' . $this->wrap($value)
                : $this->wrap($key) . ' = ' . $this->parameter($value);
        })->implode(', ');

        return $sql . $columns;
    }
}
