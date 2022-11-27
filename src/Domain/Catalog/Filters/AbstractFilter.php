<?php


namespace Domain\Catalog\Filters;


use Illuminate\Contracts\Database\Eloquent\Builder;
use Stringable;

abstract class AbstractFilter implements Stringable
{
    public function __invoke(Builder $query, $next)
    {
        return $next($this->apply($query));
    }

    abstract public function title(): string;

    abstract public function key(): string;

    abstract public function apply(Builder $query): Builder;

    abstract public function values(): array;

    abstract public function view(): string;

    public function requestValue(string $index = null, mixed $default = null): mixed
    {
        return request(
            'filters.' . $this->key() . ($index ? ".$index" : ""),
            $default
        );
    }

    public function name(string $index = null): string
    {
        return str($this->key())
            ->wrap('[', ']')
            ->prepend('filters')
            ->when($index, fn($str) => $str->append("[$index]"))
            ->value();
    }

    public function id(string $index = null): string
    {
        return str($this->name($index))
            ->slug('_')
            ->value();
    }

    public function __toString(): string
    {
        return view(
            $this->view(),
            [
                'filter' => $this
            ]
        )
            ->render();
    }
}
