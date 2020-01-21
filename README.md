# About
    This is a RealTime Chat App With Laravel using vue and bulma.

    For Chat server we are using pushers free plan for testing.

    this a simple app just for testing and is not at all complete or ready
    to be used else where.


## How To Use This
### Instalation
    Clone this directory

    Cd into it

    cp .env.example .env

    Create a Database 

    Create a pusher accunt and app.

    Edit Credentials for database and pusher in .env file.

    $ composer install 

    $ npm install

    $ php artisan key:generate

    $ php artisan migrate

    $ php artisan serve
### Usage
    $ php artisan tinker

    $ factory('App\User', 50)->create();

    $ factory('App\Friend', 250)->create();

    $ factory('App\Chat', 5000)->create();

    $php artisan serve 

    Open 2 browser instances and login with w users from db.
    go to chat and work it out.

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
### RealTime Broadcasting
    After you added the crud logic for users and chat, its time togo for
    realtime broadcast.
    Firest we will create a new event.

    $ php artisan make:event BroadcastChat

    now we need to call this event whenever a new chat is created.so we will add
    an $dispatchesEvents array to chat model.
    then create a private channel for our messages to be broadcast throught in routes/channels.php file

    After that we can go and add the channel to our Broadcast event, after
    setting it up to broadcast over our channel we can go to javascript part.

    In app.js where we bootstraped the vue app , we can use Echo for listening
    to the BroadcastChat private channel.and then push the message to chats
    array. thats all for js part.
    w
