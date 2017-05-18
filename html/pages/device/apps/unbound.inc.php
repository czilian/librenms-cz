<?php

global $config;

$graphs = array(
<<<<<<< HEAD
    'unbound_queries' => 'Unbound - Queries'
=======
    'unbound_queries' => 'Unbound - Queries',
    'unbound_cache'   => 'Unbound - Cache'
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
    );
foreach ($graphs as $key => $text) {
    $graph_type            = $key;
    $graph_array['height'] = '100';
    $graph_array['width']  = '215';
    $graph_array['to']     = $config['time']['now'];
    $graph_array['id']     = $app['app_id'];
    $graph_array['type']   = 'application_'.$key;

    echo '<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">'.$text.'</h3>
    </div>
    <div class="panel-body">
    <div class="row">';
    include 'includes/print-graphrow.inc.php';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
