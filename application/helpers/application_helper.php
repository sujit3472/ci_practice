<?php 
function test_method()
{
	echo "Custome test helper";
}

function fn_formatted_Date($datetime, $full = false) { 
    $now  = new DateTime;
    $ago  = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w  = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $arrDurationFormat = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($arrDurationFormat as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($arrDurationFormat[$k]);
        }
    }

    if (!$full) $arrDurationFormat = array_slice($arrDurationFormat, 0, 1);
    return $arrDurationFormat ? implode(', ', $arrDurationFormat) . ' ago' : 'just now';
}
?>