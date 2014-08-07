<?php

namespace Fruitware\Samo;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Message\Response;
use Fruitware\Samo\Exception\MainException;
use Fruitware\Samo\Exception\ParseException;
use Fruitware\Samo\Result;

class Client {

    const GET_ALLOCATIONS = "htplace";

    const GET_CURRENCIES = "currency";

    const GET_HOTELS = "hotel";

    const GET_HOTELSALEPRICES = "hotelsalepr";

    const GET_HOTELSTARS = "star";

    const GET_MEALTYPE = "meal";

    const GET_REGIONS = "region";

    const GET_RELEASES = "release";

    const GET_ROOMTTYPES = "room";

    const GET_SERVICES = "service";

    const GET_SERVICETYPES = "servtype";

    const GET_SPOS = "spos";

    const GET_STATES = "state";

    const GET_STOPSALES = "stopsale";

    const GET_TOWNS = "town";

    /**
     * @var string
     */
    private $_token = "";

    /**
     * @var string
     */
    private $_url = "http://94.70.244.241/incoming/export/default.php";

    /**
     * @var array
     */
    private $_query =[];

    /**
     * @param $token
     */
    public function __construct($token)
    {
        $this->_token = $token;
        $this->_query = ['oauth_token' => $this->_token, 'samo_action' => 'reference'];
    }

    /**
     * @param string $type
     * @param string $stamp
     * @param string $delStamp
     * @return Result
     * @throws Exception\MainException
     */
    public function getResult($type, $stamp, $delStamp) {
        $classAndNode = $this->getClassNameAndNodeName($type);
        if(count($classAndNode)) {
            $class = "Fruitware\\Samo\\Models\\".$classAndNode["class"];
            $xml = $this->makeRequest($type, $stamp, $delStamp);
            if(!isset($xml, $xml->Data)) {
                throw new MainException('Error loading');
            }
            return new Result($xml->Data, $class, $classAndNode["nodeName"]);
        } else
            throw new MainException('Wrong type');

    }

    /**
     * @param $serviceType
     * @param string $stamp
     * @param string $delStamp
     * @return \SimpleXMLElement
     * @throws ParseException|MainException
     */
    private function makeRequest($serviceType, $stamp, $delStamp)
    {
        $client = new GuzzleClient();
        $this->_query['laststamp'] = $stamp;
        $this->_query['delstamp'] = $delStamp;
        $this->_query['type'] = $serviceType;
        $res = $client->get($this->_url, ['query' =>  $this->_query]);
        if($res->getStatusCode() == "200") {
            try {
                return $res->xml();
            } catch(ParseException $e) {
                throw new MainException('Error loading xml');
            }
        }
        throw new MainException('Error loading');
    }

    /**
     * @param $type
     * @return array
     */
    private function getClassNameAndNodeName($type) {
        switch($type) {
            case Client::GET_ALLOCATIONS:
                return array("class" => "Allocation", "nodeName" => "htplace");
                break;
            case Client::GET_CURRENCIES:
                return array("class" => "Currency", "nodeName" => "currency");
                break;
            case Client::GET_HOTELS:
                return array("class" => "Hotel", "nodeName" => "hotel");
                break;
            case Client::GET_HOTELSALEPRICES:
                return array("class" => "HotelsalePrice", "nodeName" => "hprice");
                break;
            case Client::GET_HOTELSTARS:
                return array("class" => "HotelStar", "nodeName" => "star");
                break;
            case Client::GET_MEALTYPE:
                return array("class" => "MealType", "nodeName" => "meal");
                break;
            case Client::GET_REGIONS:
                return array("class" => "Region", "nodeName" => "region");
                break;
            case Client::GET_RELEASES:
                return array("class" => "Release", "nodeName" => "release");
                break;
            case Client::GET_ROOMTTYPES:
                return array("class" => "RoomType", "nodeName" => "room");
                break;
            case Client::GET_SERVICES:
                return array("class" => "Service", "nodeName" => "service");
                break;
            case Client::GET_SERVICETYPES:
                return array("class" => "ServiceType", "nodeName" => "servtype");
                break;
            case Client::GET_SPOS:
                return array("class" => "Spo", "nodeName" => "spos");
                break;
            case Client::GET_STATES:
                return array("class" => "State", "nodeName" => "state");
                break;
            case Client::GET_STOPSALES:
                return array("class" => "StopSale", "nodeName" => "stopsale");
                break;
            case Client::GET_TOWNS:
                return array("class" => "Town", "nodeName" => "town");
                break;
        }
        return [];
    }
}