<?php

namespace spec\Crystal;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class CrystalSpec
 *
 * @package spec\Ashour
 */
class CrystalSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith(['idiot' => 'nice', 'stupid' => 'smart']);
        $this->shouldHaveType('Crystal\Crystal');
    }

    public function it_recieves_words_and_replacement_collection()
    {
        $this->setReplacementCollection(['idiot' => 'nice', 'stupid' => 'smart']);
        $this->getReplacementCollection()->shouldBeArray();
        $this->getReplacementCollection()->shouldHaveKey('stupid');
    }

    public function it_replaces_all_provided_words_with_their_corresponding_replacements()
    {
        $this->setReplacementCollection(['idiot' => 'nice', 'stupid' => 'smart']);
        $this->clear('you are stupid and idiot')->shouldReturn('you are smart and nice');
    }

    public function it_repalces_all_words_with_their_replacements_regaredless_of_words_letter_case()
    {
        $this->setReplacementCollection(['idiot' => 'nice', 'stupid' => 'smart']);
        $this->clear('you are STUPID and idiOT')->shouldReturn('you are smart and nice');
    }

    public function it_return_the_same_string_if_no_words_and_replacements_exist()
    {
        $this->setReplacementCollection([]);
        $this->clear('you are stupid and idiot')->shouldReturn('you are stupid and idiot');
    }

    public function it_accepts_replacement_collection_through_constructor()
    {
        $this->beConstructedWith(['idiot' => 'nice', 'stupid' => 'smart']);
        $this->clear('you are stupid and idiot')->shouldReturn('you are smart and nice');
    }

    public function it_accepts_multiple_string_for_words_replacement()
    {
        $this->beConstructedWith(['idiot' => 'nice', 'stupid' => 'smart']);
        $this->clear(['you are stupid and idiot','you are an idiot'])->shouldHaveCount(2);
        $this->clear(['you are stupid and idiot','you are an idiot'])->shouldContain('you are an nice');
    }
}
