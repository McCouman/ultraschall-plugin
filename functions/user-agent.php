<?php
/**
 * Created by Wikibyte.org
 * User: McCouman
 * Date: 06.01.16
 * Time: 22:09
 */

function find_mobile_browser() {
    $user_agent = $_SERVER[ 'HTTP_USER_AGENT' ];
    if ( preg_match( '/(Windows|win|NT|MSIE|x64|IA64|Win64)/i', $_SERVER[ 'HTTP_USER_AGENT' ] ) )
    {
        return 'win';
    }
    elseif ( preg_match( '/(Apple|Mac|iphone|OS|os|mac|Safari|safari)/i', $user_agent ) )
    {
        return 'mac';
    }
    else
    {
        return 'other';
    }
}

function getBrowser() {
    $u_agent = $_SERVER[ 'HTTP_USER_AGENT' ];
    $bname = 'Unknown';
    $platform = 'Unknown';

    //First get the platform?
    if ( preg_match( '/linux/i', $u_agent ) )
    {
        $platform = 'linux';
    }
    elseif ( preg_match( '/macintosh|mac os x/i', $u_agent ) )
    {
        $platform = 'mac';
    }
    elseif ( preg_match( '/windows|win32/i', $u_agent ) )
    {
        $platform = 'win';
    }

    return array(
        'userAgent' => $u_agent,
        'platform'  => $platform
    );
}

function get_downloadButton() {

    $version_number = get_field( 'version', 'option' );
    $version_name = get_field( 'version_name', 'option' );
    $version_date = get_field( 'version_date', 'option' );

    $titleMac = '<a><b>Mac - Ultraschall Download</a></b> <br>
              <center>V.' . $version_number . ' - ' . $version_date . ' (' . $version_name . ')</center>';

    $titleWin = '<a>Windows - Ultraschall Download</a> <br>
              <center>V.' . $version_number . ' - ' . $version_date . ' (' . $version_name . ')</center>';


    // now try it
    $ua = getBrowser();
    $browserType = $ua[ 'platform' ];

    if ( $browserType == "mac" )
    {
        $type = 'apple';
        $hrefAttr = get_field( 'mac_url', 'option' );
        $titleAttr = $titleMac;
    }
    elseif ( $browserType == "win" )
    {
        $type = 'windows';
        $hrefAttr = get_field( 'win_url', 'option' );
        $titleAttr = $titleWin;
    }
    elseif ( $browserType == "linux" )
    {
        $type = 'windows';
        $hrefAttr = get_field( 'win_url', 'option' );
        $titleAttr = $titleWin;
    }
    else
    {
        $type = 'apple';
        $hrefAttr = get_field( 'mac_url', 'option' );
        $titleAttr = $titleMac;
    }

    echo '<a title="' . $titleAttr . '"
            class="uk-button uk-button-success" href="' . $hrefAttr . '" data-uk-tooltip="{pos:\'bottom\'}" >';
    echo 'Download ( <i class="uk-icon-' . $type . '"></i> ' . $version_number . ' )';
    echo '</a>';
}

?>