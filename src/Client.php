<?php

namespace Fruitware\Samo;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Message\Response;
use Fruitware\Samo\Exception\SamoException;

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

    private $_token = "";

    private $_url = "http://94.70.244.241/incoming/export/default.php";

    /**
     * @param $token
     */
    public function __construct($token)
    {
        $this->_token = $token;
    }

    /**
     * @param $type
     * @return array
     */
    public function getListDeleted($type) {
        return $this->setObject($type, true);
    }

    /**
     * @param string $type
     * @return array
     */
    public function getListNew($type) {
        return $this->setObject($type, false);
    }

    /**
     * @param $type
     * @param $get_deleted
     * @return array
     * @throws Exception\SamoException
     */
    private function setObject($type, $get_deleted) {
        $class = $this->getClassName($type);
        if(isset($class)) {
            $xml = $this->makeRequest($type);
            if(!isset($xml, $xml->Valute)) {
                throw new SamoException('Error loading');
            }
            $newObjectArray = array();
            $delObjectArray = array();
            foreach ($xml->Valute as $row) {
                $model = new $class($row);
                if($model->getStatus() == "D")
                    $newObjectArray[] = $model;
                else
                    $delObjectArray[] = $model;
            }
            if($get_deleted)
                return $delObjectArray;
            else
                return $newObjectArray;
        } else
            throw new SamoException('Wrong type');

    }

    /**
     * @param $service_type
     * @return \SimpleXMLElement
     * @throws Exception\SamoException
     */
    private function makeRequest($service_type)
    {
        $client = new GuzzleClient();
        $res = $client->get($this->_url, [
            'query' => ['oauth_token' => $this->_token, 'samo_action' => 'reference', 'type' => $service_type]
        ]);
        if($res->getStatusCode() == "200") {
            try {
                return $res->xml();
            } catch(SamoException $e) {
                throw new SamoException('Error loading xml');
            }
        }
        throw new SamoException('Error loading');
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