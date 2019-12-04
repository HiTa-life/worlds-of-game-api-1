<?php

namespace Wog\Database;

class Manager
{

    private static
        /**
         * @var \PDO
         */
        $connection;

    private function __construct(

    )
    {
        Manager::$connection = new \PDO(
            "mysql:dbname=worlds_of_game;host=localhost;charset=utf8",
            "root",
            "", [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            ]
        );
    }

    /**
     * @return \PDO
     */
    public static function getConnection(): \PDO
    {
        if (null === Manager::$connection) {
            new Manager;
        }
        return Manager::$connection;
    }

}
