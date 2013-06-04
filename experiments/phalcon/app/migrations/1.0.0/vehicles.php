<?php 

use Phalcon\Db\Column,
    Phalcon\Db\Index,
    Phalcon\Db\Reference,
    Phalcon\Mvc\Model\Migration;

class VehiclesMigration_100 extends Migration
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
                new Column('status', array(
                    'type' => Column::TYPE_CHAR,
                    'notNull' => true,
                    'size' => 1,
                    'after' => 'name'
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