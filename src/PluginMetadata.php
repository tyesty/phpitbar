<?php
declare(strict_types=1);

namespace tyesty\phpitbar;

/**
 * Plugin metadata
 *
 * Represents the metadata part of a bitbar plugin description.
 * Class member naming and description are taken from the bitbar documentation
 *
 * @package tyesty\phpitbar
 */
class PluginMetadata
{

    /**
     * @var string The title of the plugin
     */
    public $title;

    /**
     * @var string The version of the plugin (start with v1.0)
     */
    public $version;

    /**
     * @var string Your name
     */
    public $author;

    /**
     * @var string Your github username (without @)
     */
    public $github;

    /**
     * @var string A short description of what your plugin does
     */
    public $description;

    /**
     * @var string A hosted image showing a preview of your plugin (ideally open)
     */
    public $image;

    /**
     * @var string Comma separated list of dependencies
     */
    public $dependencies;

    /**
     * @var string Absolute URL to about information
     */
    public $abouturl;
}
