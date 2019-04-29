<?php


namespace model\teammembers;

include '../model/db/DB_metadata.php';
include '../model/teammembers/Teammember.php';
use model\db;
use mysql_xdevapi\Exception;


class DB_teammember extends db\DB_metadata
{

    public function getTeammembers()
    {
        $teammembers = [];


        try {

            $mydb = new \mysqli($this->host, $this->user, $this->pw, $this->db);
           // $mydb = new \mysqli('localhost', 'testuser', 'testuser', 'testuser');
            $sql = 'SELECT * FROM teammembers';

            $ergebnis = $mydb->query($sql);

            while ($row = $ergebnis->fetch_object()){
                $vorname = $row->vorname;
                $name = $row->name;
                $stadt = $row->city;
                $mail = $row->email;

                //$teammember = array('vorname'=> $vorname, 'name' => $name, 'stadt' => $stadt, 'email' => $mail);

                $teammember = new Teammember();
                $teammember->setName($name);
                $teammember->setVorname($vorname);
                $teammember->setStadt($stadt);
                $teammember->setEmail($mail);

                array_push($teammembers, $teammember);

            }

        } catch (Exception $ex){
            echo $ex->getMessage();
        }


        return $teammembers;
    }

}