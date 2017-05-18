<?php

$common_output[] = '
<div class="table-responsive">
    <table id="eventlog" class="table table-hover table-condensed table-striped">
        <thead>
            <tr>
<<<<<<< HEAD
=======
                <th data-column-id="eventicon"></th>
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
                <th data-column-id="datetime" data-order="desc">Datetime</th>
                <th data-column-id="hostname">Hostname</th>
                <th data-column-id="type">Type</th>
                <th data-column-id="message">Message</th>
<<<<<<< HEAD
=======
                <th data-column-id="username">User</th>
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
            </tr>
        </thead>
    </table>
</div>
<script>

var eventlog_grid = $("#eventlog").bootgrid({
    ajax: true,
    post: function ()
    {
        return {
            id: "eventlog",
            device: "' .mres($vars['device']) .'",
            eventtype: "' .mres($vars['eventtype']) .'",
        };
    },
    url: "ajax_table.php"
});

</script>
';
