<?php

if ($bg == $list_colour_a) {
    $bg = $list_colour_b;
} else {
    $bg = $list_colour_a;
}

unset($icon);
$severity_colour = eventlog_severity($entry['severity']);

<<<<<<< HEAD
$icon = geteventicon($entry['message']);
if ($icon) {
    $icon = "<img src='images/16/$icon'>";
}

echo '<tr">
  <td></td>
  <td>
=======
$icon = "<i class='fa fa-bookmark fa-lg $severity_colour' aria-hidden='true'></i>";

echo '<tr">
  <td>'.$icon.'&nbsp;
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    '.$entry['humandate'].'
  </td>
  <td>';

if ($entry['type'] == 'interface') {
<<<<<<< HEAD
    $entry['link'] = '<b>'.generate_port_link(getifbyid($entry['reference'])).'</b>';
}

  echo $entry['link'].' '.htmlspecialchars($entry['message']).'</td>
  <td></td>
=======
    $entry['link'] = '<b>'.generate_port_link(cleanPort(getifbyid($entry['reference']))).'</b>';
}

  echo $entry['link'].' '.htmlspecialchars($entry['message']).'</td>
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
</tr>';
