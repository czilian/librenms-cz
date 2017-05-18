<?php

$hostname = gethostbyid($entry['host']);

unset($icon);
$severity_colour = eventlog_severity($entry['severity']);

<<<<<<< HEAD
$icon = geteventicon($entry['message']);
if ($icon) {
    $icon = '<img src="images/16/'.$icon.'" />';
}

echo '<tr>
  <td>
=======
$icon = "<i class='fa fa-bookmark fa-lg $severity_colour' aria-hidden='true'></i>";

echo '<tr>
  <td>'.$icon.'&nbsp;
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    '.$entry['datetime'].'
  </td>';

if (!isset($vars['device'])) {
    $dev = device_by_id_cache($entry['host']);
    echo '<td>
    '.generate_device_link($dev, shorthost($dev['hostname'])).'
  </td>';
}

if ($entry['type'] == 'interface') {
<<<<<<< HEAD
    $this_if       = ifLabel(getifbyid($entry['reference']));
=======
    $this_if       = cleanPort(getifbyid($entry['reference']));
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    $entry['link'] = '<b>'.generate_port_link($this_if, makeshortif(strtolower($this_if['label']))).'</b>';
} else {
    $entry['link'] = 'System';
}

echo '<td>'.$entry['link'].'</td>';

echo '<td>'.htmlspecialchars($entry['message']).'</td>
</tr>';
