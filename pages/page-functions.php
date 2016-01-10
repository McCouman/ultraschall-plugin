<?php
/**
 * Created by Wikibyte.org
 * User: McCouman
 * Date: 05.01.16
 * Time: 23:18
 */

//------------------------- page content ------------------------

function get_content( $language ) {
    $content_settings = get_field( 'content_settings' );

    //wp page content
    if ( $content_settings == 'box' )
    {
        get_box_content( $language );
    }
    if ( $content_settings == 'page' )
    {
        get_page_content( $language );
    }

    //css
    get_page_css();

}

function get_page_css() {
    $page_css = get_field( 'css' );
    echo '<style>' . $page_css . '</style>';
}

//------------------------- all grids ------------------------

function get_box_content( $language ) {

    if ( have_rows( 'content' ) )
    {
        while ( have_rows( 'content' ) ) : the_row();

            //all girds
            grid_full( $language );
            grid_1_2_editor( $language );
            grid_1_2_input( $language );

        endwhile;
    }
    else
    {
        echo 'Error: content mismatch!';
    }
}

// ----------------------------------- Box Grids --------------------------------------------

/**
 * GRID: Full
 *
 * @param $languarge
 */
function grid_full( $language ) {

    $maxWidth = get_sub_field( 'width' );
    $backgroundColor = 'background-color: ' . get_sub_field( 'background_color' ) . '; ';
    $padding = 'padding: ' . get_sub_field( 'padding' ) . '; ';
    $center = get_sub_field( 'center' );

    $css = '<style>' . get_sub_field( 'box_css' ) . '</style>';
    $hash = md5( get_sub_field( 'grid_full_de' ) );

    # uk-margin-large-top | uk-margin-large-bottom
    $selected = get_sub_field( 'easy_margin' );
    if ( in_array( 'top', $selected ) )
    {
        $top = 'uk-margin-large-top';
    }

    if ( in_array( 'bottom', $selected ) )
    {
        $bottom = 'uk-margin-large-bottom';
    }

    if ( $top != '' || $bottom != '' )
    {
        $margin = ' class="' . $top . ' ' . $bottom . '"';
    }

    if ( $center != 'no' )
    {
        $center_1 = '<center>';
        $center_2 = '</center>';
    }

    if ( get_sub_field( 'effects' ) != 'no' )
    {
        $animation_center = get_sub_field( 'effects' );
        $a_center = 'data-uk-scrollspy="{cls:\'uk-animation-' . $animation_center . '\', repeat: false}"';
    }

    if ( get_row_layout() == 'full' )
    {
        echo '<div id="ultraschall-box-' . $hash . '" style="' . $backgroundColor . '"' . $margin . '>';
        echo '<div class="uk-container uk-container-center"
                style="max-width: ' . $maxWidth . 'px;' . $backgroundColor . '' . $padding . '">';

        echo '<div id="us-box-image"></div>';

        echo '<div class="uk-grid" ' . $a_center . ' data-uk-grid-margin="">';

        echo '<div class="uk-width-medium-1">';

        echo $center_1;
        echo the_sub_field( 'grid_full_' . $language );
        echo $center_2;

        echo '</div>';

        echo $css;
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}

/**
 * GRID: Half-Half Editor
 *
 * @param $languarge
 */
function grid_1_2_editor( $language ) {

    if ( get_row_layout() == 'half-half' )
    {
        $maxWidth = get_sub_field( '22_width' );
        $backgroundColor = 'background-color: ' . get_sub_field( '22_background_color' ) . '; ';
        $padding = 'padding: ' . get_sub_field( '22_padding' ) . '; ';
        $center = get_sub_field( '22_center' );

        $css = '<style>' . get_sub_field( '22_box_css' ) . '</style>';
        $hash = md5( get_sub_field( 'grid_left_de' ) );

        # uk-margin-large-top | uk-margin-large-bottom
        $selected = get_sub_field( '22_easy_margin' );
        if ( in_array( 'top', $selected ) )
        {
            $top = 'uk-margin-large-top';
        }

        if ( in_array( 'bottom', $selected ) )
        {
            $bottom = 'uk-margin-large-bottom';
        }

        if ( $top != '' || $bottom != '' )
        {
            $margin = ' class="' . $top . ' ' . $bottom . '"';
        }

        if ( $center != 'no' )
        {
            $center_1 = '<center>';
            $center_2 = '</center>';
        }

        if ( get_sub_field( '22_animation_left' ) != 'no' )
        {
            $animation_left = get_sub_field( '22_animation_left' );
            $a_left = 'data-uk-scrollspy="{cls:\'uk-animation-' . $animation_left . '\', repeat: false}"';
        }
        if ( get_sub_field( '22_animation_right' ) != 'no' )
        {
            $animation_right = get_sub_field( '22_animation_right' );
            $a_right = 'data-uk-scrollspy="{cls:\'uk-animation-' . $animation_right . '\', repeat: false}"';
        }

        echo '<div id="ultraschall-box-' . $hash . '" style="' . $backgroundColor . '"' . $margin . '>';
        echo '<div class="uk-container uk-container-center"
                style="max-width: ' . $maxWidth . 'px;' . $backgroundColor . '' . $padding . '">';
        echo '<div class="uk-grid" data-uk-grid-margin="">';

        echo '<div class="uk-width-medium-1-2" ' . $a_left . ' data-uk-grid-margin="">';
        echo the_sub_field( 'grid_left_' . $language );
        echo '</div>';

        echo '<div class="uk-width-medium-1-2" ' . $a_right . ' data-uk-grid-margin="">';
        echo the_sub_field( 'grid_right_' . $language );
        echo '</div>';

        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}

/**
 * GRID: Half-Half Inputs
 *
 * @param $languarge
 */
function grid_1_2_input( $language ) {

    if ( get_row_layout() == 'half-half_input' )
    {
        $maxWidth = get_sub_field( '22_width' );
        $backgroundColor = 'background-color: ' . get_sub_field( '22_background_color' ) . '; ';
        $padding = 'padding: ' . get_sub_field( '22_padding' ) . '; ';
        $center = get_sub_field( '22_center' );

        $hash = md5( get_sub_field( 'grid_left_de' ) );

        # uk-margin-large-top | uk-margin-large-bottom
        $selected = get_sub_field( '22_easy_margin' );
        if ( in_array( 'top', $selected ) )
        {
            $top = 'uk-margin-large-top';
        }

        if ( in_array( 'bottom', $selected ) )
        {
            $bottom = 'uk-margin-large-bottom';
        }

        if ( $top != '' || $bottom != '' )
        {
            $margin = ' class="' . $top . ' ' . $bottom . '"';
        }

        if ( get_sub_field( '22_animation_left' ) != 'no' )
        {
            $animation_left = get_sub_field( '22_animation_left' );
            $a_left = 'data-uk-scrollspy="{cls:\'uk-animation-' . $animation_left . '\', repeat: false}"';
        }
        if ( get_sub_field( '22_animation_right' ) != 'no' )
        {
            $animation_right = get_sub_field( '22_animation_right' );
            $a_right = 'data-uk-scrollspy="{cls:\'uk-animation-' . $animation_right . '\', repeat: false}"';
        }

        echo '<div id="ultraschall-box-' . $hash . '" style="' . $backgroundColor . '"' . $margin . '>';
        echo '<div class="uk-container uk-container-center"
                style="max-width: ' . $maxWidth . 'px;' . $backgroundColor . '' . $padding . '">';
        echo '<div class="uk-grid" data-uk-grid-margin="">';

        echo '<div class="uk-width-medium-1-2" ' . $a_left . ' data-uk-grid-margin="">';
        echo the_sub_field( 'grid_left_' . $language );
        echo '</div>';

        echo '<div class="uk-width-medium-1-2" ' . $a_right . ' data-uk-grid-margin="">';
        echo the_sub_field( 'grid_right_' . $language );
        echo '</div>';

        echo $css;
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}

// ----------------------------------- WP Contents --------------------------------------------

function get_page_content( $language ) {

    echo '<div class="uk-container uk-container-center uk-margin-large-top uk-margin-large-bottom"
           style="max-width: 1165px;">';
    echo '<div class="uk-grid" data-uk-grid-margin="">';

    echo '<div class="uk-width-medium-1">';
    echo the_field( 'page_content_' . $language );
    echo '</div>';

    echo '</div>';
    echo '</div>';

}
