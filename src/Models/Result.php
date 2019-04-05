<?php

namespace djstarcom\BookingComSDK\Models;

use Countable;
use Iterator;
use function count;

/**
 * Class Result
 * @package djstarcom\BookingComSDK\Models
 */
class Result implements Iterator, Countable
{
    /**
     * Collections list.
     *
     * @var array
     */
    protected $collections = [];

    /**
     * @param Model $item
     * @param $key string Item key in collection
     */
    public function addItem(Model $item, ?string $key = null): void
    {
        if ($key) {
            $this->collections[$key] = $item;
        } else {
            $this->collections[] = $item;
        }
    }

    /**
     * Get Model by key from collection
     * @param string $key
     * @return Model|null
     */
    public function getBy(string $key): ?Model
    {
        if (!array_key_exists($key, $this->collections)) {
            return null;
        }

        return $this->collections[$key];
    }

    /**
     * @return Model[]
     */
    public function getItems(): array
    {
        return $this->collections;
    }

    /**
     * Reset collection.
     * @return Model
     */
    public function rewind(): Model
    {
        return reset($this->collections);
    }

    /**
     * @return Model
     */
    public function current(): Model
    {
        return current($this->collections);
    }

    /**
     * @return int|null|string
     */
    public function key()
    {
        return key($this->collections);
    }

    /**
     * {@inheritDoc}
     */
    public function next()
    {
        return next($this->collections);
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        return key($this->collections) !== null;
    }

    /**
     * Count elements of an object
     * @return int The custom count as an integer.
     * The return value is cast to an integer.
     */
    public function count(): int
    {
        return count($this->collections);
    }
}
