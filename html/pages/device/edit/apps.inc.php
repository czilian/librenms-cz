<h3> Applications </h3>
<?php

// Load our list of available applications
<<<<<<< HEAD
foreach (scandir($config['install_dir'].'/includes/polling/applications/') as $file) {
    if (substr($file, -8) == '.inc.php') {
        $applications[] = substr($file, 0, -8);
    }
}

// Check if the form was POSTed
if ($_POST['device']) {
    $updated = 0;
    $param[] = $device['device_id'];
    foreach (array_keys($_POST) as $key) {
        if (substr($key, 0, 4) == 'app_') {
            $param[]   = substr($key, 4);
            $enabled[] = substr($key, 4);
            $replace[] = '?';
        }
    }

    if (count($enabled)) {
        $updated += dbDelete('applications', '`device_id` = ? AND `app_type` NOT IN ('.implode(',', $replace).')', $param);
    } else {
        $updated += dbDelete('applications', '`device_id` = ?', array($param));
    }

    foreach (dbFetchRows('SELECT `app_type` FROM `applications` WHERE `device_id` = ?', array($device['device_id'])) as $row) {
        $app_in_db[] = $row['app_type'];
    }

    foreach ($enabled as $app) {
        if (!in_array($app, $app_in_db)) {
            $updated += dbInsert(array('device_id' => $device['device_id'], 'app_type' => $app, 'app_status' => '', 'app_instance' => ''), 'applications');
        }
    }

    if ($updated) {
        print_message('Applications updated!');
    } else {
        print_message('No changes.');
    }
}//end if

// Show list of apps with checkboxes
echo '<div style="padding: 10px;">';

$apps_enabled = dbFetchRows('SELECT * from `applications` WHERE `device_id` = ? ORDER BY app_type', array($device['device_id']));
if (count($apps_enabled)) {
    foreach ($apps_enabled as $application) {
        $app_enabled[] = $application['app_type'];
    }
}

echo "<div class='row'>
    <div class='col-md-4'>
    <form id='appedit' name='appedit' method='post' action='' role='form' class='form-horizontal'>
    <input type=hidden name=device value='".$device['device_id']."'>
    <table class='table table-hover table-responsive'>
    <tr align=center>
    <th>Enable</th>
    <th>Application</th>
    </tr>
    ";

$row = 1;

foreach ($applications as $app) {
    if (is_integer($row / 2)) {
        $row_colour = $list_colour_a;
    } else {
        $row_colour = $list_colour_b;
    }

    echo "    <tr bgcolor=$row_colour>";
    echo '      <td>';
    echo '        <input type=checkbox'.(in_array($app, $app_enabled) ? ' checked="1"' : '')." name='app_".$app."'>";
    echo '      </td>';
    echo '      <td>'.nicecase($app).'</td>';
    echo '    </tr>
        ';

    $row++;
}

echo '</table>';
echo '<div class="row">
        <div class="col-md-1">
        <button type="submit" name="Submit"  class="btn btn-default"><i class="fa fa-check"></i> Save</button>
        </div>
    </div>
';
echo '</form>';
echo '</div>';
echo '</div>';
=======
$applications = array();
foreach (glob($config['install_dir'] . '/includes/polling/applications/*.inc.php') as $file) {
    $name = basename($file, '.inc.php');
    $applications[$name] = $name;
}

// Generate a list of enabled apps with a value of whether they are discovered or not
$enabled_apps = array_reduce(dbFetchRows(
    'SELECT `app_type`,`discovered` FROM `applications` WHERE `device_id`=? ORDER BY `app_type`',
    array($device['device_id'])
), function ($result, $app) {
    $result[$app['app_type']] = $app['discovered'];
    return $result;
}, array());


echo '<ul class="list-group row">';
foreach ($applications as $app) {
    $modifiers = '';
    $app_text = nicecase($app);
    // check if the app exists in the enable apps array and check if it was automatically enabled
    if (isset($enabled_apps[$app])) {
        $modifiers = ' checked';
        if ($enabled_apps[$app]) {
            $app_text .= '<span class="text-success"> (Discovered)</span>';
            $modifiers .= ' disabled';
        }
    }

    echo '<li class="list-group-item col-xs-12 col-md-6 col-lg-4">';
    echo "<input style='visibility:hidden;width:100px;' type='checkbox' name='application' data-size='small'";
    echo " data-application='$app' data-device_id='{$device['device_id']}'$modifiers>";
    echo '<span style="font-size:medium;padding-left:5px;"> ' . $app_text . '</span>';
    echo '</li>';
}

echo '</ul>';
?>

<script>
    $('[name="application"]').bootstrapSwitch('offColor', 'danger');
    $('input[name="application"]').on('switchChange.bootstrapSwitch', function (event, state) {
        event.preventDefault();
        var $this = $(this);
        var application = $this.data("application");
        var device_id = $this.data("device_id");
        $.ajax({
            type: 'POST',
            url: 'ajax_form.php',
            data: {type: "application-update", application: application, device_id: device_id, state: state},
            success: function(result){
                if (result.status == 0) {
                    toastr.success(result.message);
                } else {
                    toastr.error(result.message);
                    $this.bootstrapSwitch('state', !state, true);
                }
            },
            error: function () {
                toastr.error('Problem with backend');
                $this.bootstrapSwitch('state', !state, true);
            }
        });
    });
</script>
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
