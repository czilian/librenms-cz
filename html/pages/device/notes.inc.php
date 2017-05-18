<?php
/*
 * LibreNMS
 *
 * Copyright (c) 2015 Søren Friis Rosiak <sorenrosiak@gmail.com>
 * This program is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.  Please see LICENSE.txt at the top level of
 * the source code distribution for details.
 */
 
$data = dbFetchRow("SELECT `notes` FROM `devices` WHERE device_id = ?", array(
    $device['device_id']
));
<<<<<<< HEAD
=======

$disabled = '';
if (is_admin() === false) {
    $disabled = 'disabled';
}

>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
?>

<form class="form-horizontal" action="" method="post">
    <h3>Device Notes</h3>
    <hr>
    <div class="form-group">
        <div class="col-sm-12">
<<<<<<< HEAD
            <textarea class="form-control" rows="6" name="notes" id="device-notes"><?php echo htmlentities($data['notes']); ?></textarea>
=======
            <textarea class="form-control" rows="6" name="notes" id="device-notes" <?php echo $disabled; ?>><?php echo htmlentities(urldecode($data['notes'])); ?></textarea>
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        </div>
    </div>
    <div class="row">
        <div class="col-md-1 col-md-offset-5">
            <?php
            echo '
<<<<<<< HEAD
                <button type="submit" name="btn-update-notes" id="btn-update-notes" class="btn btn-default" data-device_id="' . $device['device_id'] . '"><i class="fa fa-check"></i> Save</button>
=======
                <button type="submit" name="btn-update-notes" id="btn-update-notes" class="btn btn-default ' . $disabled . '" data-device_id="' . $device['device_id'] . '"><i class="fa fa-check"></i> Save</button>
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
            ';
            ?>
        </div>
    </div>
</form>
<script>
$("[name='btn-update-notes']").on('click', function(event) {
    event.preventDefault();
    var $this = $(this);
    var device_id = $(this).data("device_id");
    var notes = $("#device-notes").val();
    $.ajax({
        type: 'POST',
        url: 'ajax_form.php',
        data: { type: "update-notes", notes: notes, device_id: device_id},
<<<<<<< HEAD
        dataType: "html",
        success: function(data){
            toastr.success('Saved');
=======
        dataType: "json",
        success: function(data){
            if (data.status == "error") {
                toastr.error(data.message);
            } else {
                toastr.success('Saved');
            }
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
        },
        error:function(){
            toastr.error('Error');
        }
    });
});
</script>
<<<<<<< HEAD
=======

<?php
unset($disabled);
?>
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
