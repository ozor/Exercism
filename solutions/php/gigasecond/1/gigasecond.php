<?php

function from (DateTimeImmutable $date)
{
    $date = (new DateTimeImmutable())
        ->setTimestamp($date->getTimestamp())
        ->setTimezone(new DateTimeZone('UTC'))
        ->add(DateInterval::createFromDateString( pow(10, 9) . " seconds"))
    ;

    return $date;
}
