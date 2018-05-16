<?php
include_once( "Database.php" );

abstract class ItemMenu extends Database
{

    public function initDB()
    {
        parent::__construct();
    }
}
