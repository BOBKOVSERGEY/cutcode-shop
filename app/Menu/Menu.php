<?php


namespace App\Menu;


use Countable;
use Illuminate\Support\Collection;
use IteratorAggregate;
use Support\Traits\Makeable;
use Traversable;

class Menu implements IteratorAggregate, Countable
{
    use Makeable;

    protected array $items = [];

    public function __construct(MenuItem ...$items)
    {
        $this->items = $items;
    }

    public function all(): Collection
    {
        return Collection::make($this->items);
    }

    public function add(MenuItem $item): self
    {
        $this->items[] = $item;

        return $this;
    }

    public function addIf(bool|callable $condition, MenuItem $item): self
    {
        if (is_callable($condition) ? $condition() : $condition) {
            $this->items[] = $item;
        }
        return $this;
    }

    public function remove(MenuItem $item): self
    {
        $this->items = $this->all()
            ->filter(fn(MenuItem $current) => $item !== $current)
            ->toArray();
        return $this;
    }

    public function removeByLink(string $link): self
    {
        $this->items = $this->all()
            ->filter(fn(MenuItem $current) => $link !== $current->link())
            ->toArray();
        return $this;
    }

    public function getIterator(): Traversable
    {
        return $this->all();
    }

    public function count(): int
    {
        return count($this->items);
    }
}
