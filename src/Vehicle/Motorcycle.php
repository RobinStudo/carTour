<?php
namespace Game\Vehicle;

class Motorcycle extends Vehicle{

    public function bonus()
    {
        $this->power += 1;
    }

}