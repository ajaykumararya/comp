<?php

function my_grade($score)
{
    if ($score >= 80)
        return 'A+';
    elseif ($score >= 70)
        return 'A';
    elseif ($score >= 60)
        return 'B+';
    elseif ($score >= 50)
        return 'B';
    else if ($score >= 40)
        return 'C';
}
?>