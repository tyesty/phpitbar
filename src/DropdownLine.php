<?php
declare(strict_types=1);

namespace tyesty\phpitbar;

/**
 * Class DropdownLine
 *
 * @package tyesty\phpitbar
 */
final class DropdownLine extends Line
{

    /**
     * @var DropdownLine[]
     */
    private $childDropdownLines = [];

    /**
     * Flag if the line is a child line or not.
     *
     * @var bool
     */
    private $isChildLine = false;

    /**
     * Adds a child dropdown line to this dropdown line.
     *
     * @param DropdownLine $dropdownLine The dropdown line to be added as a subline.
     * @return DropdownLine
     */
    public function addChildDropdownLine(DropdownLine $dropdownLine): self
    {
        $this->childDropdownLines[] = $dropdownLine;
        $dropdownLine->setIsChildLine(true);
        return $this;
    }

    /**
     * Returns the child dropdown lines for this dropdown line.
     *
     * @return DropdownLine[] The child dropdown lines.
     */
    public function getChildDropdownLines(): array
    {
        return $this->childDropdownLines;
    }

    /**
     * Returns the isChildLine flat for this dropdown line.
     *
     * @return bool
     */
    public function isChildLine(): bool
    {
        return $this->isChildLine;
    }

    /**
     * Sets the isChildLine flag
     *
     * @param bool $isChildLine Flag if this flag is a child line.
     * @return self
     */
    public function setIsChildLine(bool $isChildLine): self
    {
        $this->isChildLine = $isChildLine;
        return $this;
    }
}
