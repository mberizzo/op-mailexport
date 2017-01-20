<?php namespace Mberizzo\Mailexport;

use Backend;
use Event;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{

    public function boot()
    {
        Event::listen('backend.menu.extendItems', function($manager) {
            $manager->addSideMenuItems('Mja.Mail', 'mail', [
                'export' => [
                    'label' => 'mberizzo.mailexport::lang.export.submenu_label',
                    'icon'  => 'icon-table',
                    'url'   => Backend::url('mberizzo/mailexport/mail/export'),
                    'permissions' => ['mja.mail.mail']
                ]
            ]);
        });
    }
}
