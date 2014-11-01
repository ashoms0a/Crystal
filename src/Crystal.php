<?php
namespace Crystal;

/**
 * Class Crystal
 *
 * A simple word replacement engine. It basically replace a word with another
 * based on a word-replacement collection provided by the user
 *
 * @package Crystal
 * @Author  Mohammed Ashour <ashoms0a@gmail.com>
 */
class Crystal
{
    /**
     * A list of words and their replacements in the below format
     *
     *  array(
     *      'word1' => 'replacement1',
     *      'word2' => 'replacement2',
     *  )
     *
     * @var array
     */
    protected $wordReplacementCollection = array();

    /**
     * You have the option to pass the word-replacement collection through
     * the class constructor when creating a new instance
     *
     * @param array $wordReplacementCollection
     */
    public function __construct($wordReplacementCollection = array())
    {
        $this->setReplacementCollection($wordReplacementCollection);
    }

    /**
     * Sets word-replacement collection
     *
     * @param $wordReplacementCollection
     */
    public function setReplacementCollection($wordReplacementCollection)
    {
        $this->wordReplacementCollection = $wordReplacementCollection;
    }

    /**
     * Gets word-replacement collection
     *
     * @return array
     */
    public function getReplacementCollection()
    {
        return $this->wordReplacementCollection;
    }

    /**
     * Replaces all provided words with their corresponding replacements in the
     * provided subject. The subject can be a single string or an array of strings
     *
     * @param $subject
     *
     * @return mixed
     */
    public function clear($subject)
    {
        $words        = array_keys($this->wordReplacementCollection);
        $replacements = array_values($this->wordReplacementCollection);
        return str_ireplace($words, $replacements, $subject);
    }

}