<?php

namespace Fruitware\Samo\Models;

/**
 * type=release
 * Class Release
 * @package Fruitware\Samo\Models
 */
class Release extends Common {

    /**
     * Begin date
     * @return \DateTime
     */
    public function getBeginDate() {
        return new \DateTime($this->_node['datebeg']);
    }

    /**
     * End date
     * @return \DateTime
     */
    public function getEndDate() {
        return new \DateTime($this->_node['dateend']);
    }

    /**
     * Count of days
     * @return int
     */
    public function getDays() {
        return (int)$this->_node['days'];
    }
}