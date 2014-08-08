<?php

namespace Fruitware\Samo\Model;

/**
 * type=town
 * Class Town
 * @package Fruitware\Samo\Model
 */
class Town extends CommonNameAbstract implements CommonInterface
{
    /**
     * ID of state
     * @return int
     */
    public function getStateID()
    {
        return $this->checkNumber($this->_node['state']);
    }

    /**
     * ID of region
     * @return int
     */
    public function getRegionID()
    {
        return $this->checkNumber($this->_node['region']);
    }
}
