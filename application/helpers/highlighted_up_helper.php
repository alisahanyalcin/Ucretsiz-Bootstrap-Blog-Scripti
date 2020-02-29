<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function highlighted_up($config, $isim){
    $ci = get_instance();
    $ci->upload->initialize($config);

    if ($ci->upload->do_upload($isim)):
        $highlighted = $ci->upload->data();
        $highlighteda = $highlighted['file_name'];
        return $highlighteda;
    else:
        return $ci->upload->display_errors();
    endif;
}