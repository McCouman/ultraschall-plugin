<?php
/**
 * Created by Wikibyte.org
 * User: McCouman
 * Date: 06.01.16
 * Time: 21:08
 */

/**
 * GET: Version - Home
 *
 * @param $language
 */
function get_version_home( $language ) {

    if ( have_rows( 'version_content' ) )
    {
        while ( have_rows( 'version_content' ) ) : the_row();

            //version home set
            version_full_grid( $language );
            version_grid_2_2_editor( $language );
            version_get_features( $language );

        endwhile;
        wp_reset_query();
    }

}

/**
 * GET: Version - Installation Infos
 *
 * @param $language
 */
function get_version_install( $language ) {

    //-start

    set_version_install_tabs();

    echo '<ul id="switcher-content-a-fades" class="uk-switcher uk-margin">';

    get_version_install_mac( $language );
    get_version_install_win( $language );

    echo '</ul>';

    //-end

    echo '<div class="uk-container uk-container-center uk-margin-large-top uk-margin-bottom ultraschall-clogs">';
    echo '<div class="uk-grid" data-uk-grid-margin="">';
    echo '<div class="uk-width-medium-1">';
    echo '<hr />';
    echo '</div>';
    echo '</div>';
    echo '</div>';

}

//---------------------------------------- Contents -----------------------------------------

/**
 * Tabs: Navigation
 */
