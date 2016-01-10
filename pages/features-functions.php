<?php
/**
 * Created by Wikibyte.org
 * User: McCouman
 * Date: 06.01.16
 * Time: 20:33
 */



// ----------------------------------- Post Type --------------------------------------------

/**
 * Für get_versions() Version
 */
function get_features( $language ) {
    if ( get_row_layout() == 'fbox' )
    {
        // read post-type: feature box
        $post_id = get_sub_field( 'fcontent' );
        $fbox_args = array(
            'post_type'      => 'ultraschall_features',
            'post_status'    => 'publish',
            'posts_per_page' => 1,
            'p'              => $post_id
        );
        $fbox_query = null;
        $fbox_query = new WP_Query( $fbox_args );

        while ( $fbox_query->have_posts() ) : $fbox_query->the_post();
            get_all_features( $language );
        endwhile;

        wp_reset_query();
    }
}

// ----------------------------------- All features -----------------------------------------

/*
 * Read all features
 */
function get_all_features( $language ) {
    if ( have_rows( 'content' ) )
    {
        while ( have_rows( 'content' ) ) : the_row();

            //
            grid_feature_full( $language );

        endwhile;
    }
}

// ----------------------------------- Grid Features -----------------------------------------

/**
 * GRID: Features Full
 *
 * @param $languarge
 */
function grid_feature_full( $language ) {

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

