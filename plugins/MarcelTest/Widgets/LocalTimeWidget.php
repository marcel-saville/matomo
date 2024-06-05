<?php

namespace Piwik\Plugins\MarcelTest\Widgets;

use Piwik\Request;
use Piwik\Site;
use Piwik\Date;
use Piwik\Widget\Widget;
use Piwik\Widget\WidgetConfig;

/**
 * Widget to display the current local time in the timezone configured for the current site.
 */
class LocalTimeWidget extends Widget
{
    public static function configure(WidgetConfig $config)
    {
        $config->setCategoryId('General_Visitors');
        $config->setSubcategoryId('General_Overview');
        $config->setName('MarcelTest_Currentlocaltimeinwebsitestimezone');
        $config->setOrder(0);
    }

    public function render()
    {
        $idSite = Request::fromRequest()->getStringParameter('idSite');
        $timezone = Site::getTimezoneFor($idSite);

        return '<div id="CurrentLocalTime" class="widgetBody" style="font-size: 120%" data-tz="' . $timezone . '">&nbsp;</div>' .
            '<div>' . $timezone . '</div>';
    }
}
