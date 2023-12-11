
# E-Commerce-Task

this project have dashboard it's link [http://127.0.0.1:8000/admin/signIn]
and the orders link [http://127.0.0.1:8000/admin/orders]

### admin credentials
- 'phone' => '123456789',
- 'password' => 'password',

## packages

### yajra for the dataTables

we use yajra dataTable package
and the artisan command is [php artisan dataTable:make the-dataTable-path-or-name]
ex. [php artisan dataTable:make OrderDataTable]

### for notification we use laravel webSocket

-   **[the backend config]**

    -   we uncommented the App\Providers\BroadcastServiceProvider::class,
    -   and we pusher channel package **composer require pusher/pusher-php-server for**
    -   and in the .env we set BROADCAST_DRIVER=pusher
    -   **in the .env we added this pusher channel variables**
        - **PUSHER_APP_ID = "1722961"**
        - **PUSHER_APP_KEY = "75cd3997ad9794e60acc"**
        - **PUSHER_APP_SECRET = "f5ae739ea82c5e71fffe"**
        - **PUSHER_APP_CLUSTER = "eu"**
    - we created OrderCreated event class 

-   **[the frontend config]**
    -   we use laravel echo to listen to the events and subscribe to the channels and install it with this command
        **npm install** to make sure the npm is installed
        
        **npm install --save-dev laravel-echo pusher-js**


    -   in bootstrap.js file we uncommented the code for laravle echo

### customer api

-   **[path][http://127.0.0.1:8000/api/]**
-   **[login]**
