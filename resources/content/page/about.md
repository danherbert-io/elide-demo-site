# About this demo site

This site is a simple demonstration of how Elide can streamline the creation of dynamic sites with Laravel and HTMX.

## Links

- [Elide at Github](https://github.com/danherbert-io/elide-for-laravel)
- [Elide demo site at Github](https://github.com/danherbert-io/elide-demo-site) (this site)

## Some of the things demonstrated

- Conventional rendered responses:
    - A full page layout when non-AJAX (e.g., someone opens the home page in a new tab)
    - Only partials to be updated when AJAX (e.g., someone clicks the button to show the next page of movies, or added a movie to their favourites)
- Partial only responses (e.g., someone opens their user profile dialog)
- Setting up partials which will always be provided for AJAX requests, non-AJAX requests, or both; e.g.:
    - The navigation links might always be returned so that it can update the active page link
    - The favourites star might only be returned when the user's favourites have changed
