<?php
//namespace _support;

use Step\Acceptance\CRMOperatorSteps as OperatorTest;
use Step\Acceptance\CRMUserSteps as UserTest;



$I = new OperatorTest($scenario);
$I->wantTo('add two different customers to database');
$I->amInAddCustomerUi();
$first_customer = $I->imagineCustomer();
$I->fillCustomerDataForm($first_customer);
$I->submitCustomerDataForm();
$I->seeIAmInListCustomersUi();
$I->amInAddCustomerUi();
$second_customer = $I->imagineCustomer();
$I->fillCustomerDataForm($second_customer);
$I->submitCustomerDataForm();
$I->seeIAmInListCustomersUi();
#$I = new \AcceptanceTester\CRMUserSteps($scenario);
$I = new UserTest($scenario);
$I->wantTo('query the customer info using his phone number');
$I->amInQueryCustomerUi();
$I->fillInPhoneFieldWithDataFrom($first_customer);
$I->clickSearchButton();
$I->seeIAmInListCustomersUi();
$I->seeCustomerInList($first_customer);
$I->dontSeeCustomerInList($second_customer);
