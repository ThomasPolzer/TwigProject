<?php

namespace database;

/** Class Teammembers
 * @property int $id
* @property string $vorname
* @property string $name
* @property string $stadt
* @property string $email
*/

class Teammembers extends \Model
{
    /*    private $id;
        private $vorname;
        private $name;
        private $stadt;
        private $email;
 */


       public function changeEmail($newValue){

          $this->email = $newValue;
          $this ->save();

       }




}