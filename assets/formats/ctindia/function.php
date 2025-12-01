<?php

function my_grade($score)
{
    if ($score >= 85)
        return 'A+';
    elseif ($score >= 70)
        return 'A';
    elseif ($score >= 50)
        return 'B';
    elseif ($score >= 40)
        return 'C';

    return 'Fail';

}
?>