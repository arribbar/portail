<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Addinfojoboffredisponibilite extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('info_job_offre_disponibilite', array(
             'offre_id' => 
             array(
              'type' => 'integer',
              'primary' => true,
              'length' => 8,
             ),
             'disponibilite_id' => 
             array(
              'type' => 'integer',
              'primary' => true,
              'length' => 8,
             ),
             ), array(
             'indexes' => 
             array(
             ),
             'primary' => 
             array(
              0 => 'offre_id',
              1 => 'disponibilite_id',
             ),
             'collate' => 'utf8_unicode_ci',
             'charset' => 'utf8',
             ));
    }

    public function down()
    {
        $this->dropTable('info_job_offre_disponibilite');
    }
}