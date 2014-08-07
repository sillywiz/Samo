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
     */
    public function getResult($type, $stamp, $delStamp) {
        return $this->setObject($type, $stamp, $delStamp);
    }

    /**
     * @param $type
     * @param $stamp
     * @param $delStamp
     * @return Result
     * @throws Exception\MainException
     */
    private function setObject($type, $stamp, $delStamp) {
        $class = $this->getClassName($type);
        if(isset($class)) {
            $class = "Fruitware\\Samo\\Models\\".$class;
            $xml = $this->makeRequest($type, $stamp, $delStamp);
            if(!isset($xml, $xml->Data)) {
                throw new MainException('Error loading');
            }
            return new Result($xml->Data, $class, $type);
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
     * @return null|string
     */
    private function getClassName($type) {
        switch($type) {
            case Client::GET_ALLOCATIONS:
                return "Allocation";
                break;
            case Client::GET_CURRENCIES:
                return "Currency";
                break;
            case Client::GET_HOTELS:
                return "Hotel";
                break;
            case Client::GET_HOTELSALEPRICES:
                return "HotelsalePrice";
                break;
            case Client::GET_HOTELSTARS:
                return "HotelStar";
                break;
            case Client::GET_MEALTYPE:
                return "MealType";
                break;
            case Client::GET_REGIONS:
                return "Region";
                break;
            case Client::GET_RELEASES:
                return "Release";
                break;
            case Client::GET_ROOMTTYPES:
                return "RoomType";
                break;
            case Client::GET_SERVICES:
                return "Service";
                break;
            case Client::GET_SERVICETYPES:
                return "ServiceType";
                break;
            case Client::GET_SPOS:
                return "Spo";
                break;
            case Client::GET_STATES:
                return "State";
                break;
            case Client::GET_STOPSALES:
                return "StopSale";
                break;
            case Client::GET_TOWNS:
                return "Town";
                break;
        }
        return null;
    }
}