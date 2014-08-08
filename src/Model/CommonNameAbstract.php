<?php

namespace Fruitware\Samo\Models;


abstract class CommonNameAbstract extends CommonAbstract
{
    /**
     * Name
     * @return mixed
     */
    public function getName()
    {
        return $this->_node['name'];
    }

    /**
     * Latin name
     * @return mixed
     */
    public function getLatinName()
    {
        return $this->_node['lname'];
    }

}