<?php
/**
 * Created by Wikibyte.org
 * User: McCouman
 * Date: 04.01.16
 * Time: 22:53
 */

/**
 * [yt_button] => youtube rss feed
 * [yt_button text="RSS Feed" type="primary" icon="youtube"] => youtube rss feed
 */
add_shortcode( 'yt_button', 'us_youtubeButton_shortcode' );
function us_youtubeButton_shortcode( $atts ) {

    //VARS
    extract( shortcode_atts( array(
            'text'  => '',       //(string)
            'icon'  => '',       //github
            'type' => '',       //primary, success, danger, link
        ), $atts
        )
    );

    // ----------------- wp vars -------------------

    if ( esc_attr( $text ) != '' )
    {
        $set_text = $text;
    }
    else
    {
        $set_text = 'Abonnieren';
    }

    if ( esc_attr( $type ) != '' )
    {
        $buttonClass = 'class="uk-button uk-button-' . $type . '"';
    }
    else
    {
        $buttonClass = 'class="uk-button"';
    }

    if ( esc_attr( $icon ) != '' )
    {
        $iconClass = '<i class="uk-icon-' . $icon . '"></i> ';
    }

    #<i class="uk-icon-button uk-icon-github"></i>

    // ----------------- global vars -----------------

    $global_yt_user = get_field( 'yt_user', 'option' );
    if ( $global_yt_user != '' )
    {
        $yt_user = esc_attr( $global_yt_user );
    }

    // ----------------- outputs ----------------------

    $httpLink = 'https://www.youtube.com/feeds/videos.xml?user=' . $yt_user;
    $out = '<a ' . $buttonClass . ' href="' . $httpLink . '">' . $iconClass . $set_text . '</a>';

    return $out;
}

/**
 * [yt_channel] => youtube channel rss feed
 */
add_shortcode( 'yt_channel', 'us_youtubeChannelButton_shortcode' );
function us_youtubeChannelButton_shortcode( $atts ) {

    //global vars
    $global_yt_channel = get_field( 'yt_channel', 'option' );
    if ( $global_yt_channel != '' )
    {
        $yt_channel = esc_attr( $global_yt_channel );
    }

    $httpLink = 'https://www.youtube.com/feeds/videos.xml?channel_id=' . $yt_channel;
    $out = '<a href="' . $httpLink . '">RSS Channel</a>';

    //https://www.youtube.com/feeds/videos.xml?channel_id=
    return $out;
}
