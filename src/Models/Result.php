<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Vladimir
 * Date: 07.08.14
 * Time: 12:37
 * To change this template use File | Settings | File Templates.
 */

namespace Fruitware\Samo\Models;

use Fruitware\Samo\Models\ModelIterator;

class Result {

    /**
     * @var \SimpleXMLElement
     */
    private $_node = [];
    private $_className = "";
    private $_nodeName = "";

    public function __construct($nodeList, $className, $nodeName) {
        $this->_node = $nodeList;
        $this->_className = $className;
        $this->_nodeName = $nodeName;
    }

    /**
     * @return ModelIterator
     */
    public function getUpdatedList() {
        return $this->makeQuery('');
    }

    /**
     * @return ModelIterator
     */
    public function getDeletedList() {
        return $this->makeQuery('D');
    }

    /**
     * @return null|\string
     */
    public function getLastStampUpdated() {
        $result = $this->_node->xpath("//$this->_nodeName[@status=''][@inc!='-2147483647'][last()]/@stamp");
        return count($result) ? $result[0] : null;
    }

    /**
     * @return null|\string
     */
    public function getLastStampDeleted() {
        $result = $this->_node->xpath("//$this->_nodeName[@status='D'][@inc!='-2147483647'][last()]/@stamp");
        return count($result) ? $result[0] : null;
    }
    private function makeQuery($queryStr) {
        if(count($this->_node))
        {
            $result_nodes = $this->_node->xpath("//$this->_nodeName[@status='$queryStr'][@inc!='-2147483647']");
            return new ModelIterator($result_nodes, $this->_className);
        }
        return [];
    }
}