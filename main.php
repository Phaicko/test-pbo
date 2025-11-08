<?php
require_once 'functions.php';
// Linked List
echo "\nLinked List ==========\n";
$list = new LinkedList();
$list->add("💻");
$list->add("📱");
$list->add("⭐");
$list->display();
$list->remove("📱");
$list->display();
echo "Item ke-1: " . $list->get(0) . "\n";
echo "Total item: " . $list->size() . "\nArray List ==========\n";
//Array List
$array = new ArrayList();
$array->add("aa");
$array->add("bb");
$array->add("cc");
$array->display();
echo "Size: ".$array->size()."\n";
echo "Item ke-1: ".$array->get(1)."\n";
$array->remove('aa');
$array->display();
echo "Size setelah remove: ".$array->size()."\nHashmap ==========\n";
//Hashmap
$map = new HashMap();
$map->add("nama", "test");
$map->add("umur", 20);
echo $map->get("nama");
echo "\nJumlah elemen: ". $map->count()."\n";
$map->remove("nama");
print_r($map->all());
echo"\nQueue ==========\n";
//Queue
$queue = new ArrayQueue();
$queue->enqueue(1);
$queue->enqueue(2);
$queue->enqueue(3);
$queue->enqueue(4);
echo $queue->dequeue()."\n";
echo $queue->peek()."\n";
echo $queue->size()."\nStack ==========\n";
//Stack
$stack = new ArrayStack();
$stack->push("👌");
$stack->push("ᓚᘏᗢ");
$stack->push("📅");
echo "Peek: " .$stack->peek()."\n";
echo "Ukuran stack: " .$stack->size()."\n";
$stack->pop();
$stack->pop();
echo "Peek: " .$stack->peek()."\n";
$stack->pop();
echo "Apakah kosong? " .($stack->isEmpty() ? "Ya" : "Tidak")."\nEND ==========\n";