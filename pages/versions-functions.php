<?php
/**
 * Created by Wikibyte.org
 * User: McCouman
 * Date: 06.01.16
 * Time: 21:08
 */

function get_versions( $language ) {
    if ( have_rows( 'content' ) )
    {
        while ( have_rows( 'content' ) ) : the_row();

            //all feature
            get_features( $language );



        endwhile;
    }

    //all changelogs
    #get_changelogs( $language );

}