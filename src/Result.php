<?php

namespace Fruitware\Samo;

use Fruitware\Samo\ModelIterator;

class Result {

    /**
     * @var \SimpleXMLElement
     */
    private $_data = [];

    /**
     * @var string
     */
    private $_className = "";

    /**
     * @var string
     */
    private $_nodeName = "";

    public function __construct($nodeList, $className, $nodeName) {
        $this->_data = $nodeList;
        $this->_className = $className;
        $this->_nodeName = $nodeName;
    }

    /**
     * @return ModelIterator
     */
    public function getUpdatedList() {
        return $this->findByStatus('');
    }

    /**
     * @return ModelIterator
     */
    public function getDeletedList() {
        return $this->findByStatus('D');
    }

    /**
     * @return null|string
     */
    public function getLastStampUpdated() {
        $result = $this->_data->xpath("//$this->_nodeName[@status=''][@inc!='-2147483647'][last()]/@stamp");
        return count($result) ? $result[0] : null;
    }

    /**
     * @return null|string
     */
    public function getLastStampDeleted() {
        $result = $this->_data->xpath("//$this->_nodeName[@status='D'][@inc!='-2147483647'][last()]/@stamp");
        return count($result) ? $result[0] : null;
    }

    /**
     * @param string $queryStr
     * @return null|ModelIterator
     */
    private function findByStatus($queryStr) {
        if(count($this->_data))
        {
            $result_nodes = $this->_data->xpath("//$this->_nodeName[@status='".$queryStr."'][@inc!='-2147483647']");
            return new ModelIterator($result_nodes, $this->_className);
        }
        return null;
    }
}