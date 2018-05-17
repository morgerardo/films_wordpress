<?php

function unite_child_enqueue_styles() {
    
    $parent_style = 'unite-style'; 
    
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'unite-child-style',
    get_stylesheet_directory_uri() . '/style.css',
    array( $parent_style ),
    wp_get_theme()->get('Version')
);

}
add_action( 'wp_enqueue_scripts', 'unite_child_enqueue_styles' );


function set_post_type_home( $query ) {
    if ( $query->is_home() ) {
        $query->set( 'post_type', 'films' );
    }
}
add_action( 'pre_get_posts', 'set_post_type_home' );

function get_film_data( $id ) {
    $genres_query = wp_get_post_terms($id, 'genre', array("fields" => "names"));
    $country_query = wp_get_post_terms($id, 'country', array("fields" => "names"));
    $ticket_price = get_post_meta($id, 'ticket_price')[0];
    $release_date_query = get_post_meta($id, 'release_date')[0];
    
    $genres = empty($genres_query) ? "Not Available" : implode(", ", $genres_query);
    $country = empty($country_query) ? "Not Available" : implode(", ", $country_query);
    $release_date = empty($release_date_query) ? "Not Available" : date('Y-m-d', strtotime($release_date_query));

    echo 
        "<p>
            <strong>Country: </strong>
            $country
        </p>
        <p>
            <strong>Genres: </strong>
            $genres
        </p>
        <p>
            <strong>Ticket Price: </strong>
            $ticket_price
        </p>
        <p>
            <strong>Release Date: </strong>
            $release_date
        </p>";
}
add_action( 'the_film_data', 'get_film_data' );

?>