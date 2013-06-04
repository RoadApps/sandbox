<?php 

use Phalcon\Db\Column,
    Phalcon\Db\Index,
    Phalcon\Db\Reference,
    Phalcon\Mvc\Model\Migration;

class RequestsMigration_102 extends Migration
{

    public function up()
    {
        $this->morphTable('requests', array(
            'columns' => array(
                new Column('id', array(
                    'type' => Column::TYPE_INTEGER,
                    'notNull' => true,
                    'autoIncrement' => true,
                    'size' => 11,
                    'first' => true
                )),
                new Column('requestId', array(
                    'type' => Column::TYPE_INTEGER,
                    'notNull' => true,
                    'size' => 11,
                    'after' => 'id'
                )),
                new Column('matrixId', array(
                    'type' => Column::TYPE_INTEGER,
                    'notNull' => true,
                    'size' => 11,
                    'after' => 'requestId'
                )),
                new Column('elapsedTime', array(
                    'type' => Column::TYPE_INTEGER,
                    'notNull' => true,
                    'size' => 11,
                    'after' => 'matrixId'
                )),
                new Column('unreachedWaypointNumbers', array(
                    'type' => Column::TYPE_TEXT,
                    'notNull' => true,
                    'size' => 1,
                    'after' => 'elapsedTime'
                )),
                new Column('unreachedWaypointNames', array(
                    'type' => Column::TYPE_TEXT,
                    'notNull' => true,
                    'size' => 1,
                    'after' => 'unreachedWaypointNumbers'
                )),
                new Column('unneededVehicleNumbers', array(
                    'type' => Column::TYPE_TEXT,
                    'notNull' => true,
                    'size' => 1,
                    'after' => 'unreachedWaypointNames'
                )),
                new Column('unneededVehicleNames', array(
                    'type' => Column::TYPE_TEXT,
                    'notNull' => true,
                    'size' => 1,
                    'after' => 'unneededVehicleNumbers'
                )),
                new Column('routes', array(
                    'type' => Column::TYPE_TEXT,
                    'notNull' => true,
                    'size' => 1,
                    'after' => 'unneededVehicleNames'
                )),
                new Column('warnings', array(
                    'type' => Column::TYPE_TEXT,
                    'notNull' => true,
                    'size' => 1,
                    'after' => 'routes'
                )),
                new Column('created', array(
                    'type' => Column::TYPE_DATETIME,
                    'notNull' => true,
                    'size' => 1,
                    'after' => 'warnings'
                ))
            ),
            'indexes' => array(
                new Index('PRIMARY', array(
                    'id'
                ))
            ),
            'options' => array(
                'table_type' => 'BASE TABLE',
                'auto_increment' => '1',
                'engine' => 'InnoDB',
                'table_collation' => 'utf8_general_ci'
            )
        ));
    }

}