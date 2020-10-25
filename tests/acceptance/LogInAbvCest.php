<?php 

use \Codeception\Step\Argument\PasswordArgument;

class LogInAbvCest
{

    public function login(AcceptanceTester $I)
    {
    if ($I->loadSessionSnapshot('login')) return;

    $I->amOnPage('/');
    $I->fillField('username', 'kalinazinmura@abv.bg');
    $I->fillField('password', new PasswordArgument('123abvsucks'));
    $I->click('Вход');
    $I->wait(1);
    $I->see('Здравейте, Kalina Mincheva');  

    $I->saveSessionSnapshot('login'); 
    }

    public function logout(AcceptanceTester $I)
    {
    $I->see('Здравейте, Kalina Mincheva');
    $I->click('//*[@id="gwt-uid-406"]');
    $I->click('//*[@id="gwt-uid-409"]');
    $I->wait(1);
    $I->see('Към абв поща');
    }

    public function wrongLogin(AcceptanceTester $I)
    {
    $I->amOnPage('/');
    $I->fillField('username', 'kalinazinmura@abv.bg');
    $I->fillField('password', new PasswordArgument('123'));
    $I->click('Вход');
    $I->wait(1);
    $I->see('Грешен потребител / парола.');  
    }
}
