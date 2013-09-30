<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Addinfojoboffre extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('info_job_offre', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => 8,
              'autoincrement' => true,
              'primary' => true,
             ),
             'categorie_id' => 
             array(
              'type' => 'integer',
              'notnull' => true,
              'length' => 8,
             ),
             'user_id' => 
             array(
              'type' => 'integer',
              'length' => 8,
             ),
             'titre' => 
             array(
              'type' => 'string',
              'notnull' => true,
              'length' => 250,
             ),
             'texte' => 
             array(
              'type' => 'string',
              'notnull' => true,
              'length' => NULL,
             ),
             'lieu' => 
             array(
              'type' => 'string',
              'length' => 250,
             ),
             'remuneration' => 
             array(
              'type' => 'string',
              'notnull' => true,
              'length' => 250,
             ),
             'email' => 
             array(
              'type' => 'string',
              'length' => 100,
             ),
             'telephone' => 
             array(
              'type' => 'string',
              'length' => 20,
             ),
             'validation_date' => 
             array(
              'type' => 'datetime',
              'length' => NULL,
             ),
             'expiration_date' => 
             array(
              'type' => 'datetime',
              'length' => NULL,
             ),
             'archivage_date' => 
             array(
              'type' => 'datetime',
              'length' => NULL,
             ),
             'emailkey' => 
             array(
              'type' => 'string',
              'notnull' => true,
              'length' => 32,
             ),
             'validationkey' => 
             array(
              'type' => 'string',
              'notnull' => true,
              'length' => 32,
             ),
             'created_at' => 
             array(
              'notnull' => true,
              'type' => 'timestamp',
              'length' => 25,
             ),
             'updated_at' => 
             array(
              'notnull' => true,
              'type' => 'timestamp',
              'length' => 25,
             ),
             ), array(
             'indexes' => 
             array(
             ),
             'primary' => 
             array(
              0 => 'id',
             ),
             'collate' => 'utf8_unicode_ci',
             'charset' => 'utf8',
             ));
    }

    public function down()
    {
        $this->dropTable('info_job_offre');
    }
}