<?php

namespace JoshuaEstes\Component\FeatureToggle\Repository;

use JoshuaEstes\Component\FeatureToggle\FeatureContainer;
use JoshuaEstes\Component\FeatureToggle\FeatureInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\OptionsResolver\Options;

/**
 * Persists the features in an ini file
 *
 * @author Joshua Estes <Joshua@Estes.in>
 */
class IniRepository implements RepositoryInterface
{

    protected $options;
    protected $iniFile;
    protected $container;

    /**
     * Options:
     *     - path: The path to store the file
     */
    public function __construct(array $options = array())
    {
        $resolver = new OptionsResolver();
        $this->setDefaultOptions($resolver);
        $this->options = $resolver->resolve($options);
        $this->parseIniFile();
    }

    protected function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired(
            array(
                'path',
            )
        );
    }

    protected function parseIniFile()
    {
        if (null === $this->iniFile) {
            if (!is_file($this->options['path'] . '/features.ini')) {
                touch($this->options['path'] . '/features.ini');
            }
            $this->iniFile = parse_ini_file(
                $this->options['path'] . '/features.ini',
                true
            );
        }
    }

    protected function writeIniFile()
    {
        $contents = array();
        foreach ($this->iniFile as $section => $val) {
            $contents[] = sprintf("[%s]", $section);
            foreach ($val as $k => $v) {
                $contents[] = sprintf("%s=\"%s\"", $k, $v);
            }
        }

        file_put_contents($this->options['path'] . '/features.ini', implode("\n", $contents));

        $this->reload();
    }

    protected function reload()
    {
        $this->iniFile = null;
        $this->parseIniFile();
    }

    /**
     * {@inheritDoc}
     */
    public function get($key)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function add(FeatureInterface $feature)
    {
        $this->iniFile[$feature->getKey()] = array(
            'description' => $feature->getDescription(),
            'toggle'      => get_class($feature->getToggle()),
        );

        $this->writeIniFile();

        return $feature;
    }

    /**
     * {@inheritDoc}
     */
    public function update(FeatureInterface $feature)
    {
        return $this->add($feature);
    }

    /**
     * {@inheritDoc}
     */
    public function delete($key)
    {
        unset($this->iniFile[$key]);

        $this->writeIniFile();
    }

    /**
     * {@inheritDoc}
     */
    public function all()
    {
    }
}
