<?php
namespace Game;

final class Player{
    private $username;
    private $team;
    private $vehicle;

    private $level = 1;
    private $care;

    private static $counter = 0;

    public function __construct( $username, $team, $vehicle, $level )
    {
        $this->username = $username;
        $this->team = $team;
        $this->vehicle = $vehicle;

        if( is_int( $level ) && $level > 0 && $level <= 100 ){
            $this->level = $level;
        }

        $this->care = mt_rand( 0, 5 );

        self::$counter++;
    }

    public function drive()
    {
        if( $this->vehicle->isStart() ){
            $performance = $this->estimatePerformance();

            if( $performance < 10 ){
                $this->vehicle->decreaseSpeed();
            }else if( $performance > 50 ){
                $this->vehicle->increaseSpeed();
            }
        }else{
            $this->vehicle->start();
            $this->vehicle->bonus();
            $this->vehicle->increaseSpeed();
        }

        return $this->vehicle->getSpeed();
    }

    public function getIdentity()
    {
        return $this->username . ' - ' . $this->team;
    }

    private function estimatePerformance()
    {
        $limit = 100;
        $limit += $this->care * 2;
        $performance = mt_rand( 0, $limit );
        $performance += round( $this->level / 10 );

        return $performance;
    }

    public static function getCounter()
    {
        return self::$counter;
    }
}

