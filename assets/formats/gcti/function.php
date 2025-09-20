<?php
function my_grade($score)
{
    if ($score >= 75)
        return 'A';
    elseif ($score >= 60) 
        return 'B';
    elseif ($score >= 50)
        return 'C';
    elseif ($score >= 40)
        return 'D';
    else
        return 'Fail';
}
?>