<?php


class Waypoints extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;
     
    /**
     *
     * @var string
     */
    public $name;
     
    /**
     *
     * @var string
     */
    public $location;
     
    /**
     *
     * @var double
     */
    public $latitude;
     
    /**
     *
     * @var double
     */
    public $longitude;
     
    /**
     *
     * @var string
     */
    public $deliveryMap;
     
    /**
     *
     * @var integer
     */
    public $serviceTime;
     
    /**
     *
     * @var string
     */
    public $timeWindows;
     
    /**
     *
     * @var integer
     */
    public $priority;
     
    /**
     *
     * @var string
     */
    public $status;
     
    /**
     *
     * @var string
     */
    public $created;
     
    /**
     *
     * @var string
     */
    public $modified;
     
}
