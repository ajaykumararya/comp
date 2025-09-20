<?php

function my_grade($score)
{
    if ($score >= 90)
        return 'A+';
    elseif ($score >= 75)
        return 'A';
    elseif ($score >= 70)
        return 'B+';
    elseif ($score >= 60)
        return 'B';
    else if ($score >= 50)
        return 'C+';    
    else if ($score >= 40)
        return 'C';
    
    else if ($score >= 33)
        return 'D+';
    else if ($score >= 20)
        return 'D';
    else
        return 'E';

}
?>