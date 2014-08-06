<?php

namespace Fruitware\Samo\Models;

class Common {

    /**
     * @var \SimpleXMLElement
     */
    protected  $_node;

    /**
     * @param \SimpleXMLElement $node
     */
    public function __construct(\SimpleXMLElement $node) {
        $this->_node = $node;
    }

    /**
     * ID of record
     * @return int
     */
    public function getId() {
        return $this->checkNumber($this->_node['inc']);
    }

    /**
     * Empty for insert or update
     * “D” for delete
     * @return string
     */
    public function getStatus() {
        return (string)$this->_node['status'];
    }

    /**
     * Timestamp of record
     * @return string
     */
    public function getStamp() {
        return (string)$this->_node['stamp'];
    }

    protected  function checkNumber($number) {
        $result = (int)$number;
        if($result > 0)
            return $result;
        return null;
    }
}