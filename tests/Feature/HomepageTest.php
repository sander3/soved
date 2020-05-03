<?php

namespace Tests\Feature;

use App\Package;
use App\Experience;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    public function testSessionCookieIsMissing()
    {
        $response = $this->get('/');

        $response->assertCookieMissing(config('session.cookie'));
    }

    public function testHeroContainsFullName()
    {
        $response = $this->get('/');

        $response->assertSeeText('Sander de Vos');
    }

    public function testContainsExperiences()
    {
        $response = $this->get('/');

        $experiences = Experience::orderBy('start_year', 'desc')
            ->take(5)
            ->pluck('organization')
            ->toArray();

        $response->assertSeeTextInOrder($experiences);
    }

    public function testContainsSkills()
    {
        $response = $this->get('/');

        $response->assertSeeTextInOrder(__('skills.categories'));
    }

    public function testContainsPackages()
    {
        $response = $this->get('/');

        $packages = Package::latest()
            ->take(3)
            ->pluck('name')
            ->toArray();

        $response->assertSeeTextInOrder($packages);
    }
}
