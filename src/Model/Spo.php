<?php

namespace Fruitware\Samo\Models;

/**
 * type=spos
 * Class Spo
 * @package Fruitware\Samo\Models
 */
class Spo extends CommonAbstract implements CommonInterface
{
    /**
     * Date of issue SPO
     * @return \DateTime
     */
    public function getSpoDate()
    {
        return new \DateTime($this->_node['spodate']);
    }

    /**
     * Use as contact prices
     * @return bool
     */
    public function getUseContract()
    {
        return (bool) $this->_node['usecontract'];
    }

    /**
     * Combine with other SPO
     * @return bool
     */
    public function getIsMixed()
    {
        return (bool) $this->_node['mixed'];
    }

    /**
     * Early booking
     * @return bool
     */
    public function getHasEarlyBooking()
    {
        return (bool) $this->_node['ebooking'];
    }

    /**
     * Use for sale price calculation
     * @return bool
     */
    public function getUseSalePrice()
    {
        return (bool) $this->_node['usesaleprice'];
    }

    /**
     * @return string
     */
    public function getNote()
    {
        return (string) $this->_node['note'];
    }
}
