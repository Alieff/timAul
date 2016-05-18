<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{

    // HOMEPAGE
    public function testDisplayHome()
    {
        $this->visit('/')
             ->see('INSPIRE CRAWLER');
    }

    public function testUseOurAPILink()
    {
        $this->visit('/')
             ->click('Use Our API')
             ->seePageIs('apioverview');
    }

    public function testFindOutMoreLink()
    {
        $this->visit('/')
             ->click('Find Out More')
             ->seePageIs('documentation');
    }


    // ABOUT PAGE
    public function testDisplayAbout()
    {
        $this->visit('about')
             ->see('About API');
    }


    // DOCUMENTATION
    public function testDisplayDocumentation()
    {
        $this->visit('documentation')
             ->see('Inilah dokumentasi yang dapat membantu Anda untuk menggunakan API kami. Terdapat beberapa penjelasan dari tiap bagian yang ada.');
    }


    // API OVERVIEW
    public function testDisplayAPIOverview()
    {
        $this->visit('apioverview')
             ->see('APIDOC');
    }


    // SOURCE CODE
    public function testDisplaySourceCode()
    {
        $this->visit('sourcecode')
             ->see('javadocnya');
    }


    // TERM OF USE
    public function testDisplayTermOfUse()
    {
        $this->visit('termofuse')
             ->see('Proin eleifend odio');
    }


    // CONTACT
    public function testDisplayContact()
    {
        $this->visit('contact')
             ->see('Ask us Anything');
    }

    public function testContactForm()
    {
        $this->visit('contact')
             ->type('Taylor', 'name')
             ->type('Taylor@gmail.com', 'email')
             ->type('I am testing you', 'message')
             ->press('Submit')
             ->seePageIs('contact')
             ->see('Thanks for contacting us!');
    }


    // FAQ
    public function testDisplayFAQ()
    {
        $this->visit('faq')
             ->see('You have Questions');
    }    

}
