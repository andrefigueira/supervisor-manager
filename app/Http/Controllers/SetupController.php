<?php

namespace App\Http\Controllers;

use AFM\Rsync\Rsync;
use Illuminate\Http\Request;

class SetupController extends Controller
{
    public function index()
    {
        // connect to the remote server defined
        // generate local version of the files to install based on the saved and assigned config for an environment
        // rsync the generated files to the assigned servers
        // reload supervisord

        $config = [
            'ssh' => [
                'username' => 'root',
                'host' => '138.68.186.191',
                'private_key' => '/home/afigueira/.ssh/id_rsa',
            ],
        ];

        $rsync = new Rsync($config);

//        $rsync->sync(base_path('phpunit.xml'), '/etc/supervisor/conf.d/');

        return view('setup', [
            'publicKey' => shell_exec('ssh-add -L'),
        ]);
    }
}
