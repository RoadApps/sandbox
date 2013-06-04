<?php 

use Phalcon\Db\Column,
    Phalcon\Db\Index,
    Phalcon\Db\Reference,
    Phalcon\Mvc\Model\Migration;

class VehiclesMigration_101 extends Migration
{

    public function up()
    {
        $this->morphTable('vehicles', array(
            'columns' => array(
                new Column('id', array(
                    'type' => Column::TYPE_INTEGER,
                    'notNull' => true,
                    'autoIncrement' => true,
                    'size' => 11,
                    'first' => true
                )),
                new Column('name', array(
                    'type' => Column::TYPE_VARCHAR,
                    'notNull' => true,
                    'size' => 20,
                    'after' => 'id'
                )),
                new Column('maxCapacityMap', array(
                    'type' => Column::TYPE_VARCHAR,
                    'notNull' => true,
                    'size' => 255,
                    'after' => 'name'
                )),
                new Column('timeWindow', array(
                    'type' => Column::TYPE_VARCHAR,
                    'notNull' => true,
                    'size' => 255,
                    'after' => 'maxCapacityMap'
                )),
                new Column('maxWorkingTime', array(
                    'type' => Column::TYPE_INTEGER,
                    'notNull' => true,
                    'size' => 11,
                    'after' => 'timeWindow'
                )),
                new Column('maxDrivingTime', array(
                    'type' => Column::TYPE_INTEGER,
                    'notNull' => true,
                    'size' => 11,
                    'after' => 'maxWorkingTime'
                )),
                new Column('status', array(
                    'type' => Column::TYPE_CHAR,
                    'notNull' => true,
                    'size' => 1,
                    'after' => 'maxDrivingTime'
                )),
                new Column('created', array(
                    'type' => Column::TYPE_DATETIME,
                    'notNull' => true,
                    'size' => 1,
                    'after' => 'status'
                )),
                new Column('modified', array(
                    'type' => Column::TYPE_DATETIME,
                    'notNull' => true,
                    'size' => 1,
                    'after' => 'created'
                ))
            ),
            'indexes' => array(
                new Index('PRIMARY', array(
                    'id'
                )),
                new Index('name', array(
                    'name'
                ))
            ),
            'options' => array(
                'table_type' => 'BASE TABLE',
                'auto_increment' => '2',
                'engine' => 'InnoDB',
                'table_collation' => 'utf8_general_ci'
            )
        ));
    }

}