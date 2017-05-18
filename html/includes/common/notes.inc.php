<?php

/*
 * LibreNMS
 *
 * Copyright (c) 2015 Neil Lathwood <https://github.com/laf/ http://www.lathwood.co.uk/fa>
 *
 * This program is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.  Please see LICENSE.txt at the top level of
 * the source code distribution for details.
 */

if (defined('SHOW_SETTINGS') || empty($widget_settings)) {
    $common_output[] = '
    <form class="form-horizontal" onsubmit="widget_settings(this); return false;">
        <div class="form-group">
            <div class="col-sm-12">
<<<<<<< HEAD
                html is supported here. If you want just text then wrap in &lt;pre&gt;&lt;/pre&gt;
=======
                The following html tags are supported: &lt;b&gt;, &lt;iframe&gt;, &lt;i&gt;, &lt;ul&gt;, &lt;li&gt;, &lt;h1&gt;, &lt;h2&gt;, &lt;h3&gt;, &lt;h4&gt;, &lt;br&gt;, &lt;p&gt;. If you want just text then wrap in &lt;pre&gt;&lt;/pre&gt;
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
            </div>
        </div>
        <div class="form-group">
            <label for="'.$unique_id.'_notes" class="col-sm-1" control-label"></label>
            <div class="col-sm-11">
                <textarea name="notes" id="'.$unique_id.'_notes" rows="3" class="form-control">'.htmlspecialchars($widget_settings['notes']).'</textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-1">
                <button type="submit" class="btn btn-sm btn-primary">Set</button>
            </div>
        </div>
    </form>';
} else {
<<<<<<< HEAD
    $common_output[] = nl2br(display($widget_settings['notes']));
=======
    $tmp_config = array(
        'HTML.Allowed'    => 'b,iframe,i,ul,li,h1,h2,h3,h4,br,p',
        'HTML.Trusted'    => true,
        'HTML.SafeIframe' => true,
    );
    $common_output[] = display(nl2br($widget_settings['notes']), $tmp_config);
    unset($tmp_config);
>>>>>>> b95d6565525b3f64a4f77dbdc157d7b6b47bbcc7
}
