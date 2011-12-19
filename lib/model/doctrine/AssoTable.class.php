<?php

/**
 * AssoTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AssoTable extends Doctrine_Table
{

  /**
   * Returns an instance of this class.
   *
   * @return object AssoTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('Asso');
  }

  /**
   * 
   * Fetch the list of all associations sorted by name.
   * 
   * TODO : Add more parameters to specify the associations we want
   * 
   * @param int $pole_id
   */
  public function getAssosList($pole_id = null)
  {
    $q = $this->createQuery('a')
			->select('a.*, p.*, pa.name')
			->leftJoin('a.Pole p')
			->leftJoin('p.Asso pa')
      ->addOrderBy('a.name ASC');

    if(!is_null($pole_id))
      $q = $q->where("a.pole_id = ?",$pole_id);

    return $q;
  }

  /**
   * 
   * Fetch the list of all associations sorted by name.
   * 
   * 
   * @param int $pole_id
   */
  public function getAssosAndNotPolesList($pole_id = null)
  {
    $q = $this->createQuery('a')
			->select('a.*, p.*, pa.name')
			->leftJoin('a.Pole p')
			->leftJoin('p.Asso pa')
			->where('a.pole_id IS NOT NULL')
      ->addOrderBy('a.name ASC');

    if(!is_null($pole_id))
      $q = $q->where("a.pole_id = ?",$pole_id);

    return $q->execute();
  }


  public function getMyAssos($user_id)
  {
    $q = $this->createQuery('q')
      ->leftJoin('q.AssoMember m')
      ->where('m.user_id = ?',$user_id);
    return $q;
  }
  
  public function getRandom()
  {
    $q = $this->createQuery('q')
      ->orderBy('RAND()');
    return $q->fetchOne();
  }

  /**
   * 
   * Method to use the zend framework for search
   * Give the response of a search query 
   * * @param unknown_type $query
   */
  public function getForLuceneQuery($query)
  {
    $hits = self::getLuceneIndex()->find($query);

    $pks = array();
    foreach($hits as $hit)
    {
      $pks[] = $hit->pk;
    }

    if(empty($pks))
    {
      return array();
    }

    $q = $this->createQuery('a')
      ->whereIn('a.id',$pks)
      ->limit(20);

    return $q->execute();
  }

  /**
   * 
   * Method to use the zend framework for search
   * Get or create the index file
   */
  static public function getLuceneIndex()
  {
    ProjectConfiguration::registerZend();

    if(file_exists($index = self::getLuceneIndexFile()))
    {
      return Zend_Search_Lucene::open($index);
    }
    else
    {
      return Zend_Search_Lucene::create($index);
    }
  }

  /**
   * 
   * Method to use the zend framework for search
   * Give the index file if exists
   */
  static public function getLuceneIndexFile()
  {
    return sfConfig::get('sf_data_dir').'/asso.'.sfConfig::get('sf_environment').'.index';
  }

}
