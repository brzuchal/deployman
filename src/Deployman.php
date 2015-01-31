<?php
namespace Deployman;

use Deployman\Console\Application;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\Console\Output\Output;
use Symfony\Component\Finder\Finder;

class Deployman
{
    private $application;

    private $modifiers = array();
    private $input;
    private $output;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function add($name, callable $callback)
    {
        if (!is_callable($callback)) {
            throw new \UnexpectedValueException('Deployman expects task name and callback, missing valid callback');
        }
        $this->application->register($name)->setCode($callback);
    }

    /**
     * @return Finder
     */
    public function finder()
    {
        $finder = new Finder();
        $finder->in($this->application->currentWorkingDir);

        return $finder;
    }

    public function register($name, callable $callback)
    {
        if (array_key_exists($name, $this->modifiers)) {
            throw new \UnexpectedValueException("Deployman already has registered modifier named: {$name}");
        }
        $this->modifiers[$name] = $callback;
    }

    public function __call($name, $arguments)
    {
        if (!array_key_exists($name, $this->modifiers)) {
            throw new \RuntimeException("Deployman has missing modifier named: {$name}");
        }
        $modifier = $this->modifiers[$name];

        return $modifier;
    }

    public function writeln($message)
    {
        return $this->output->writeln($message);
    }

    public function setIO(Input $input, Output $output)
    {
        $this->input = $input;
        $this->output = $output;
    }
}