<?php

namespace Fruitware\Samo;

use Fruitware\Samo\Exception\MainException;

class ModelIterator extends \ArrayIterator
{

    private $_position = 0;

    /**
     * @var array
     */
    private $_nodeArray = [];

    /**
     * @var string
     */
    private $_className = "";

    /**
     * @param array $nodeArray
     * @param $className
     */
    public function __construct(array $nodeArray, $className)
    {
        $this->_nodeArray = $nodeArray;
        $this->_className = $className;
        parent::__construct($this->_nodeArray);
    }

    /**
     * Return the current element
     * @return Models\CommonInterface
     */
    public function current()
    {
        return new $this->_className($this->_nodeArray[$this->_position]);
    }

    /**
     * @param  string $index
     * @return bool
     */
    public function offsetExists($index)
    {
        return isset($this->_nodeArray[$index]);
    }

    /**
     * @param  string                 $index
     * @return Models\CommonInterface
     */
    public function offsetGet($index)
    {
        return new $this->_className($this->_nodeArray[$index]);
    }

    /**
     * @param  string                  $index
     * @param  string                  $newval
     * @throws Exception\MainException
     */
    public function offsetSet($index, $newval)
    {
        throw new MainException("You can not set data");
    }

    /**
     * @param  string                  $index
     * @throws Exception\MainException
     */
    public function offsetUnset($index)
    {
        throw new MainException("You can not remove data");
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
     *                 Returns true on success or false on failure.
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
}
