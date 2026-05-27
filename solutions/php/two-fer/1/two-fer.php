<?php

function twoFer(?string $name = 'you'): string
{
    return sprintf('One for %s, one for me.', $name ?: 'you');
}