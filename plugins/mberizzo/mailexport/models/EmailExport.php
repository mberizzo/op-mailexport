<?php

namespace Mberizzo\Mailexport\Models;

use Backend\Models\ExportModel;
use DOMDocument;

class EmailExport extends ExportModel
{
    public $table = 'mja_mail_email_log';

    public function exportData($columns, $sessionKey = null)
    {
        return self::make()
            ->orderBy('id', 'desc')
            ->get()
            ->toArray();
    }

    public function getBodyAttribute($value)
    {
        $d = new DOMDocument;
        $mock = new DOMDocument;
        $d->loadHTML($value);
        $body = $d->getElementsByTagName('body')->item(0);

        foreach ($body->childNodes as $child) {
            $mock->appendChild($mock->importNode($child, true));
        }

        return strip_tags($mock->saveHTML());
    }
}
