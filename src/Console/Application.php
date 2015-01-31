<?php
namespace Deployman\Console;

use Deployman\Deployman;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Command\HelpCommand;
use Symfony\Component\Console\Command\ListCommand;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;

class Application extends \Symfony\Component\Console\Application
{
    private $deployman;

    public function __construct($currentWorkingDir = null)
    {
        parent::__construct('Deployman', '0.1');
        $this->currentWorkingDir = $currentWorkingDir;
        $this->deployman = new Deployman($this);

        $finder = new Finder();
        $files = $finder->in($this->currentWorkingDir)->name('deployman.php');
        foreach ($files as $file) {
            $this->requireDefinitionFile($file, $this->deployman);
        }
    }

    /**
     * @param $file
     * @param Deployman $deployman
     */
    private function requireDefinitionFile($file, Deployman $deployman)
    {
        require_once $file;
    }

    /**
     * Gets the default commands that should always be available.
     *
     * @return Command[] An array of default Command instances
     */
    protected function getDefaultCommands()
    {
        return array(new HelpCommand(), new ListCommand());
    }

    public function run(InputInterface $input = null, OutputInterface $output = null)
    {
        if (null === $input) {
            $input = new ArgvInput();
        }

        if (null === $output) {
            $output = new ConsoleOutput();
        }

        $this->deployman->setIO($input, $output);

        return parent::run($input, $output);
    }
}
