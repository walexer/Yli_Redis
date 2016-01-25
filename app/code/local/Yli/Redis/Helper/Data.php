<?php
class Yli_Redis_Helper_Data extends Mage_Core_Helper_Abstract 
{
    protected $_redis = null;
    
    public function init($db = null){
        
        if(!$this->_redis || $this->_redis->getSelectedDb() != $db){            
            $host = Mage::getStoreConfig('system/redis/server');
            $port = Mage::getStoreConfig('system/redis/port');
            $this->_redis = new Credis_Client($host,$port?$port:'6379');
            if(!$db){
                $db = Mage::getStoreConfig('system/redis/database');
            }
            $this->_redis->select($db);
        }
        return $this->_redis;
        
    }    
}