<?php
namespace Deployer;

require 'recipe/laravel.php';


set('application', 'weather-app');


set('repository', 'git@github.com:your-username/weather-app.git');


set('git_tty', true);


add('shared_files', ['.env']); 
add('shared_dirs', ['storage']); 


add('writable_dirs', ['bootstrap/cache', 'storage']); 
host('dn-68-25.tll01.zoneas.eu') 
    ->set('remote_user', 'virt118441') 
    ->set('deploy_path', '/home/virt118441/domeenid/tak22lasn.itmajakas.ee/public_html');


after('deploy:failed', 'deploy:unlock');
before('deploy:symlink', 'artisan:migrate'); 