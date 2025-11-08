<?php
require_once 'interfaces.php';
//Linked List
class Node {
    public $data;
    public $next;

    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
    }
}
class LinkedList implements ListInterface {
    private $head;
    private $count;

    public function __construct() {
        $this->head = null;
        $this->count = 0;
    }

    public function add($item) {
        $newNode = new Node($item);
        if ($this->head === null) {
            $this->head = $newNode;
        } else {
            $current = $this->head;
            while ($current->next !== null) {
                $current = $current->next;
            }
            $current->next = $newNode;
        }
        $this->count++;
    }
    public function remove($item) {
        if ($this->head === null) return;

        if ($this->head->data === $item) {
            $this->head = $this->head->next;
            $this->count--;
            return;
        }

        $current = $this->head;
        while ($current->next !== null && $current->next->data !== $item) {
            $current = $current->next;
        }

        if ($current->next !== null) {
            $current->next = $current->next->next;
            $this->count--;
        }
    }
    public function get($index) {
        if ($index < 0 || $index >= $this->count) {
            return null;
        }
        $current = $this->head;
        for ($i = 0; $i < $index; $i++) {
            $current = $current->next;
        }
        return $current->data;
    }
    public function size(): int {
        return $this->count;
    }
    public function display() {
        $current = $this->head;
        while ($current !== null) {
            echo $current->data . " -> ";
            $current = $current->next;
        }
        echo "end\n";
    }
}

//Array List
class ArrayList implements ListInterface {
    private $items;
    private $count;

    public function __construct() {
        $this->items = [];
        $this->count = 0;
    }
    public function add($item) {
        $this->items[] = $item;
        $this->count++;
    }
    public function remove($item) {
        $index = array_search($item, $this->items, true);
        if ($index !== false) {
            unset($this->items[$index]);
            $this->items = array_values($this->items);
            $this->count--;
        }
    }
    public function get($index) {
        if ($index < 0 || $index >= $this->count) {
            return null;
        }
        return $this->items[$index];
    }
    public function size(): int {
        return $this->count;
    }
    public function display() {
        foreach ($this->items as $item) {
            echo $item . " -> ";
        }
        echo "end\n";
    }
}
//Hashmap
class HashMap implements HashInterface {
    private array $items = [];
    public function add($key, $value) {
        $this->items[$key] = $value;
    }
    public function get($key) {
        return $this->items[$key];
    }
    public function remove($key) {
        if ($this->has($key)) {
            unset($this->items[$key]);
        }
    }
    public function has($key): bool {
        return array_key_exists($key, $this->items);
    }
    public function all(): array {
        return $this->items;
    }
    public function count(): int {
        return count($this->items);
    }
}
//Queue
class ArrayQueue implements QueueInterface {
    private array $items = [];
    public function add($element): bool {
        $this->items[] = $element;
        return true;
    }
    public function remove($element): bool {
        $key = array_search($element, $this->items, true);
        if ($key !== false) {
            unset($this->items[$key]);
            $this->items = array_values($this->items);
            return true;
        }
        return false;
    }
    public function contains($element): bool {
        return in_array($element, $this->items, true);
    }
    public function clear(): void {
        $this->items = [];
    }
    public function size(): int {
        return count($this->items);
    }
    public function enqueue($element): bool {
        return $this->add($element);
    }
    public function dequeue() {
        return array_shift($this->items);
    }
    public function peek() {
        return $this->items[0] ?? null;
    }
}
//Stack
class ArrayStack implements StackInterface {
    private array $items = [];
    public function isEmpty(): bool {
        return empty($this->items);
    }
    public function size(): int {
        return count($this->items);
    }
    public function clear(): void {
        $this->items = [];
    }
    public function push($item): void {
        array_push($this->items, $item);
    }
    public function pop() {
        if ($this->isEmpty()) {
            throw new UnderflowException("Stack kosong gaming");
        }
        return array_pop($this->items);
    }
    public function peek() {
        if ($this->isEmpty()) {
            throw new UnderflowException("Stack kosong gaming");
        }
        return end($this->items);
    }
}