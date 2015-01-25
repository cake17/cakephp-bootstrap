<?php
/**
 * Bootstrap Plugin Installer
 *
 * @author   cake17
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://cake17.github.io/
 *
 */
namespace Bootstrap\Console;

use Cake\Filesystem\Folder;
use Composer\Script\Event;

/**
 * Provides installation hooks for when this application is installed via
 * composer. Customize this class to suit your needs.
 */
class Installer
{
    /**
     * Does some routine installation tasks so people don't have to.
     *
     * @param \Composer\Script\Event $event The composer event object.
     * @return void
     */
    public static function postInstall(Event $event)
    {
        $io = $event->getIO();

        $rootDir = dirname(dirname(dirname(dirname(dirname(__DIR__)))));
        $pluginDir = dirname(dirname(__DIR__));

        // static::copySassFiles($rootDir, $pluginDir, $io);
    }

    /**
     * Create the config/app.php file if it does not exist.
     *
     * @param string $dir The application's root directory.
     * @param \Composer\IO\IOInterface $io IO interface to write to console.
     * @return void
     */
    public static function copySassFiles($dir, $pluginDir, $io)
    {
        // copy the file
        $pluginConfig = $dir . '/config/recaptcha.php';
        $pluginDefaultConfig = $pluginDir . '/config/recaptcha.default.php';

        if (!file_exists($pluginConfig)) {
            copy($pluginDefaultConfig, $pluginConfig);
            $io->write('Created `config/recaptcha.php` file');
        }
    }
}
