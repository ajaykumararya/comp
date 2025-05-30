<?php
function my_grade($score)
{
    if ($score >= 80)
        return 'A+';
    else if ($score >= 70)
        return 'A';
    else if ($score >= 60)
        return 'B+';
    else if ($score >= 50)
        return 'B';
    else if ($score >= 40)
        return 'C';
    else
        return 'Fail';
}