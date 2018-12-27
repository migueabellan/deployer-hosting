<?php
namespace Deployer;

require 'recipe/common.php';

set('application', 'Deployer Hosting');
set('repository', '{{repository}}');
set('git_tty', true); 

set('writable_dirs', []);
set('shared_dirs', []);
set('shared_files', []);
set('migrations_config', '');



// Hosts
set('default_stage', 'staging');
set('branch', 'master');
host('{{host}}')->stage('staging')
    ->user('{{user}}')
    ->identityFile('~/.ssh/id_rsa')
    ->port(22)
    ->set('deploy_path', '~/{{deploy_path}}')
    ;



// Override your php global and user/mode
set('bin/php', function () {
    return '/usr/bin/php7.1-cli';
});
set('http_user', 'www-data');
set('writable_mode', 'chmod');



// Tasks
desc('Deploy in shared hosting');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);
after('deploy', 'success');

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');