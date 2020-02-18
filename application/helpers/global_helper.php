<?php
/**
 * Developer: RSC Byte Limted
 * Website: rscbyte.com
 * phone: 234-8164242320
 * email: nusktecsoft@gmail.com
 * ...................................
 * Helper_global.php
 * 4:26 PM | 2019 | 12
 **/
const FORM_TOKEN_NAME = "formToken";

//get form token
function getFormToken()
{
    $ctx = get_instance();
    if ($ctx->session->has_userdata(FORM_TOKEN_NAME)) {
        return $ctx->session->userdata(FORM_TOKEN_NAME);
    } else {
        setFormToken();
        return $ctx->session->userdata(FORM_TOKEN_NAME);
    }
}

//set form token
function setFormToken()
{
    $ctx = get_instance();
    return $ctx->session->set_userdata(FORM_TOKEN_NAME, sha1(time()));
}

//validate form token
function validateFormToken()
{
    if (isset($_POST['formtoken']) && $_POST['formtoken'] == getFormToken()) {
        return true;
    } else {
        return false;
    }
}

//time ago
function timeago($datetime, $full = false)
{
    $etime = time() - $datetime;

    if ($etime < 1) {
        return '0 seconds';
    }

    $a = array(365 * 24 * 60 * 60 => 'year',
        30 * 24 * 60 * 60 => 'month',
        24 * 60 * 60 => 'day',
        60 * 60 => 'hour',
        60 => 'minute',
        1 => 'second'
    );
    $a_plural = array('year' => 'years',
        'month' => 'months',
        'day' => 'days',
        'hour' => 'hours',
        'minute' => 'min',
        'second' => 'secs'
    );

    $string = null;
    foreach ($a as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
        }
    }
}

//time stamp difference
function dateDiffTs($start_ts, $end_ts)
{
    $diff = $end_ts - $start_ts;
    return round($diff / 86400);
}

//timestamp
function getTimeStamp()
{
    $d = new DateTime();
    return $d->getTimestamp();
}

//file identifier
function fileIdentity($ext)
{
    $ext = strtoupper($ext);
    if (strpos($ext, 'PDF') !== false) {
        return "PDF Document";
    }
    if (strpos($ext, 'DOC') !== false) {
        return "Word Document";
    }
    if (strpos($ext, 'DOCX') !== false) {
        return "Word Document";
    }
    if (strpos($ext, 'PNG') !== false) {
        return "Image File";
    }
    if (strpos($ext, 'JPG') !== false) {
        return "Image File";
    }
    if (strpos($ext, 'JPEG') !== false) {
        return "Image Document";
    }
    if (strpos($ext, 'CSV') !== false) {
        return "Comma Separated File";
    }
    return "Other";
}