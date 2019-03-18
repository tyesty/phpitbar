<?php
declare(strict_types=1);

namespace tyesty\phpitbar;

/**
 * Bitbar plugin class
 *
 * This class represents a Bitbar plugin. This is the entrypoint for creating a new plugin.
 *
 * @package tyesty\phpitbar
 */
class BitbarPlugin
{

    /**
     * @var ?PluginMetadata
     */
    private $metadata;

    /**
     * The menubar lines. These will be cycled through when showing the plugin.
     *
     * @var MenubarLine[]
     */
    private $menubarLines = [];

    /**
     * The dropdown lines.
     *
     * @var DropdownLine[]
     */
    private $dropdownLines = [];

    /**
     * The text representation of this plugin
     *
     * @var string
     */
    private $outputText;

    /**
     * Sets the plugin metadata for this plugin instance
     *
     * @param PluginMetadata $metadata The metadata for this plugin.
     * @return BitbarPlugin
     */
    public function setMetadata(PluginMetadata $metadata): self
    {
        $this->metadata = $metadata;
        return $this;
    }

    /**
     * Adds a line to the list of menubar lines.
     *
     * @param MenubarLine $menubarLine The menubar line to add.
     * @return BitbarPlugin
     */
    public function addMenubarLine(MenubarLine $menubarLine): self
    {
        $this->menubarLines[] = $menubarLine;
        return $this;
    }

    /**
     * Adds a line to the list of dropdown lines.
     *
     * @param DropdownLine $dropdownLine The dropdown line to add.
     * @return BitbarPlugin
     */
    public function addDropdownLine(DropdownLine $dropdownLine): self
    {
        $this->dropdownLines[] = $dropdownLine;
        return $this;
    }

    /**
     * Renders the bitbar plugin definition string
     *
     * @return string
     */
    public function render(): string
    {
        foreach ($this->menubarLines as $menubarLine) {
            $this->outputText .= (string) $menubarLine;
        }

        $this->outputText .= "---\n";

        foreach ($this->dropdownLines as $dropdownLine) {
            $this->renderDropdownLine($dropdownLine);
        }
        return $this->outputText;
    }

    /**
     * Renders a dropdown line and all of its children
     *
     * This method walks recursively through all the child dropdown lines and produces output :)
     *
     * @param DropdownLine $dropdownLine The dropdown line to be rendered.
     * @param string $prefix The prefix for this line.
     * @return void
     */
    private function renderDropdownLine(DropdownLine $dropdownLine, string $prefix = ''): void
    {
        $this->outputText .= $prefix . (string) $dropdownLine;

        foreach ($dropdownLine->getChildDropdownLines() as $childDropdownLine) {
            $this->renderDropdownLine($childDropdownLine, $prefix . '--');
        }
    }
}
