<?php
/**
 * Created by Wikibyte.org
 * User: McCouman
 * Date: 10.01.16
 * Time: 12:57
 */
function get_changelogs( $language ) {

    echo '<div class="uk-container uk-container-center uk-margin-large-top uk-margin-large-bottom ultraschall-clogs">';
    echo '<div class="uk-grid" data-uk-grid-margin="">';
    echo '<div class="uk-width-medium-1">';
    echo '<h1>Changelog</h1>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

    $clogs_args = array(
            'post_type'      => 'ultraschall_clogs',
            'post_status'    => 'publish',
            'posts_per_page' => 100
    );
    $clogs_query = null;
    $clogs_query = new WP_Query( $clogs_args );

    while ( $clogs_query->have_posts() ) : $clogs_query->the_post();
        view_changelogs( $language );
    endwhile;
    wp_reset_query();


    echo '<div class="uk-container uk-container-center uk-margin-large-top uk-margin-bottom ultraschall-clogs">';
    echo '<div class="uk-grid" data-uk-grid-margin="">';
    echo '<div class="uk-width-medium-1">';
    echo '<hr />';
    echo '</div>';
    echo '</div>';
    echo '</div>';

}

function view_changelogs( $language ) {

    echo '<div class="uk-container uk-container-center ultraschall-clogs">';
    echo '<div class="uk-grid" data-uk-grid-margin="">';
    echo '<div class="uk-width-medium-1">';
    ?>
    <h2><?php echo get_the_title() . ' - ' . get_the_date(); ?></h2>
    <div class="uk-container uk-container-center" id="changelogs">
        <div class="uk-grid" data-uk-grid-margin="">
            <div class="uk-width-medium-1">
                <?php
                set_changelog( $language );
                ?>
            </div>
        </div>
    </div>
    <?php
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

/**
 * view changelog (de)
 */
function set_changelog( $language ) {
    echo '<div class="us-changelog">';

    $rows = get_field( "changelogs" );
    if ( $rows )
    {
        echo '<dl class="uk-description-list-horizontal">';
        foreach ( $rows as $row )
        {
            echo '<dt class="clog-type">';
            infos_changlog_types( $row, $language );
            echo ':</dt>';

            echo '<dd><span class="clog-heading">' . $row[ 'headering' ] . ':</span>';
            echo '<br>' . $row[ 'log_content' ] . '<br><br>';
            echo '</dd>';
        }
        echo '</dl>';
    }

    echo '</div>';
}

//------------------------------------- changelog types ------------------------------------------

/**
 * Infos Changelog_types
 *
 * @param $row
 */
function infos_changlog_types( $row, $language ) {
    if ( $language == 'de' )
    {
        if ( $row[ 'type' ] == 'Preferences' )
        {
            echo '<i class="uk-icon-info-circle"
                     data-uk-tooltip="{pos:\'bottom-left\'}"
                     title="Diese Änderungen werden im Preferences-Dialog von Reaper vorgenommen,
                            den man über ⌘+, oder im Menü unter Reaper | Preferences… erreicht."></i>
                            Preferences';
        }
        if ( $row[ 'type' ] == 'Theme' )
        {
            echo '<i class="uk-icon-info-circle"
                                     data-uk-tooltip="{pos:\'bottom-left\'}"
                                     title="Diese Änderungen betreffen das mitgelieferte Theme und sind für Design
                                     und Anordnung der Elemente (Buttons, Regler, Anzeigen…) verantwortlich."></i>
                                     Theme';
        }
        if ( $row[ 'type' ] == 'Actions' )
        {
            echo '<i class="uk-icon-info-circle"
                                     data-uk-tooltip="{pos:\'bottom-left\'}"
                                     title="Diese Änderungen betreffen das mitgelieferte Theme und sind für Design
                                     und Anordnung der Elemente (Buttons, Regler, Anzeigen…) verantwortlich."></i>
                                     Actions';
        }
        if ( $row[ 'type' ] == 'Soundboard' )
        {
            echo '<i class="uk-icon-info-circle"
                                     data-uk-tooltip="{pos:\'bottom-left\'}"
                                     title="[Derzeit nur Mac] Features unseres eigenen Soundboards für Einspieler
                                     aller Art."></i>
                                     Soundboard';
        }
        if ( $row[ 'type' ] == 'Installer' )
        {
            echo '<i class="uk-icon-info-circle"
                                     data-uk-tooltip="{pos:\'bottom-left\'}"
                                     title="[Derzeit nur Mac] Neuerungen, die den mit der 1.2 eingeführten Installer
                                     für den Mac betreffen."></i>
                                     Installer';
        }
        if ( $row[ 'type' ] == 'HUB' )
        {
            echo '<i class="uk-icon-info-circle"
                                     data-uk-tooltip="{pos:\'bottom-left\'}"
                                     title="[Derzeit nur Mac] Unser Projekt zur Ablösung von
                                     <a href=\'https://github.com/mattingalls/Soundflower/releases/tag/2.0b2\'>
                                     Soundflower</a> für ein stabiles und knacksfreies Podcastingerlebnis."></i>
                                     HUB';
        }
        if ( $row[ 'type' ] == 'Misc' )
        {
            echo '<i class="uk-icon-info-circle"
                                     data-uk-tooltip="{pos:\'bottom-left\'}"
                                     title="Was sonst noch so anfällt."></i>
                                     Misc';
        }
    }
    if ( $language == 'eng' )
    {
        if ( $row[ 'type' ] == 'Preferences' )
        {
            echo '<i class="uk-icon-info-circle"
                                     data-uk-tooltip="{pos:\'bottom-left\'}"
                                     title="Diese Änderungen werden im Preferences-Dialog von Reaper vorgenommen,
                                     den man über ⌘+, oder im Menü unter Reaper | Preferences… erreicht."></i>
                                     Preferences';
        }
        if ( $row[ 'type' ] == 'Theme' )
        {
            echo '<i class="uk-icon-info-circle"
                                     data-uk-tooltip="{pos:\'bottom-left\'}"
                                     title="Diese Änderungen betreffen das mitgelieferte Theme und sind für Design
                                     und Anordnung der Elemente (Buttons, Regler, Anzeigen…) verantwortlich."></i>
                                     Theme';
        }
        if ( $row[ 'type' ] == 'Actions' )
        {
            echo '<i class="uk-icon-info-circle"
                                     data-uk-tooltip="{pos:\'bottom-left\'}"
                                     title="Diese Änderungen betreffen das mitgelieferte Theme und sind für Design
                                     und Anordnung der Elemente (Buttons, Regler, Anzeigen…) verantwortlich."></i>
                                     Actions';
        }
        if ( $row[ 'type' ] == 'Soundboard' )
        {
            echo '<i class="uk-icon-info-circle"
                                     data-uk-tooltip="{pos:\'bottom-left\'}"
                                     title="[Derzeit nur Mac] Features unseres eigenen Soundboards für Einspieler
                                     aller Art."></i>
                                     Soundboard';
        }
        if ( $row[ 'type' ] == 'Installer' )
        {
            echo '<i class="uk-icon-info-circle"
                                     data-uk-tooltip="{pos:\'bottom-left\'}"
                                     title="[Derzeit nur Mac] Neuerungen, die den mit der 1.2 eingeführten Installer
                                     für den Mac betreffen."></i>
                                     Installer';
        }
        if ( $row[ 'type' ] == 'HUB' )
        {
            echo '<i class="uk-icon-info-circle"
                                     data-uk-tooltip="{pos:\'bottom-left\'}"
                                     title="[Derzeit nur Mac] Unser Projekt zur Ablösung von
                                     <a href=\'https://github.com/mattingalls/Soundflower/releases/tag/2.0b2\'>
                                     Soundflower</a> für ein stabiles und knacksfreies Podcastingerlebnis."></i>
                                     HUB';
        }
        if ( $row[ 'type' ] == 'Misc' )
        {
            echo '<i class="uk-icon-info-circle"
                                     data-uk-tooltip="{pos:\'bottom-left\'}"
                                     title="Was sonst noch so anfällt."></i>
                                     Misc';
        }
    }
}
