<?php

function toRna(string $dna): string
{
    $replacements = [
        'G' => 'C',
        'C' => 'G',
        'T' => 'A',
        'A' => 'U',
    ];

    $nucleotides = array_map(function($nucleotide) use ($replacements) {
        return $replacements[$nucleotide];
    }, str_split($dna));

    return implode('', $nucleotides);
}