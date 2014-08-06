<?php

namespace Fruitware\Samo\Models;

/**
 * type=spos
 * Class Spo
 * @package Fruitware\Samo\Models
 */
class Spo extends CommonName {

    /**
     * Date of issue SPO
     * @return int
     */
    public function getSpoDate() {
        return new \DateTime($this->_node['spodate']);
    }

    /**
     * Use as contact prices
     * @return bool
     */
    public function getUseContact() {
        return (bool)$this->_node['usecontact'];
    }

    /**
     * Combine with other SPO
     * @return bool
     */
    public function getIsMixed() {
        return (bool)$this->_node['mixed'];
    }

    /**
     * Early booking
     * @return bool
     */
    public function getHasEarlyBooking() {
        return (bool)$this->_node['ebooking'];
    }

    /**
     * Use for sale price calculation
     * @return bool
     */
    public function getUseSalePrice() {
        return (bool)$this->_node['usesaleprice'];
    }
}