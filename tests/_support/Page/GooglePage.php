<?php
namespace Page;

use Codeception\Util\Locator;

class GooglePage
{
    // include url of current page
    public static $URL = '/';

    protected $actor;

    /**
     * GooglePage constructor.
     * @param $I \AcceptanceTester
     */
    public function __construct($I)
    {
        $this->actor = $I;
    }

    /**
     * @throws \Exception
     */
    public function open()
    {
        $I = $this->actor;
        $I->amOnPage(self::$URL);
        $I->seeElement('//img[@alt="Google"]');
    }

    /**
     * @throws \Exception
     */
    public function search()
    {
        $I = $this->actor;
        $I->fillField('input[type="text"]', 'insly.com');
        $I->pressKey('input[type="text"]',\Facebook\WebDriver\WebDriverKeys::ENTER);
        $I->waitForElementVisible('//div[@id="resultStats"]', 5 );
    }

    public function verifySearch()
    {
        $I = $this->actor;
        $I->seeInPageSource("https://insly.com/en");
    }

    /**
     * @throws \Exception
     */
    public function clickAndVerify()
    {
        $I = $this->actor;
        $I->clickWithLeftButton(Locator::contains('cite', 'insly.com'));
        $I->waitForElement(Locator::contains('title','Insly - Simple Insurance Software for Brokers and MGAs' ), 5);
    }


    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */

    /**
     * Basic route example for your current URL
     * You can append any additional parameter to URL
     * and use it in tests like: Page\Edit::route('/123-post');
     */
    public static function route($param)
    {
        return static::$URL.$param;
    }


}
