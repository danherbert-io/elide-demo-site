<p align="center"><img src="./public/art/elide-logo.svg" alt="Elide package logo" style="max-width: 300px"></p>

## Elide demo site

This is a simple Laravel application that demonstrates how Elide can be used to leverage HTMX in a streamlined manner to
create dynamic frontends.

### Links

- [Elide at Github](https://github.com/danherbert-io/elide-for-laravel)
- [Elide demo site at Github](https://github.com/danherbert-io/elide-demo-site) (this site)

### Some of the things demonstrated

- Conventional rendered responses:
    - A full page layout when non-AJAX (e.g., someone opens the home page in a new tab)
    - Only partials to be updated when AJAX (e.g., someone clicks the button to show the next page of movies)
- Partial only responses (e.g., someone opens their user profile dialog)
- Setting up partials which will always be provided for AJAX requests, non-AJAX requests, or both; e.g.:
    - The navigation links might always be returned so that it can update the active page link
    - The favourites star might only be returned when the user's favourites have changed

### Setup

The following commands can be used to clone the repo, install dependencies, seed the database, and build the assets.

```shell
git clone git@github.com:danherbert-io/elide-demo-site.git
cd elide-demo-site
composer install
cp .env.example .env && php artisan key:generate
composer reset-db
npm i && npm run build
```

You may then serve the application:

```shell
php artisan serve
```

Alternatively, you can serve the application in your preferred local development environment (e.g., Herd).

### Things to look at

Everything presented in this demo are fairly conventional Blade components. Have a suss at [View/Components](app/View/Components).

You'll find the page controllers under [Http/Controllers/Page](app/Http/Controllers/Page) - these will be a good reference for how Elide returns responses for HTMX in the frontend.

The [UserProfileController](app/Http/Controllers/UserProfileController.php) may be of interest - it and the components it renders demonstrate how you can affect the frontend UI by more deliberately adding and removing elements from the backend.
