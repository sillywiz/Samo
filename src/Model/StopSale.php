<?php

namespace Fruitware\Samo\Models;

/**
 * type=stopsale
 * Class StopSale
 * @package Fruitware\Samo\Models
 */
class StopSale extends CommonAbstract implements CommonInterface
{
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
        return $this->checkNumber($this->_node['hotel']);
    }

    /**
     * ID of room type
     * @return int
     */
    public function getRoomId() {
        return $this->checkNumber($this->_node['room']);
    }

    /**
     * ID of allocation type
     * @return int
     */
    public function getAllocationId() {
        return $this->checkNumber($this->_node['htplace']);
    }

    /**
     * ID of meal type
     * @return int
     */
    public function getMealId() {
        return $this->checkNumber($this->_node['meal']);
    }

    /**
     * @return bool
     */
    public function getCheckIn() {
        return (bool)$this->_node['checkin'];
    }
}