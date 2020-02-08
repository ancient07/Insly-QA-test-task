<?php 

class InslyCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests

    /**
     * @param AcceptanceTester $I
     * @throws Exception
     */
    public function tryToTest(AcceptanceTester $I)
    {
        $I->wantTo('open the google search page');
        $googlePage = new \Page\GooglePage($I);
        $googlePage->open();

        $I->wantTo('input search phrase');
        $googlePage->search();

        $I->wantTo('verify search results');
        $googlePage->verifySearch();

        $I->wantTo('click and verify on search result');
        $googlePage->clickAndVerify();

    }
}
