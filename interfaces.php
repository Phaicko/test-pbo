<?php
// Interface Interface
interface ListInterface {
    public function add($item);
    public function remove($item);
    public function get($index);
    public function size(): int;
    public function display();
}
//Hashmap
interface HashInterface {
    public function add($key, $value);
    public function get($key);
    public function remove($key);
    public function has($key): bool;
    public function all(): array;
    public function count(): int;
}
//Queue
interface QueueInterface
{
    public function add($element): bool;
    public function remove($element): bool;
    public function contains($element): bool;
    public function clear(): void;
    public function size(): int;
    public function enqueue($element): bool;
    public function dequeue();
    public function peek();
}
//Stack
interface StackInterface {
    public function isEmpty(): bool;
    public function size(): int;
    public function clear(): void;
    public function push($item): void;
    public function pop();
    public function peek();
}