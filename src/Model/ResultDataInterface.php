<?php

namespace DMT\KvK\Api\Model;


interface ResultDataInterface
{
    /**
     * @return array
     */
    public function getItems(): array;

    /**
     * @param array $items
     */
    public function setItems(array $items): void;
}