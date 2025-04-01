<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'weather-app');

// Project repository
set('repository', 'git@github.com:your-username/weather-app.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);

// Hosts
host('your-zone-server.com') // Replace with your Zone.ee server address
    ->set('remote_user', 'your-username') // Replace with your Zone.ee username
    ->set('deploy_path', '/home/your-username/weather-app'); // Replace with your deploy path

// Hooks
after('deploy:failed', 'deploy:unlock');