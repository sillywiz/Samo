<?php

namespace Fruitware\Samo\Models;

/**
 * type=stopsale
 * Class StopSale
 * @package Fruitware\Samo\Models
 */
class StopSale extends CommonName {

    /**
     * Begin date of stopsale
     * @return \DateTime
     */
    public function getBeginDate() {
        return new \DateTime($this->_node['datebeg']);
    }

    /**
     * End date of stopsale
     * @return \DateTime
     */
    public function getEndDate() {
        return new \DateTime($this->_node['dateend']);
    }

    /**
     * ID of hotel
     * @return int
     */
    public function getHotelId() {
        return (int)$this->_node['hotel'];
    }

    /**
     * ID of room type
     * @return int
     */
    public function getRoomId() {
        return (int)$this->_node['hotel'];
    }

    /**
     * ID of allocation type
     * @return int
     */
    public function getAllocationId() {
        return (int)$this->_node['htplace'];
    }

    /**
     * ID of meal type
     * @return int
     */
    public function getMealId() {
        return (int)$this->_node['meal'];
    }
}