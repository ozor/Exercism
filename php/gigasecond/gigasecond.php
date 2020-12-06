<?php

function from (DateTimeImmutable $date)
{
    return $date->add(DateInterval::createFromDateString( pow(10, 9) . " seconds"));
}
