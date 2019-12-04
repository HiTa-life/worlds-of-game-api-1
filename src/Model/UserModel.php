<?php

namespace Wog\Model;

class UserModel implements \JsonSerializable
{

    private
        /**
         * @var string
         */
        $email,
        /**
         * @var string
         */
        $password,
        /**
         * @var string
         */
        $surname,
        /**
         * @var string
         */
        $firstName,
        /**
         * @var string
         */
        $lastName,
        /**
         * @var string
         */
        $phone,
        /**
         * @var string
         */
        $adress,
        /**
         * @var string
         */
        $city,
        /**
         * @var string
         */
        $zip,
        /**
         * @var string
         */
        $token;

    public function __construct(\stdClass $data = null)
    {
        if (null === $data) {
            return;
        }
        foreach ($this as $key => $value) {
            if (property_exists($data, $key)) {
                $this->$key = $data->$key;
            }
        }
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getSurname(): ?string
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname($surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return string
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getAdress(): ?string
    {
        return $this->adress;
    }

    /**
     * @param string $adress
     */
    public function setAdress($adress): void
    {
        $this->adress = $adress;
    }

    /**
     * @return string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getZip(): ?string
    {
        return $this->zip;
    }

    /**
     * @param string $zip
     */
    public function setZip($zip): void
    {
        $this->zip = $zip;
    }

    /**
     * @return string
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken($token): void
    {
        $this->token = $token;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return [
            "email" => $this->email,
            "surname" => $this->surname,
            "firstName" => array_key_exists("first_name", $this) ? $this->first_name : $this->firstName,
            "lastName" => array_key_exists("last_name", $this) ? $this->last_name : $this->lastName,
            "phone" => $this->phone,
            "adress" => $this->adress,
            "city" => $this->city,
            "zip" => $this->zip,
        ];
    }

}