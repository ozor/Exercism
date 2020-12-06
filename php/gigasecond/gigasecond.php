<?php

function from (DateTimeImmutable $date): DateTimeImmutable
{
    return $date->add(DateInterval::createFromDateString( pow(10, 9) . " seconds"));
}
