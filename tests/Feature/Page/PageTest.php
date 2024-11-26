<?php

namespace Tests\Feature\Page;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PageTest extends TestCase
{
    use RefreshDatabase;

    public function testIndexPage()
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('pages.index'));

        $response->assertStatus(200);
        $response->assertViewIs('page.index');
        $response->assertSeeText('Strona główna');
    }

    public function testAboutPage(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('pages.about'));

        $response->assertStatus(200);
        $response->assertViewIs('page.about');
        $response->assertSeeText('O firmie');
    }

    public function testContactPage(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('pages.contacts.create'));

        $response->assertStatus(200);
        $response->assertViewIs('page.contact.create');
        $response->assertSeeText('Kontakt');
    }

    public function testStoreContact(): void
    {
        $this->withoutExceptionHandling();
        $contactForm = [
            'subject' => 'Subject',
            'content' => 'Content',
            'author' => 'John Doe',
            'email' => 'test@email.pl'
        ];
        $response = $this->post(route('pages.contacts.store'), $contactForm);

        $response->assertStatus(302);
    }

    public function testStoreSpamContact(): void
    {
        $this->withoutExceptionHandling();
        $contactForm = [
            'subject' => 'Subject',
            'content' => 'Content',
            'author' => 'John Doe',
            'email' => 'test@email.pl',
            'i_am_not_a_robot' => true, // this is spam
        ];
        $response = $this->post(route('pages.contacts.store'), $contactForm);

        $response->assertRedirectToRoute('pages.index');
    }
}
