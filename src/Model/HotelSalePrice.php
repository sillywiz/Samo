<?php

namespace Fruitware\Samo\Model;

/**
 * type=hotelsalepr
 * Class HotelsalePrice
 * @package Fruitware\Samo\Model
 */
class HotelSalePrice extends CommonAbstract implements CommonInterface
{
    /**
     * ID of hotel
     * @return int
     */
    public function getHotelID()
    {
        return $this->checkNumber($this->_node['hotel']);
    }

    /**
     * ID of room
     * @return int
     */
    public function getRoomID()
    {
        return $this->checkNumber($this->_node['room']);
    }

    /**
     * ID of allocation
     * @return int
     */
    public function getAllocationId()
    {
        return $this->checkNumber($this->_node['htplace']);
    }

    /**
     * ID of meal
     * @return int
     */
    public function getMealId()
    {
        return $this->checkNumber($this->_node['meal']);
    }

    /**
     * Begin of price season
     * @return int
     */
    public function getBeginDate()
    {
        return new \DateTime($this->_node['datebeg']);
    }

    /**
     * End of price season
     * @return \DateTime
     */
    public function getEndDate()
    {
        return new \DateTime($this->_node['dateend']);
    }

    /**
     * Reservation from
     * @return \DateTime
     */
    public function getReservationFrom()
    {
        return new \DateTime($this->_node['rqdatebeg']);
    }

    /**
     * Reservation till
     * @return \DateTime
     */
    public function getReservationTill()
    {
        return new \DateTime($this->_node['rqdateend']);
    }

    /**
     * Staying nights
     * @return int
     */
    public function getNightsCount()
    {
        return (int) $this->_node['nights'];
    }

    /**
     * ID of SPO
     * @return int
     */
    public function getSpoId()
    {
        return $this->checkNumber($this->_node['spos']);
    }

    /**
     * SPO type
     * 1 = Standard
     * 2 = Check-in
     * 3 = Rotation
     * 4 = Accommodation
     * 5 = Meal plan
     * 6 = Discount
     * @return int
     */
    public function getSpoTypeId()
    {
        return $this->checkNumber($this->_node['spotype']);
    }

    /**
     * SPO subtype for SPO rotation
     *
     * 1 = Calculate without first dates
     * 2 = Calculate without last dates
     * 3 = Calculate as average value
     * 4 = Calculate without min price from the edge
     * 5 = Calculate without max price from the edge
     * @return int
     */
    public function getSpoSubTypeId()
    {
        return $this->checkNumber($this->_node['sposubtype']);
    }

    /**
     * For SPO “Accommodation”
     * @return int
     */
    public function getSpoAccommodationId()
    {
        return $this->checkNumber($this->_node['rroom']);
    }

    /**
     * From SPO “”
     * @return int
     */
    public function getFromSpoId()
    {
        return $this->checkNumber($this->_node['rhtplace']);
    }

    /**
     * For SPO “Meal plan”
     * @return int
     */
    public function getSpoMealPlan()
    {
        return (int) $this->_node['rmeal'];
    }

    /**
     * For SPO “Rotation”
     * @return int
     */
    public function getSpoRotation()
    {
        return (int) $this->_node['rnights'];
    }

    /**
     * Price
     * @return float
     */
    public function getPrice()
    {
        return (float) $this->_node['price'];
    }

    /**
     * Discount if percent
     * @return float
     */
    public function getDiscountPercent()
    {
        return (float) $this->_node['discount'];
    }

    /**
     * Discount in money
     * @return float
     */
    public function getDiscountMoney()
    {
        return (float) $this->_node['discountmoney'];
    }

    /**
     * ID of curency
     * @return int
     */
    public function getCurrencyId()
    {
        return $this->checkNumber($this->_node['currency']);
    }

    /**
     * Check-in date from
     * @return \DateTime
     */
    public function getCheckInFrom()
    {
        return new \DateTime($this->_node['dateinfrom']);
    }

    /**
     * Check-out date from
     * @return \DateTime
     */
    public function getCheckOutFrom()
    {
        return new \DateTime($this->_node['dateoutfrom']);
    }

    /**
     * Check-in date till
     * @return \DateTime
     */
    public function getCheckOutTInill()
    {
        return new \DateTime($this->_node['dateintil']);
    }

    /**
     * Check-out date till
     * @return \DateTime
     */
    public function getCheckOutTill()
    {
        return new \DateTime($this->_node['dateouttil']);
    }

    /**
     * Use as “checkin” price
     * @return bool
     */
    public function getUseAsCheckInPrice()
    {
        return (bool) $this->_node['useascheckin'];
    }

    /**
     * Days before check-in from
     * @return int
     */
    public function getDaysCheckInFrom()
    {
        return (int) $this->_node['rqdaysfrom'];
    }

    /**
     * Days before check-in till
     * @return int
     */
    public function getDaysCheckInTill()
    {
        return (int) $this->_node['rqdaystill'];
    }

    /**
     * Nights from
     * @return int
     */
    public function getNightsFrom()
    {
        return (int) $this->_node['nightsfrom'];
    }

    /**
     * Night till
     * @return int
     */
    public function getNightsTill()
    {
        return (int) $this->_node['nightstill'];
    }

    /**
     * For SPO “Rotaion”
     *
     * 0 = By period (season dates contains whole accommodation period)
     *
     * 1 = By check-in (season dates contains check-in date)
     * @return bool
     */
    public function getBySpoRotation()
    {
        return (bool) $this->_node['oncheckin'];
    }

    /**
     * Supplement for adult
     * @return float
     */
    public function getSupplementAdult()
    {
        return (float) $this->_node['adult'];
    }

    /**
     * Supplement for child with bed
     * @return float
     */
    public function getSupplementChildWithBed()
    {
        return (float) $this->_node['child'];
    }

    /**
     * Supplement for child without bed
     * @return float
     */
    public function getSupplementChildNoBed()
    {
        return (float) $this->_node['nobedchild'];
    }

    /**
     * Week days
     * @return string
     */
    public function getDays()
    {
        return (string) $this->_node['days'];
    }
}
