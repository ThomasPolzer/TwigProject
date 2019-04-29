<?php

class PC_customer extends \model\customers\customer\Customer {

    private $reading = "";
    private $locked = TRUE;

    /**
     * @return string
     */
    public function getReading()
    {
        return $this->reading;
    }

    /**
     * @param string $reading
     */
    public function setReading($reading)
    {
        $this->reading = $reading;
    }

    /**
     * @return bool
     */
    public function isLocked()
    {
        return $this->locked;
    }

    /**
     * @param bool $locked
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;
    }




}