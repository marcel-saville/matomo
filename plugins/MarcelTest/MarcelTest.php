<?php

namespace Piwik\Plugins\MarcelTest;

class MarcelTest extends \Piwik\Plugin
{
    public function registerEvents()
    {
        return [
            'CronArchive.getArchivingAPIMethodForPlugin' => 'getArchivingAPIMethodForPlugin',
            'AssetManager.getJavaScriptFiles' => 'getJavaScriptFiles',
        ];
    }

    // support archiving just this plugin via core:archive
    public function getArchivingAPIMethodForPlugin(&$method, $plugin)
    {
        if ($plugin == 'MarcelTest') {
            $method = 'MarcelTest.getExampleArchivedMetric';
        }
    }

    public function getJavaScriptFiles(&$files)
    {
        $files[] = "plugins/MarcelTest/templates/CurrentTime.js";
    }
}