function set_version_install_tabs() {
    echo '<div class="uk-container uk-container-center uk-margin-large-top uk-margin-bottom ultraschall-vtabs">';
    echo '<div class="uk-grid" data-uk-grid-margin="">';
    echo '<div class="uk-width-medium-1">';
    ?>
    <div class="uk-tab-center">
        <ul class="uk-tab" data-uk-switcher="{connect:'#switcher-content-a-fades', animation: 'fade'}">
            <li class="uk-active" aria-expanded="true">
                <a href="#"> <i class="uk-icon-apple"></i> Mac </a>
            </li>
            <li aria-expanded="false" class="">
                <a href="#"> <i class="uk-icon-windows"></i> Windows </a>
            </li>
        </ul>
    </div>
    <?php
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

/**
 * Content: Mac install
 *
 * @param $language
 */
function get_version_install_mac( $language ) {
    //--- install mac ----
    echo '<li aria-hidden="false"  style="animation-duration: 200ms;">';

    version_install_information();

    if ( have_rows( 'version_installs' ) )
    {
        while ( have_rows( 'version_installs' ) ) : the_row();

            //version install set
            version_mac_install( $language );
            version_mac_update( $language );

        endwhile;
        wp_reset_query();
    }

    echo '</li>';
    //--- /install mac ----
}

/**
 * Content: Win install
 *
 * @param $language
 */
function get_version_install_win( $language ) {
    //--- install win ----
    echo '<li aria-hidden="true" style="animation-duration: 200ms;">';

    version_install_information();

    if ( have_rows( 'version_installs' ) )
    {
        while ( have_rows( 'version_installs' ) ) : the_row();

            //version install set
            version_win_install( $language );
            version_win_update( $language );

        endwhile;
        wp_reset_query();
    }

    echo '</li>';
    //--- /install win ----
}

/**
 * Content: Information (Grundsetzliches)
 */
function version_install_information() {

    echo '<div class="uk-container uk-container-center uk-margin-large-top uk-margin-large-bottom ultraschall-install">';
    echo '<div class="uk-grid" data-uk-grid-margin="">';
    echo '<div class="uk-width-medium-1">';
    echo '<h1>Installation</h1>';
    echo '<h2 class="us-install-info"><b>Grundsätzliches</b></h2>';
    echo '<p>Der Einsatz dieser Distribution erfolgt auf eigene Gefahr, eigene Einstellungen werden in der Regel
            ungefragt überschrieben – es lohnt also, diese vorher über das Menü
            Reaper | Preferences | General | Export Configuration… zu sichern.
            Unsere Änderungen greifen auf sehr vielen verschiedenen Ebenen:
            Dateisystem (Grafiken), Walter-Themingdatei, Projektsettings, Reaper-Settings, Toolbar-Settings.
            All diese Änderungen sind quelloffen (CC0) und können beliebig angepasst werden
            – man sollte jedoch eine recht klare Vorstellung haben was man tut.
           </p>
            <h4><b>Installation der 2.0 (Bitte aufmerksam befolgen!)</b></h4>
            <p>
            Je nachdem, ob man bereits eine vorherige Version von Ultraschall im Einsatz hat,
            unterscheidet sich die Installation: Update oder Clean Install.
            </p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

}

//---------------------------------------- Functions -----------------------------------------

/**
 * GRID: FULL
 *
 * @param $languarge
 */
function version_full_grid( $language ) {

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
function version_grid_2_2_editor( $language ) {

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
function version_grid_2_2_input( $language ) {

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

/**
 * FEATURES:
 */
function version_get_features( $language ) {

    if ( get_row_layout() == 'feature_box' )
    {
        $feature_id = get_sub_field( 'feature_box_input' );

        $fbox_args = array(
                'post_type'      => 'ultraschall_features',
                'post_status'    => 'publish',
                'posts_per_page' => 1,
                'p'              => $feature_id
        );
        $fbox_query = null;
        $fbox_query = new WP_Query( $fbox_args );

        while ( $fbox_query->have_posts() ) : $fbox_query->the_post();

            get_features( $language );

        endwhile;

        wp_reset_query();
    }

}

//---------------------------------------- Installer -----------------------------------------

/**
 * INSTALL: Mac install
 *
 * @param $languarge
 */
function version_mac_install( $language ) {

    if ( get_row_layout() == 'install_mac' )
    {
        echo '<div class="uk-container uk-container-center ultraschall-clogs">';
        echo '<div class="uk-grid" data-uk-grid-margin="">';
        echo '<div class="uk-width-medium-1">';
        ?>
        <h2>Mac OS X <?php echo get_sub_field( "mac_install_version" ); ?> (Neuinstallation)</h2>
        <div class="uk-container uk-container-center" id="changelogs">
            <div class="uk-grid" data-uk-grid-margin="">
                <div class="uk-width-medium-1">
                    <?php
                    echo '<div class="us-changelog">';

                    $rows = get_sub_field( "mac_install_steps" );
                    if ( $rows )
                    {
                        echo '<dl class="uk-description-list-horizontal">';
                        foreach ( $rows as $row )
                        {
                            if ( $row[ 'mac_install_heading' ] != '' )
                            {
                                echo '<dt class="clog-type">';
                                echo $row[ 'mac_install_heading' ];
                                echo ':</dt>';
                            }

                            if ( $row[ 'mac_install_heading' ] != '' )
                            {
                                echo '<dd>';
                                echo $row[ 'mac_install_content' ];
                                echo '</dd>';
                            }
                            else
                            {
                                echo '<dd><br><i>';
                                echo $row[ 'mac_install_content' ];
                                echo '</i></dd>';
                            }
                        }
                        echo '</dl>';
                    }

                    echo '</div>';
                    ?>
                </div>
            </div>
        </div>
        <?php
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}

/**
 * INSTALL: Mac update
 *
 * @param $languarge
 */
function version_mac_update( $language ) {

    if ( get_row_layout() == 'update_mac' )
    {
        echo '<div class="uk-container uk-container-center ultraschall-clogs">';
        echo '<div class="uk-grid" data-uk-grid-margin="">';
        echo '<div class="uk-width-medium-1">';
        ?>
        <h2>Mac OS X <?php echo get_sub_field( "mac_update_version" ); ?> (Updates)</h2>
        <div class="uk-container uk-container-center" id="changelogs">
            <div class="uk-grid" data-uk-grid-margin="">
                <div class="uk-width-medium-1">
                    <?php

                    echo '<div class="us-changelog">';

                    $rows = get_sub_field( "mac_update_steps" );
                    if ( $rows )
                    {
                        echo '<dl class="uk-description-list-horizontal">';
                        foreach ( $rows as $row )
                        {
                            if ( $row[ 'mac_update_heading' ] != '' )
                            {
                                echo '<dt class="clog-type">';
                                echo $row[ 'mac_update_heading' ];
                                echo ':</dt>';
                            }

                            if ( $row[ 'mac_update_heading' ] != '' )
                            {
                                echo '<dd>';
                                echo $row[ 'mac_update_content' ];
                                echo '</dd>';
                            }
                            else
                            {
                                echo '<dd><br><i>';
                                echo $row[ 'mac_update_content' ];
                                echo '</i></dd>';
                            }
                        }

                        echo '</dl>';
                    }

                    echo '</div>';

                    ?>
                </div>
            </div>
        </div>
        <?php
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}

//---- Install Win

/**
 * INSTALL: Mac install
 *
 * @param $languarge
 */
function version_win_install( $language ) {

    if ( get_row_layout() == 'install_win' )
    {
        echo '<div class="uk-container uk-container-center ultraschall-clogs">';
        echo '<div class="uk-grid" data-uk-grid-margin="">';
        echo '<div class="uk-width-medium-1">';
        ?>
        <h2>Windows <?php echo get_sub_field( "mac_install_version" ); ?> (Installation)</h2>
        <div class="uk-container uk-container-center" id="changelogs">
            <div class="uk-grid" data-uk-grid-margin="">
                <div class="uk-width-medium-1">
                    <?php

                    echo '<div class="us-changelog">';

                    $rows = get_sub_field( "win_install_steps" );
                    if ( $rows )
                    {
                        echo '<dl class="uk-description-list-horizontal">';
                        foreach ( $rows as $row )
                        {
                            if ( $row[ 'win_install_heading' ] != '' )
                            {
                                echo '<dt class="clog-type">';
                                echo $row[ 'win_install_heading' ];
                                echo ':</dt>';
                            }

                            if ( $row[ 'win_install_heading' ] != '' )
                            {
                                echo '<dd>';
                                echo $row[ 'win_install_content' ];
                                echo '</dd>';
                            }
                            else
                            {
                                echo '<dd><br><i>';
                                echo $row[ 'win_install_content' ];
                                echo '</i></dd>';
                            }
                        }
                        echo '</dl>';
                    }

                    echo '</div>';

                    ?>
                </div>
            </div>
        </div>
        <?php
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}

/**
 * INSTALL: Mac update
 *
 * @param $languarge
 */
function version_win_update( $language ) {

    if ( get_row_layout() == 'update_win' )
    {
        echo '<div class="uk-container uk-container-center ultraschall-clogs">';
        echo '<div class="uk-grid" data-uk-grid-margin="">';
        echo '<div class="uk-width-medium-1">';
        ?>
        <h2>Windows <?php echo get_sub_field( "win_update_version" ); ?> (Updates)</h2>
        <div class="uk-container uk-container-center" id="changelogs">
            <div class="uk-grid" data-uk-grid-margin="">
                <div class="uk-width-medium-1">
                    <?php

                    echo '<div class="us-changelog">';

                    $rows = get_sub_field( "win_update_steps" );

                    if ( $rows )
                    {
                        echo '<dl class="uk-description-list-horizontal">';
                        foreach ( $rows as $row )
                        {
                            if ( $row[ 'win_update_heading' ] != '' )
                            {
                                echo '<dt class="clog-type">';
                                echo $row[ 'win_update_heading' ];
                                echo ':</dt>';
                            }

                            if ( $row[ 'win_update_heading' ] != '' )
                            {
                                echo '<dd>';
                                echo $row[ 'win_update_content' ];
                                echo '</dd>';
                            }
                            else
                            {
                                echo '<dd><br><i>';
                                echo $row[ 'win_update_content' ];
                                echo '</i></dd>';
                            }
                        }
                        echo '</dl>';
                    }

                    echo '</div>';

                    ?>
                </div>
            </div>
        </div>
        <?php
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}

