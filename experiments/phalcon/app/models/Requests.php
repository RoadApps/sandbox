<?php


class Requests extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;
     
    /**
     *
     * @var integer
     */
    public $requestId;
     
    /**
     *
     * @var integer
     */
    public $matrixId;
     
    /**
     *
     * @var integer
     */
    public $elapsedTime;
     
    /**
     *
     * @var string
     */
    public $unreachedWaypointNumbers;
     
    /**
     *
     * @var string
     */
    public $unreachedWaypointNames;
     
    /**
     *
     * @var string
     */
    public $unneededVehicleNumbers;
     
    /**
     *
     * @var string
     */
    public $unneededVehicleNames;
     
    /**
     *
     * @var string
     */
    public $routes;
     
    /**
     *
     * @var string
     */
    public $warnings;
     
    /**
     *
     * @var string
     */
    public $created;
     
    /**
     * Independent Column Mapping.
     */
    public function columnMap() {
        return array(
            'id' => 'id', 
            'requestId' => 'requestId', 
            'matrixId' => 'matrixId', 
            'elapsedTime' => 'elapsedTime', 
            'unreachedWaypointNumbers' => 'unreachedWaypointNumbers', 
            'unreachedWaypointNames' => 'unreachedWaypointNames', 
            'unneededVehicleNumbers' => 'unneededVehicleNumbers', 
            'unneededVehicleNames' => 'unneededVehicleNames', 
            'routes' => 'routes', 
            'warnings' => 'warnings', 
            'created' => 'created'
        );
    }

}
