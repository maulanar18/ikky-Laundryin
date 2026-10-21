<?php

namespace Tests\Feature;

use App\Models\BusinessProfile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompanyProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_loads_successfully_with_business_data(): void
    {
        BusinessProfile::create([
            'name' => 'IKKY LAUNDRYIN COIN',
            'tagline' => 'Cuci Bersih, Praktis, Tanpa Ribet!',
            'sub_tagline' => 'Tinggal Masukkan Koin, Langsung Jalan!',
            'description' => 'Layanan laundry koin mandiri praktis.',
            'price_info' => 'Mulai dari Rp5.000 per kali cuci',
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('IKKY LAUNDRYIN');
        $response->assertSee('Rp5.000');
    }

    public function test_homepage_displays_owner_profile_and_whatsapp_cta(): void
    {
        BusinessProfile::create([
            'name' => 'IKKY LAUNDRYIN COIN',
            'tagline' => 'Cuci Bersih, Praktis, Tanpa Ribet!',
            'sub_tagline' => 'Tinggal Masukkan Koin, Langsung Jalan!',
            'description' => 'Layanan laundry koin mandiri praktis.',
            'price_info' => 'Mulai dari Rp5.000 per kali cuci',
            'owner_name' => 'Ikky & Tim Laundryin',
            'owner_title' => 'Owner & Operational Lead',
            'owner_bio' => 'Berkomitmen menghadirkan layanan laundry koin modern.',
            'whatsapp_number' => '6281234567890',
            'address' => 'Jl. Utama Laundry No. 88',
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Ikky & Tim Laundryin');
        $response->assertSee('Owner & Operational Lead');
        $response->assertSee('Jl. Utama Laundry No. 88');
        $response->assertSee('https://wa.me/6281234567890', false);
        $response->assertSee('Tanya CS / Order');
        $response->assertDontSee('Masuk Admin');
    }

    public function test_login_and_admin_urls_safely_redirect_to_homepage(): void
    {
        $responseLogin = $this->get('/login');
        $responseLogin->assertRedirect('/');

        $responseAdminLogin = $this->get('/admin/login');
        $responseAdminLogin->assertRedirect('/');

        $responseAdmin = $this->get('/admin');
        $responseAdmin->assertRedirect('/');
    }

    public function test_homepage_has_no_login_links_or_admin_portal(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertDontSee('/admin/login');
        $response->assertDontSee('Masuk Admin');
        $response->assertDontSee('Panel Administrator');
    }
}
