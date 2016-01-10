<?php
/**
 * Created by Wikibyte.org
 * User: McCouman
 * Date: 04.01.16
 * Time: 22:53
 */

/**
 * [us_version] => 2.0
 * [us_version name="1"] => 2.0 Gropius
 * [us_version date="1"] => 2.0 - 9.12.2015
 * [us_version text="Version"] => Version 2.0
 *
 * [us_version name="1" date="1" text="Version"] => Version 2.0 Gropius – 9.12.2015
 */
add_shortcode( 'us_version', 'us_version_shortcode' );
function us_version_shortcode( $atts ) {

    //VARS
    extract( shortcode_atts( array(
            'name' => '',       //1 =>
            'date' => '',       //1 => 12.09.2015
            'text' => '',       //text => "Version" or others...
        ), $atts
        )
    );

    //global vars
    $global_version = get_field( 'version', 'option' );
    $global_version_name = get_field( 'version_name', 'option' );
    $global_version_date = get_field( 'version_date', 'option' );

    //---------------- if globals -------------------------------

    # version numbers
    if ( $global_version != '' )
    {
        $v_num = esc_attr( $global_version );
    }
    else
    {
        $v_num = 'X.X.X';
    }

    //---------------- if attr -------------------------------

    if ( esc_attr( $name ) == '1' )
    {
        $v_name = '';

        # version name
        if ( $global_version_name != '' )
        {
            $v_name = esc_attr( $global_version_name );
        }
        else
        {
            $v_name = 'No Version Name!';
        }
    }

    if ( esc_attr( $date ) == '1' )
    {
        $v_date = '';

        # version date
        if ( $global_version_date != '' )
        {
            $v_date = ' - ' . esc_attr( $global_version_date );
        }
        else
        {
            $v_date = ' - ' . '00.00.0000';
        }
    }

    if ( esc_attr( $text ) != '' )
    {
        $give_text = esc_attr( $text );
    }

    //Out:   Version           2.0           Gropius – 9.12.2015
    $out = $give_text . ' ' . $v_num . ' ' . $v_name . $v_date;

    return $out;
}

/**
 * [v_name] => 2.0 Gropius
 */
add_shortcode( 'v_name', 'us_versionname_shortcode' );
function us_versionname_shortcode( $atts ) {

    $global_version_name = get_field( 'version_name', 'option' );
    if ( $global_version_name != '' )
    {
        $v_name = esc_attr( $global_version_name );
    }
    else
    {
        $v_name = 'No Version Name!';
    }

    return $v_name;
}

/**
 * [v_date] => 9.12.2015
 */
add_shortcode( 'v_date', 'us_versiondate_shortcode' );
function us_versiondate_shortcode( $atts ) {

    //global vars
    $global_version_date = get_field( 'version_date', 'option' );
    if ( $global_version_date != '' )
    {
        $v_date = esc_attr( $global_version_date );
    }
    else
    {
        $v_date = '00.00.0000';
    }

    return $v_date;
}
