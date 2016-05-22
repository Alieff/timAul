<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;

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

    public function testContactFormSuccess()
    {
        $this->visit('contact')
             ->type('Taylor', 'name')
             ->type('Taylor@gmail.com', 'email')
             ->type('I am testing you', 'message')
             ->press('Submit')
             ->seePageIs('contact')
             ->see('Thanks for contacting us!');
    }

    public function testContactFormJustName()
    {
        $this->visit('contact')
             ->type('Taylor', 'name')
             ->press('Submit')
             ->seePageIs('contact')
             ->see('The email field is required.')
             ->see('The message field is required.')
             ->dontSee('The name field is required');
    }

    public function testContactFormJustEmail()
    {
        $this->visit('contact')
             ->type('Taylor@gmail.com', 'email')
             ->press('Submit')
             ->seePageIs('contact')
             ->see('The name field is required.')
             ->see('The message field is required.')
             ->dontSee('The email field is required.');
    }
    
    public function testContactFormNotValidEmail()
    {
        $this->visit('contact')
             ->type('Taylor', 'email')
             ->press('Submit')
             ->seePageIs('contact')
             ->see('The email must be a valid email address.')
             ->see('The name field is required.')
             ->see('The message field is required.');
    }

    public function testContactFormJustMessage()
    {
        $this->visit('contact')
             ->type('Hello there', 'message')
             ->press('Submit')
             ->seePageIs('contact')
             ->see('The name field is required.')
             ->see('The email field is required.')
             ->dontSee('The message field is required.');
    }

    public function testContactFormNameEmail()
    {
        $this->visit('contact')
             ->type('James', 'name')
             ->type('James@gmail.com', 'email')
             ->press('Submit')
             ->seePageIs('contact')
             ->dontSee('The name field is required.')
             ->dontSee('The email field is required.')
             ->see('The message field is required.');
    }

    public function testContactFormNameMessage()
    {
        $this->visit('contact')
             ->type('James', 'name')
             ->type('Hello there, i have question', 'message')
             ->press('Submit')
             ->seePageIs('contact')
             ->dontSee('The name field is required.')
             ->see('The email field is required.')
             ->dontSee('The message field is required.');
    }

    public function testContactFormEmailMessage()
    {
        $this->visit('contact')
             ->type('James@gmail.com', 'email')
             ->type('Hello there, i have question', 'message')
             ->press('Submit')
             ->seePageIs('contact')
             ->see('The name field is required.')
             ->dontSee('The email field is required.')
             ->dontSee('The message field is required.');
    }

    // FAQ
    public function testDisplayFAQ()
    {
        $this->visit('faq')
             ->see('You have Questions');
    }   

    //ADMIN DASHBOARD
    public function testUnauthenticatedUserDashboardAccess() {
        $response = $this->call('GET', 'admin/dashboard');
        $this->assertRedirectedTo('login');
    }

    public function testAuthenticateUserDashboardAccess()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
             ->visit('admin/dashboard')
             ->see($user->name);
    }

    //ADMIN CRUD 
    public function testUnauthenticatedUserCRUDAccess() {
        $response = $this->call('GET', 'admin/crud');
        $this->assertRedirectedTo('login');
    }

    public function testAuthenticateUserCRUDAccess()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
             ->visit('admin/crud')
             ->see($user->name)
             ->see('CRUD');
    }

    //ADMIN SEARCH
    public function testUnauthenticatedUserSearchAccess() {
        $response = $this->call('GET', 'admin/search');
        $this->assertRedirectedTo('login');
    }

    public function testAuthenticateUserSearchAccess()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
             ->visit('admin/search')
             ->see($user->name)
             ->see('Find Quote');
    }

    //ADMIN CRAWLER SETTING
    public function testUnauthenticatedUserCrawlerSettingAccess() {
        $response = $this->call('GET', 'admin/setting');
        $this->assertRedirectedTo('login');
    }

    public function testAuthenticateUserCrawlerSettingAccess()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
             ->visit('admin/setting')
             ->see($user->name)
             ->see('Settings Crawler');
    }

}
