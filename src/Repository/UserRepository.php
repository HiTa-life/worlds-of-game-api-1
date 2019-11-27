<?php

namespace Wog\Repository;

use Wog\Model\UserModel;

class UserRepository
{

    /**
     * UserRepository constructor.
     */
    public function __construct()
    {
    }

    private function getPdo(): \PDO
    {
        return new \PDO(
            "mysql:dbname=worlds_of_game;host=localhost;charset=utf8",
            "root",
            "", [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            ]
        );
    }

    /**
     * @param UserModel $user
     *
     * @throws \PDOException for user exists or errors
     */
    public function insert(UserModel $user): void
    {
        $dbh = $this->getPdo();
        $sth = $dbh->prepare(
            "INSERT INTO"
            . " `users`("
            . "`email`, `password`, `surname`, `first_name`, `last_name`, `phone`, `adress`, `city`, `zip`, `token`"
            . ")"
            . " VALUES (:email,:password,:surname,:first_name,:last_name,:phone,:adress,:city,:zip,:token)"
        );
        $sth->bindValue(":email", $user->getEmail());
        $sth->bindValue(":password", $user->getPassword());
        $sth->bindValue(":surname", $user->getSurname());
        $sth->bindValue(":first_name", $user->getFirstName());
        $sth->bindValue(":last_name", $user->getLastName());
        $sth->bindValue(":phone", $user->getPhone());
        $sth->bindValue(":adress", $user->getAdress());
        $sth->bindValue(":city", $user->getCity());
        $sth->bindValue(":zip", $user->getZip());
        $sth->bindValue(":token", $user->getEmail());
        $sth->execute();
        $user->setToken($user->getEmail());
    }

    /**
     * @return array of UserModel
     */
    public function select(): array
    {
        $dbh = $this->getPdo();
        $sth = $dbh->prepare("SELECT * FROM `users`");
        $sth->setFetchMode(\PDO::FETCH_CLASS, UserModel::class);
        $sth->execute();
        return $sth->fetchAll();
    }

}