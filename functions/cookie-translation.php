<?php
/**
 * Created by Wikibyte.org
 * User: McCouman
 * Date: 10.01.16
 * Time: 09:12
 */

//-------------------------------- get_translation() ----------------------------------

function get_translation() {
    $redirect = us_url_is();
    $redirect_action = send_us_cookie_redirect();
    $get_action = $_GET[ "action" ];

    if ( $redirect_action != '' )
    {
        header( "location: " . $redirect . '?action=1' );
    }

    if ( $get_action == '1' )
    {
        header( "location: " . $redirect );
    }
}

### ----//

/**
 * @get redirect to new translation
 * @return string url
 */
function send_us_cookie_redirect() {

    $translation = $_GET[ "translation" ];
    $redirect = us_url_is();

    if ( $translation == 'de' )
    {
        $newCookie = set_us_cookie_de();
    }
    if ( $translation == 'eng' )
    {
        $newCookie = set_us_cookie_eng();
    }

    if ( $newCookie == 'de' || $newCookie == 'eng' )
    {
        $goTo = $redirect;
    }

    return $goTo;
}

/**
 * @cookie Ultraschall->de
 * @set    cookie
 * @return string de
 */
function set_us_cookie_de() {

    $value = 'de';

    //delete old cookie
    setcookie( "Ultraschall", $value, time() - 3600 );

    //set de cookie
    setcookie( "Ultraschall", $value );

    return $value;
}

/**
 * @cookie Ultraschall->eng
 * @set    cookie
 * @return string eng
 */
function set_us_cookie_eng() {

    $value = 'eng';

    //delete old cookie
    setcookie( "Ultraschall", $value, time() - 3600 );

    //set eng cookie
    setcookie( "Ultraschall", $value );

    return $value;
}

### ----//

//--------------------------------- us_cookie_is() -------------------------------------

/**
 * read cookie translation or standard language
 *
 * @return string de|eng
 */
function us_cookie_is() {
    $cookie = $_COOKIE[ "Ultraschall" ];
    $standLang = get_field( "standard_transaltion", 'option' );

    if ( $cookie == 'de' || $cookie == 'eng' )
    {
        if ( $cookie == 'de' )
        {
            return 'de';
        }
        elseif ( $cookie == 'eng' )
        {
            return 'eng';
        }
        else
        {
            return $standLang;
        }
    }
    else
    {
        return $standLang;
    }

}

//--------------------------------- us_url_is() -----------------------------

/**
 * Ultraschall url (checked HTTP or HTTPS protocol)
 *
 * @regex query url
 * @return string url
 */
function us_url_is() {
    $redirect = preg_replace( '/\?.*\z/', '', ultraschall_url() );

    return $redirect;
}

/**
 *
 * @return array
 */
function ultraschall_url() {
    $serverProtocol = $_SERVER[ "SERVER_PROTOCOL" ];
    $pageURL = $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'REQUEST_URI' ];
    $protocol = strtolower( substr( $serverProtocol, 0, strpos( $serverProtocol, '/' ) ) ) . '://';
    $us_url = $protocol . $pageURL;

    return $us_url;
}