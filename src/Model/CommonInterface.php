<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Vladimir
 * Date: 08.08.14
 * Time: 11:27
 * To change this template use File | Settings | File Templates.
 */

namespace Fruitware\Samo\Models;

interface CommonInterface
{
    public function getId();

    public function getStatus();

    public function getStamp();
}
