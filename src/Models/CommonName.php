<?php

namespace Fruitware\Samo\Models;


class CommonName extends Common {

    /**
     * Name
     * @return mixed
     */
    public function getName() {
        return $this->_node['name'];
    }

    /**
     * Latin name
     * @return mixed
     */
    public function getLatinName() {
        return $this->_node['lname'];
    }

}