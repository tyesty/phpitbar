<?php
declare(strict_types=1);

namespace tyesty\phpitbar;

/**
 * Class BashCommand
 *
 * @package tyesty\phpitbar
 */
class BashCommand
{

    /**
     * @var string The command to be executed in the shell.
     */
    private $command;

    /**
     * @var array Array of arguments that will be added to the command.
     */
    private $args;

    /**
     * @var bool Flag if the command shall be executed in a terminal
     */
    private $inTerminal;

    /**
     * BashCommand constructor.
     *
     * Initializes the bash command
     *
     * @param string $command
     * @param array $args
     * @param bool $inTerminal
     */
    public function __construct(string $command, array $args = [], bool $inTerminal = true)
    {
        $this->command = $command;
        $this->args = $args;
        $this->inTerminal = $inTerminal;
    }

    /**
     * Returns the string value of a bash command
     *
     * @return string
     */
    public function __toString(): string
    {
        $returnString = '"' . $this->command . '"';

        foreach ($this->args as $i => $value) {
            $returnString .= ' param' . ($i + 1) . '="' . $value . '"';
        }

        $returnString = $this->inTerminal === true ? $returnString . ' terminal=true' : $returnString . ' terminal=false';

        return $returnString;
    }
}
