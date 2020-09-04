<?php
class Truck extends Vehicle{

    public function bonus()
    {
        $this->state += 50;
    }

}