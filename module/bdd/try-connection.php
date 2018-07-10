<?php
      try {
        //   $this->PDOInstance = new \PDO('mysql:dbname=drawer;host='.self::DEFAULT_SQL_HOST,self::DEFAULT_SQL_USER ,self::DEFAULT_SQL_PASS);    
          return new PDO('mysql:host='.$params['host'].';dbname='.$params['databasename'], $params['user'], $params['pwd']);
          
        //   $this->PDOInstance = new \PDO('mysql:dbname='.self::DEFAULT_SQL_DTB.';host='.self::DEFAULT_SQL_HOST,self::DEFAULT_SQL_USER ,self::DEFAULT_SQL_PASS);    
      }
      catch(PDOException $e) {
          return utf8_encode($e->getMessage());
      }