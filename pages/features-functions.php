<?php
/**
 * Created by Wikibyte.org
 * User: McCouman
 * Date: 06.01.16
 * Time: 20:33
 */


// ----------------------------------- All features -----------------------------------------

/*
 * Read all features
 */
function get_features( $language ) {
    if ( have_rows( 'feature_content' ) )
    {
        while ( have_rows( 'feature_content' ) ) : the_row();

            //all features
            feature_full( $language );
            feature_grid_2_2_editor( $language );

        endwhile;
        wp_reset_query();
    }
}

// ----------------------------------- Features -----------------------------------------

/**
 * GRID: Features Full
 *
 * @param $languarge
 */
function feature_full( $language ) {

    $maxWidth = get_sub_field( 'width' );
    if ( get_sub_field( 'background_color' ) )
    {
        $backgroundColor = 'background-color: ' . get_sub_field( 'background_color' ) . '; ';
    }

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
        echo '<div id="ultraschall-box-' . $hash . '" style="' . $backgroundColor . '" ' . $margin . '>';
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
function feature_grid_2_2_editor( $language ) {

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

