<?php
declare(strict_types=1);

namespace tyesty\phpitbar;

/**
 * Class LineParameter
 *
 * @package tyesty\phpitbar
 */
class LineParameter
{
    /**
     * List of parameters that have been changed.
     *
     * @var string[]
     */
    private $params = [];

    /**
     * Sets the URL to be opened in the default browser when clicking this line.
     *
     * @param string $href
     * @return LineParameter
     */
    public function setHref(string $href): LineParameter
    {
        $this->params['href'] = $href;
        return $this;
    }

    /**
     * Sets the color for this line.
     *
     * Use hex code to specify the line color.
     *
     * @param string $color
     * @return LineParameter
     */
    public function setColor(string $color): LineParameter
    {
        $this->params['color'] = $color;
        return $this;
    }

    /**
     * Sets the font to be used to display this line.
     *
     * @param string $font
     * @return LineParameter
     */
    public function setFont(string $font): LineParameter
    {
        $this->params['font'] = $font;
        return $this;
    }

    /**
     * Sets the font size to be used to display this line.
     *
     * @param string $size
     * @return LineParameter
     */
    public function setSize(string $size): LineParameter
    {
        $this->params['size'] = $size;
        return $this;
    }

    /**
     * Sets the bash command to be executed when clicking on this line.
     *
     * @param BashCommand $bashCommand
     * @return LineParameter
     */
    public function setBashCommand(BashCommand $bashCommand): LineParameter
    {
        $this->params['bash'] = (string) $bashCommand;
        return $this;
    }

    /**
     * Sets the flag if this line refreshes the plugin when clicked.
     *
     * Set this to true to make the item refresh the plugin it belongs to.
     * If the item runs a bash script, the refresh is performed after the script finishes.
     *
     * @param bool $isRefreshLine
     * @return LineParameter
     */
    public function setIsRefreshLine(bool $isRefreshLine): LineParameter
    {
        $this->params['refresh'] = $isRefreshLine ? 'true' : 'false';
        return $this;
    }

    /**
     * Sets the Flag if this line is a dropdown line.
     *
     * @param bool $isDropdown
     * @return LineParameter
     */
    public function setIsDropdown(bool $isDropdown): LineParameter
    {
        $this->params['dropdown'] = $isDropdown ? 'true' : 'false';
        return $this;
    }

    /**
     * Sets the length of the line.
     *
     * If set, the line will be to the specified number of characters.
     * A … will be added to any truncated strings, as well as a tooltip displaying the full string.
     *
     * @param int $length
     * @return LineParameter
     */
    public function setLength(int $length): LineParameter
    {
        $this->params['length'] = $length;
        return $this;
    }

    /**
     * Sets the flag if leading and trailing whitespace of the line text shall be removed.
     *
     * @param bool $trimLineText
     * @return LineParameter
     */
    public function setTrimLineText(bool $trimLineText): LineParameter
    {
        $this->params['trim'] = $trimLineText ? 'true' : 'false';
        return $this;
    }

    /**
     * Sets the flag to mark a line as an alternate to the previous one.
     *
     * This line will then be shown instead of the previous one when the Option key is pressed in the dropdown
     *
     * @param bool $isAlternateLine
     * @return LineParameter
     */
    public function setIsAlternateLine(bool $isAlternateLine): LineParameter
    {
        $this->params['alternate'] = $isAlternateLine ? 'true' : 'false';
        return $this;
    }

    /**
     * Sets the image for this line (DropdownLine).
     *
     * Used with DropdownLine items only. For MenubarLines, please use the $templateImage parameter!
     *
     * The image data must be passed as base64 encoded string.
     *
     * Use a 144 DPI resolution to support Retina displays.
     * The imageformat can be any of the formats supported by Mac OS X
     *
     * @param string $imageBase64
     * @return LineParameter
     */
    public function setImageBase64(string $imageBase64): LineParameter
    {
        $this->params['image'] = $imageBase64;
        return $this;
    }

    /**
     * Sets the image for this line (MenubarLine).
     *
     * Recommended way for MenubarLine items. For DropdownLines, please use the $image parameter!
     *
     * The image data must be passed as base64 encoded string and should consist of only black and clear pixels.
     * The alpha channel in the image can be used to adjust the opacity of black content, however.
     *
     * Use a 144 DPI resolution to support Retina displays.
     * The imageformat can be any of the formats supported by Mac OS X.
     *
     * @param string $templateImageBase64
     * @return LineParameter
     */
    public function setTemplateImageBase64(string $templateImageBase64): LineParameter
    {
        $this->params['templateImage'] = $templateImageBase64;
        return $this;
    }

    /**
     * Sets the flag if emojis shall be enabled in text.
     *
     * If set to false, this flag will disable parsing of github style :mushroom: into 🍄
     *
     * @param bool $enableEmojis
     * @return LineParameter
     */
    public function setEnableEmojis(bool $enableEmojis): LineParameter
    {
        $this->params['emojize'] = $enableEmojis ? 'true' : 'false';
        return $this;
    }

    /**
     * Sets the flag if ansi codes shall be enabled in text.
     *
     * @param bool $enableAnsi
     * @return LineParameter
     */
    public function setEnableAnsi(bool $enableAnsi): LineParameter
    {
        $this->params['ansi'] = $enableAnsi ? 'true' : 'false';
        return $this;
    }

    /**
     * Returns the string representation of this line parameter object
     *
     * @return string
     */
    public function __toString(): string
    {
        $returnString = '';

        foreach ($this->params as $key => $value) {
            // check if there is a space, then add surrounding "s
            if ($key !== 'bash' && strpos($value, ' ') !== false) {
                $value = '"' . $value . '"';
            }

            // stringify the bash parameter, since this is an object
            else if ($key === 'bash') {
                $value = (string) $value;
            }

            // and add the parameter to the return string
            $returnString .= ' ' . $key . '=' . $value;
        }

        return $returnString;
    }
}
