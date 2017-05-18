<div class="table-responsive">
    <table id="sensors" class="table table-hover table-condensed storage">
        <thead>
            <tr>
                <th data-column-id="hostname">Device</th>
                <th data-column-id="sensor_descr">Sensor</th>
                <th data-column-id="graph" data-sortable="false" data-searchable="false"></th>
                <th data-column-id="alert" data-sortable="false" data-searchable="false"></th>
                <th data-column-id="sensor_current">Current</th>
<<<<<<< HEAD
                <th data-column-id="sensor_range" data-sortable="false" data-searchable="false">Range limit</th>
=======
                <th data-column-id="sensor_limit_low" data-searchable="false">Low Limit</th>
                <th data-column-id="sensor_limit" data-searchable="false">High Limit</th>
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
            </tr>
        </thead>
    </table>
</div>

<script>
    var grid = $("#sensors").bootgrid({
        ajax: true,
        rowCount: [25,50,100,250,-1],
        post: function ()
        {
            return {
                id:         'sensors',
                view:       '<?php echo $vars['view']; ?>',
                graph_type: '<?php echo $graph_type; ?>',
                unit:       '<?php echo $unit; ?>',
<<<<<<< HEAD
                class:      '<?php echo $class; ?>',
=======
                class:      '<?php echo $class; ?>'
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
            };
        },
        url: "ajax_table.php"
    });
</script>
