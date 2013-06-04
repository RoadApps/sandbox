<?php 

use Phalcon\Db\Column,
    Phalcon\Db\Index,
    Phalcon\Db\Reference,
    Phalcon\Mvc\Model\Migration;

class WaypointsMigration_102 extends Migration
{

    public function up()
    {
        $this->morphTable('waypoints', array(
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
                    'size' => 50,
                    'after' => 'id'
                )),
                new Column('location', array(
                    'type' => Column::TYPE_VARCHAR,
                    'notNull' => true,
                    'size' => 255,
                    'after' => 'name'
                )),
                new Column('latitude', array(
                    'type' => Column::TYPE_DECIMAL,
                    'size' => 12,
                    'after' => 'location'
                )),
                new Column('longitude', array(
                    'type' => Column::TYPE_DECIMAL,
                    'size' => 12,
                    'after' => 'latitude'
                )),
                new Column('deliveryMap', array(
                    'type' => Column::TYPE_VARCHAR,
                    'notNull' => true,
                    'size' => 100,
                    'after' => 'longitude'
                )),
                new Column('serviceTime', array(
                    'type' => Column::TYPE_INTEGER,
                    'size' => 11,
                    'after' => 'deliveryMap'
                )),
                new Column('timeWindows', array(
                    'type' => Column::TYPE_VARCHAR,
                    'size' => 255,
                    'after' => 'serviceTime'
                )),
                new Column('priority', array(
                    'type' => Column::TYPE_INTEGER,
                    'size' => 4,
                    'after' => 'timeWindows'
                )),
                new Column('status', array(
                    'type' => Column::TYPE_CHAR,
                    'notNull' => true,
                    'size' => 1,
                    'after' => 'priority'
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