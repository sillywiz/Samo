<?php

namespace Fruitware\Samo;

use GuzzleHttp\Client as GuzzleClient;
use Fruitware\Samo\Exception\MainException;
use Fruitware\Samo\Exception\ParseException;

class Client
{
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
    private $_ip = "";

    /**
     * @var string
     */
    private $_url = "/incoming/export/default.php";

    /**
     * @var array
     */
    private $_query =[];

    /**
     * @param string $ip
     * @param string $token
     */
    public function __construct($ip, $token)
    {
        $this->_token = $token;
        $this->_ip = $ip;
        $this->_query = ['oauth_token' => $this->_token, 'samo_action' => 'reference'];
    }

    /**
     * @param string $type
     * @param string $stamp
     * @param string $delStamp
     * @return Result
     * @throws Exception\MainException
     */
    public function getResult($type, $stamp, $delStamp)
    {
        $classAndNode = $this->getClassNameAndNodeName($type);
        $class = "Fruitware\\Samo\\Models\\".$classAndNode["class"];
        $xml = $this->makeRequest($type, $stamp, $delStamp);
        if (!isset($xml, $xml->Data)) {
            throw new MainException('Error loading');
        }

        return new Result($xml->Data, $class, $classAndNode["nodeName"]);
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
        $url = "http://".$this->_ip.$this->_url;
        $res = $client->get($url, ['query' =>  $this->_query]);
        if ($res->getStatusCode() == "200") {
            try {
                return $res->xml();
            } catch (ParseException $e) {
                throw new MainException('Error loading xml', 0, $e);
            }
        }
        throw new MainException('Error loading');
    }

    /**
     * @param $type
     * @return array
     * @throws Exception\MainException
     */
    private function getClassNameAndNodeName($type)
    {
        switch ($type) {
            case Client::GET_ALLOCATIONS:
                return ["class" => "Allocation", "nodeName" => "htplace"];
                break;
            case Client::GET_CURRENCIES:
                return ["class" => "Currency", "nodeName" => "currency"];
                break;
            case Client::GET_HOTELS:
                return ["class" => "Hotel", "nodeName" => "hotel"];
                break;
            case Client::GET_HOTELSALEPRICES:
                return ["class" => "HotelsalePrice", "nodeName" => "hprice"];
                break;
            case Client::GET_HOTELSTARS:
                return ["class" => "HotelStar", "nodeName" => "star"];
                break;
            case Client::GET_MEALTYPE:
                return ["class" => "MealType", "nodeName" => "meal"];
                break;
            case Client::GET_REGIONS:
                return ["class" => "Region", "nodeName" => "region"];
                break;
            case Client::GET_RELEASES:
                return ["class" => "Release", "nodeName" => "release"];
                break;
            case Client::GET_ROOMTTYPES:
                return ["class" => "RoomType", "nodeName" => "room"];
                break;
            case Client::GET_SERVICES:
                return ["class" => "Service", "nodeName" => "service"];
                break;
            case Client::GET_SERVICETYPES:
                return ["class" => "ServiceType", "nodeName" => "servtype"];
                break;
            case Client::GET_SPOS:
                return ["class" => "Spo", "nodeName" => "spos"];
                break;
            case Client::GET_STATES:
                return ["class" => "State", "nodeName" => "state"];
                break;
            case Client::GET_STOPSALES:
                return ["class" => "StopSale", "nodeName" => "stopsale"];
                break;
            case Client::GET_TOWNS:
                return ["class" => "Town", "nodeName" => "town"];
                break;
        }
        throw new MainException('Wrong type');
    }
}
