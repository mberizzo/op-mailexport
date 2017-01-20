<?php

namespace Mberizzo\Mailexport\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

class Mail extends Controller
{
    public $implement = [
        'Backend.Behaviors.ImportExportController',
    ];

    public $requiredPermissions = ['mja.mail.mail'];
    public $importExportConfig = 'config_import_export.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Mja.Mail', 'mail', 'export');
    }
}
