<?php

namespace Fruitware\Samo\Model;

/**
 * type=region
 * Class Region
 * @package Fruitware\Samo\Model
 */
class Region extends CommonNameAbstract implements CommonInterface
{
    /**
     * ID of state
     * @return int
     */
    public function getStateID()
    {
        return $this->checkNumber($this->_node['state']);
    }

}
