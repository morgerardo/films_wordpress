# films_wordpress

The project was created using Docker, the docker file needed to run the project is included as docker-compose.yml,
it includes the wordpress, mysql and phpmyadmin images used

To run the project, from the root of the project run:
$ docker-compose up or docker-compose up -d

In order to accomplish the requested features the followin work has been made:

- The Unite theme was installed ( https://es.wordpress.org/themes/unite/ ).
- A child theme was created from Unite theme.
- Films custom post type was created using a Custom Post Type plugin ( https://wordpress.org/plugins/custom-post-type-ui/ ).
- Taxonomies Genre, Country, Year and Actors where created using the above metioned plugin.
- Custom fields Ticket Price and Release Date where created using Advanced Custom Field plugin ( https://wordpress.org/plugins/advanced-custom-fields/ ).
- 3 films where added using information gathered from IMDB ( https://www.imdb.com ).
- The view for a single post was modified to include values "Country", "Genre", "Ticket Price", "Release Date", by creating the content-single.php file in the child theme.
- Values "Country", "Genre", "Ticket Price", "Release Date" where added to the list of films using a Wordpress Hook created in funtions.php file in the child theme.
- A shortcode was created to display the list of the last 5 films added, it was implemented using the widgets opcion in the Wordpress administration page with a Text widget.

Note: Below the list displayed by the shortcut the widget "Recent Posts" was left, due to the implementation requested (the list of the last 5 films added) can be achived with the Wordpress Hook "pre_get_posts" also found in funtions.php file in the child theme.

Author:
Gerardo Moreno
2018-05-17
