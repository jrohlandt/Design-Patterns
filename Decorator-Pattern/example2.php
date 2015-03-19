<?php

interface DoMath
{
    public function calculate($int1, $int2);
}


class Addition implements DoMath
{
    public function calculate($int1, $int2)
    {
        return $int1 + $int2;
    }
}


$math = new Addition;

echo $math->calculate(1, 1);