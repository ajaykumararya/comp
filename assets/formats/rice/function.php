<?php
function my_grade($score)
{
    if ($score >= 90)
        return 'A+';
    elseif ($score >= 70)
        return 'A';
    elseif ($score >= 50)
        return 'B';
    elseif ($score >= 30)
        return 'C';
    else
        return 'Fail';
}