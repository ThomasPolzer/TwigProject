<?php

namespace controller;

//use model\customers\customer\Customer;
trait MyTraits {

    function change_idnumber () {

        $currentid = $this->getId();
        //$mycustomer = new Customer();

        $newid = $currentid + 5;


        $this->setId($newid);
        //$mycustomer->setName("Thomas der Große");
        //$mycustomer->setCity("Recklinghausen-Suderwich");

        return $newid;
    }


    function calculatemarginvalue ($mynumber) {
        $factor = $this->getId();

        $mymarginvalue = $factor * $mynumber;

        return $mymarginvalue;
    }


}

