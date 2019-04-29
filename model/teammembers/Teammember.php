<?php


namespace model\teammembers;


class Teammember
{

    private $vorname;
    private $name;
    private $stadt;
    private $email;
    private $teammembers = [];

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return array
     */
    public function getTeammembers(): array
    {
        return $this->teammembers;
    }

    /**
     * @param array $teammembers
     */
    public function setTeammembers(array $teammembers)
    {
        $this->teammembers = $teammembers;
    }


    /**
     * @return mixed
     */
    public function getVorname()
    {
        return $this->vorname;
    }

    /**
     * @param mixed $vorname
     */
    public function setVorname($vorname)
    {
        $this->vorname = $vorname;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getStadt()
    {
        return $this->stadt;
    }

    /**
     * @param mixed $Stadt
     */
    public function setStadt($stadt)
    {
        $this->stadt = $stadt;
    }


}