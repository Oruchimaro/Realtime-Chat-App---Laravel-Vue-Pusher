# About
    This is a RealTime Chat App Using Laravel using vue and bulma.
## How To Use This
### Instalation
### Usage
## Documentation 
### Installig Bulma
    We Are using this package : https://github.com/laravel-frontend-presets/bulma
    Perfered:
    $ composer require laravel-frontend-presets/bulma
    $ php artisan preset bulma-auth
    $ npm install
    $ npm run dev   (here may be some errors, fix them and run this again until it works)

    =====================================================================================
    Other way :
    $ npm install bulma
    Open resources/js/app.js file and remove bootstrap javascript from it.
    Open resources/sass/app.scss , remove bootstrap and import the path to
    bulma.sass in node_modules.
    $ npm run dev
### Installig FontAwesome
    $ npm install font-awesome --save
    Then call it from resources/sass/app.scss file
    @import "~font-awesome/scss/font-awesome.scss";
    $ npm run dev

### Installing Pusher-Server
    As stated in documentation->broadcasting->driverprequisits
    $ composer require pusher/pusher-php-server (php ext-curl must be installed)
### Installing Laravel-Echo
    As stated in documentation->broadcasting->receiving broadcasts
    $ npm install --save laravel-echo pusher-js

### Create a pusher app 
    go to pusher.com, login, create a new app 
    name: chatApp
    cluster: ap1(singapore)
    frontend: jquery
    backend:laravel
    theb click create, then find App Keys, open .env file and paste values there 
    PUSHER_APP_ID=
    PUSHER_APP_KEY=
    PUSHER_APP_SECRET=
    PUSHER_APP_CLUSTER=

    Then go to config/app.php
    and in providers array, find broadcastserviceprovider and uncomment it
    Then in config/Broadcasting.php file,
    In contentions->pusher->options add the key for cluster if its not there
    'cluster' => env('PUSHER_APP_CLUSTER'),


    Then in resources/js/bootstrap.js uncomment the part for echo,
    Add the key to your app and cluseter server to it.

    Go to .env file and broadcast-driver, default is log, change it to pusher

    Dont forget to run $npm install and $npm run dev
