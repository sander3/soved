<?php

namespace App\Policies;

use Spatie\Csp\Directive;
use Spatie\Csp\Policies\Basic;

class CspPolicy extends Basic
{
    public function configure()
    {
        parent::configure();

        $this
            ->addDirective(Directive::STYLE, 'https://fonts.googleapis.com')
            ->addDirective(Directive::FONT, 'https://fonts.gstatic.com')
            ->addDirective(Directive::SCRIPT, 'https://matomo.sander.sh')
            ->addDirective(Directive::IMG, 'https://matomo.sander.sh')
            ->addDirective(Directive::CONNECT, 'https://matomo.sander.sh')
            ->addDirective(Directive::IMG, config('filesystems.disks.s3.url'));
    }
}
