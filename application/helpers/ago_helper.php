<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function time_ago($zaman){
    $zaman =  strtotime($zaman);
    $zaman_farki = time() - $zaman;
    $saniye = $zaman_farki;
    $dakika = round($zaman_farki/60);
    $saat = round($zaman_farki/3600);
    $gun = round($zaman_farki/86400);
    $hafta = round($zaman_farki/604800);
    $ay = round($zaman_farki/2419200);
    $yil = round($zaman_farki/29030400);
    if( $saniye < 60 ):
        if ($saniye == 0):
            return "az önce";
        else:
            return $saniye .' saniye önce';
        endif;
    elseif ( $dakika < 60 ):
        return $dakika .' dakika önce';
    elseif ( $saat < 24 ):
        return $saat.' saat önce';
    elseif ( $gun < 7 ):
        return $gun .' gün önce';
    elseif ( $hafta < 4 ):
        return $hafta.' hafta önce';
    elseif ( $ay < 12 ):
        return $ay .' ay önce';
    else:
        return $yil.' yıl önce';
    endif;
}