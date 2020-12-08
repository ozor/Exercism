<?php

function toRna_v2(string $dna_string): string
{
    $complements = [
        "G" => "C",
        "C" => "G",
        "T" => "A",
        "A" => "U",
    ];

    return strtr($dna_string, $complements);
}


function toRna_v3(string $strand): string
{
    $nucleotides = (object) [
        'G' => 'C',
        'C' => 'G',
        'T' => 'A',
        'A' => 'U'
    ];

    return array_reduce(str_split($strand), function($acc, $dna) use ($nucleotides) {
        return $acc . $nucleotides->$dna;
    }, '');
}


function toRna_v4(string $strand): string
{
    return strtr($strand, 'CGTA', 'GCAU');
}
