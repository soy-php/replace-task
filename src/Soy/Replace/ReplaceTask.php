<?php

namespace Soy\Replace;

use Soy\Task\TaskInterface;

class ReplaceTask implements TaskInterface
{
    /**
     * @var array
     */
    protected $replacements = [];

    /**
     * @var string
     */
    protected $source;

    /**
     * @var string
     */
    protected $destination;

    /**
     * @var bool
     */
    protected $caseSensitive = true;

    public function run()
    {
        $replacementKeys = array_keys($this->getReplacements());
        $replacementValues = array_values($this->getReplacements());

        $sourceContent = file_get_contents($this->getSource());
        if ($this->isCaseSensitive()) {
            $replacedContent = str_replace($replacementKeys, $replacementValues, $sourceContent);
        } else {
            $replacedContent = str_ireplace($replacementKeys, $replacementValues, $sourceContent);
        }

        if ($this->getDestination() !== null) {
            file_put_contents($this->getDestination(), $replacedContent);
        } else {
            file_put_contents($this->getSource(), $replacedContent);
        }
    }

    /**
     * @return array
     */
    public function getReplacements()
    {
        return $this->replacements;
    }

    /**
     * @param array $replacements
     * @return $this
     */
    public function setReplacements(array $replacements)
    {
        $this->replacements = $replacements;
        return $this;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     * @return $this
     */
    public function setSource($source)
    {
        $this->source = $source;
        return $this;
    }

    /**
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @param string $destination
     * @return $this
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
        return $this;
    }

    /**
     * @return bool
     */
    public function isCaseSensitive()
    {
        return $this->caseSensitive;
    }

    /**
     * @param bool $caseSensitive
     * @return $this
     */
    public function setCaseSensitive($caseSensitive)
    {
        $this->caseSensitive = $caseSensitive;
        return $this;
    }
}
