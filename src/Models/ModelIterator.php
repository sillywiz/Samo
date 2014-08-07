<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Vladimir
 * Date: 07.08.14
 * Time: 12:11
 * To change this template use File | Settings | File Templates.
 */

namespace Fruitware\Samo\Models;


class ModelIterator extends \ArrayIterator
{

    private $_position = 0;

    /**
     * @var \SimpleXMLIterator
     */
    private $_nodeArray = [];
    private $_className = "";

    /**
     * @param \SimpleXMLIterator $nodeArray
     * @param $className
     */
    public function __construct($nodeArray, $className) 
    {
        $this->_nodeArray = $nodeArray;
        $this->_className = $className;
        parent::__construct($this->_nodeArray);
    }

    /**
     * Return the current element
     * @return object Can return any type.
     */
    public function current()
    {
        return new $this->_className($this->_nodeArray[$this->_position]);
    }

    /**
     * Move forward to next element
     * @return object Any returned value is ignored.
     */
    public function next()
    {
        ++$this->_position;
    }

    /**
     * Return the key of the current element
     * @return int scalar on success, or null on failure.
     */
    public function key()
    {
        return $this->_position;
    }

    /**
     * Checks if current position is valid
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    public function valid()
    {
        return isset($this->_nodeArray[$this->_position]);
    }

    /**
     * Rewind the Iterator to the first element
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        $this->_position = 0;
    }

    public function getClassName() {
        return $this->_className;
    }

//
//    /**
//     * @return int
//     */
//    public function count() {
//        return $this->_nodeArray->count();
//    }
}