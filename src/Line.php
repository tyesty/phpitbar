<?php
declare(strict_types=1);

namespace tyesty\phpitbar;

/**
 * Class Line
 *
 * @package tyesty\phpitbar
 */
abstract class Line
{
    /**
     * The line parameters for this line.
     *
     * @var ?LineParameter
     */
    private $lineParameter;

    /**
     * The text to be displayed in this line.
     *
     * @var string
     */
    private $text;

    /**
     * Line constructor.
     *
     * @param string $text The text for this line.
     * @param LineParameter|null $lineParameter The line parameter object for this line.
     */
    public function __construct(string $text = '', ?LineParameter $lineParameter = null)
    {
        $this->text = $text;
        $this->lineParameter = $lineParameter;
    }

    /**
     * Sets the line parameters for this line.
     *
     * @param LineParameter $lineParameter The line parameter object for this line.
     * @return self
     */
    public function setLineParameter(LineParameter $lineParameter): self
    {
        $this->lineParameter = $lineParameter;
        return $this;
    }

    /**
     * Sets the text part of this line.
     *
     * @param string $text The text part for this line.
     * @return self
     */
    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    /**
     * Returns the string representation of this line
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->text . ($this->lineParameter === null ? '' : ' |' . (string) $this->lineParameter) . "\n";
    }
}
