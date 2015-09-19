<?php

$items = array(
    1 => array(
        "parent_id" => null,
    ),
    2 => array(
        "parent_id" => 1,
    ),
    3 => array(
        "parent_id" => 1,
    ),
    4 => array(
        "parent_id" => 3,
    ),
);

foreach ($items as $id => &$item) {
    if (!$id) continue;
    $items[$item["parent_id"]]["children"][$id] = &$item;
}

var_dump($items[""]["children"]);