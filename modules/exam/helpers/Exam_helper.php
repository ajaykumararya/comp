<?php
if (!function_exists('getTopicCounts')) {
    function getTopicCounts($questions)
    {
        return array_reduce($questions, function ($carry, $item) {
            $topic = $item['topic'];
            $carry[$topic] = isset($carry[$topic]) ? $carry[$topic] + 1 : 1;
            return $carry;
        }, []);
    }
}
?>