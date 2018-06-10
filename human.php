<?php

class Human {

    protected $gender;
    protected $firstname;
    protected $lastname;
    protected $age;


    protected function __construct(string $gender,string $firstname,string $lastname,int $age){
        $this->gender    = $gender;
        $this->firstname = $firstname;
        $this->lastname  = $lastname;
        $this->age       = $age;
    }

    /**
     * @return string
     */
    public function getGender(){
        return $this->gender;
    }

    /**
     * @return integer
     */
    public function getAge(){
        return $this->age;
    }

    /**
     * @return void
     */
    public function getFullName(){
        echo $this->firstname . ' ' . $this->lastname;
    }

    protected function showAll() {
        echo $this->getFullName(). " gender: ". $this->getGender(). " age: ".$this->getAge(). " ";
    }
}
class Male extends Human {

    private $hasFaceHair;

    public function __construct( string $firstname, string $lastname, int $age, bool $hasFaceHair) {
        parent::__construct("male", $firstname, $lastname, $age);
        $this->hasFaceHair = $hasFaceHair;
    }

    /**
     * @return boolean
     */
    public function getHasFaceHair() {
        return $this->hasFaceHair;
    }

    /**
     * @return void
     */
    public function showDescription() {
        parent::showAll();
        echo "Has face hair: " . $this->getHasFaceHair() ? "has face hair<br>" : "does not have face hair<br>";
    }
}
class Female extends Human {

    private $isPregnant;

    public function __construct(string $firstname, string $lastname, int $age, bool $isPregnant) {
        parent::__construct("female", $firstname, $lastname, $age);
        $this->isPregnant = $isPregnant;
    }

    /**
     * @return void
     */
    public function showDescription() {
        parent::showAll();
        echo "Pregnancy status: ";
        echo $this->isPregnant ? 'pregnant' : 'not pregnant';
        echo "<br>";
    }
}
class HumanFactory {

    public function create($gender, $firstname, $lastname, $age, $personal) {

        switch($gender){
            case 'male' :
                return new Male($firstname, $lastname, $age, $personal);
                break;
            case 'female' :
                return new Female($firstname, $lastname, $age, $personal);
                break;
            default:
                return new Male($firstname, $lastname, $age, $personal);
        }
    }
}

$humanFactory = new HumanFactory();
$male1 = $humanFactory->create("male", "Veljko", "Sirovljevic", 42, false);
$male1->showDescription();
$female1 = $humanFactory->create("female", "Jasna", "Veljkovic", 25, true);
$female1->showDescription();