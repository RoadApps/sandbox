<?php


class Vehicles extends \Phalcon\Mvc\Model
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
    public $maxCapacityMap;
     
    /**
     *
     * @var string
     */
    public $timeWindow;
     
    /**
     *
     * @var integer
     */
    public $maxWorkingTime;
     
    /**
     *
     * @var integer
     */
    public $maxDrivingTime;
     
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
     
    /**
     * Independent Column Mapping.
     */
    public function columnMap() {
        return array(
            'id' => 'id', 
            'name' => 'name', 
            'maxCapacityMap' => 'maxCapacityMap', 
            'timeWindow' => 'timeWindow', 
            'maxWorkingTime' => 'maxWorkingTime', 
            'maxDrivingTime' => 'maxDrivingTime', 
            'status' => 'status', 
            'created' => 'created', 
            'modified' => 'modified'
        );
    }

}
