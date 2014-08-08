<?php

namespace Fruitware\Samo\Models;

/**
 * type=htplace
 * Class Allocation
 * @package Fruitware\Samo\Models
 */
class Allocation extends CommonNameAbstract implements CommonInterface
{
    /**
     * Total PAX count
     * @return int
     */
    public function getPaxCount()
    {
        return (int) $this->_node['pcount'];
    }

    /**
     * Adult count
     * @return int
     */
    public function getAdultCount()
    {
        return (int) $this->_node['adult'];
    }

    /**
     * Child count
     * @return int
     */
    public function getChildCount()
    {
        return (int) $this->_node['child'];
    }

    /**
     * Infant count
     * @return int
     */
    public function getInfantCount()
    {
        return (int) $this->_node['infant'];
    }

    /**
     * Minimum age of first child
     * @return float
     */
    public function getMin1Age()
    {
        return (float) $this->_node['age1min'];
    }

    /**
     * Maximum age of first child
     * @return float
     */
    public function getMax1Age()
    {
        return (float) $this->_node['age1max'];
    }

    /**
     * Minimum age of second child
     * @return float
     */
    public function getMin2Age()
    {
        return (float) $this->_node['age2min'];
    }

    /**
     * Maximum age of second child
     * @return float
     */
    public function getMax2Age()
    {
        return (float) $this->_node['age2max'];
    }

    /**
     * Minimum age of third child
     * @return float
     */
    public function getMin3Age()
    {
        return (float) $this->_node['age3min'];
    }

    /**
     * Maximum age of third child
     * @return float
     */
    public function getMax3Age()
    {
        return (float) $this->_node['age3max'];
    }
}
