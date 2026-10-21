<?php

namespace Database\Seeders;

use App\Models\Advantage;
use App\Models\BusinessProfile;
use App\Models\GalleryImage;
use App\Models\Service;
use App\Models\Slide;
use App\Models\User;
use App\Models\WorkingStep;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::updateOrCreate(
            ['email' => 'admin@ikkylaundryin.com'],
            [
                'name' => 'Administrator',
                'email' => 'admin@ikkylaundryin.com',
                'password' => Hash::make('admin123'),
            ]
        );

        // Business Profile
        BusinessProfile::updateOrCreate(
            ['id' => 1],
            [
                'name' => 'IKKY LAUNDRYIN COIN',
                'tagline' => 'Cuci Bersih, Praktis, Tanpa Ribet!',
                'sub_tagline' => 'Tinggal Masukkan Koin, Langsung Jalan!',
                'description' => 'IKKY LAUNDRYIN COIN adalah layanan laundry koin mandiri yang praktis dan modern. Kami hadir untuk membantu aktivitas harianmu dengan fasilitas mesin cuci dan pengering berkualitas tinggi yang mudah digunakan oleh siapa saja. Cukup siapkan koin, pilih mesin, dan nikmati layanan laundry bersih dan higienis tanpa perlu menunggu lama.',
                'owner_name' => 'Ikky & Tim Laundryin',
                'owner_title' => 'Pemilik & Pengelola IKKY LAUNDRYIN COIN',
                'owner_bio' => 'Berkomitmen menghadirkan layanan laundry koin mandiri yang bersih, higienis, dan terpercaya. Pakaian setiap pelanggan kami jaga agar tidak pernah tercampur, mesin terawat rutin, dan suasana outlet selalu sejuk dan nyaman untuk dikunjungi setiap hari.',
                'owner_photo' => '',
                'price_info' => 'Mulai dari Rp5.000 per kali cuci',
                'address' => 'Jl. Utama Laundry No. 88 (Dekat Area Kampus & Pemukiman Warga)',
                'phone' => '0812-3456-7890',
                'whatsapp_number' => '6281234567890',
                'email' => 'kontak@ikkylaundryin.com',
                'working_hours' => 'Buka Setiap Hari: 06.00 – 22.00 WIB (Termasuk Tanggal Merah)',
                'google_maps_link' => 'https://maps.google.com/maps?q=Laundry+Coin&t=&z=14&ie=UTF8&iwloc=&output=embed',
                'social_facebook' => 'https://facebook.com',
                'social_instagram' => 'https://instagram.com',
                'social_twitter' => 'https://twitter.com',
            ]
        );

        // Slides
        Slide::truncate();
        $slides = [
            [
                'title' => 'Ruang Bersih, Adem & Nyaman',
                'description' => 'Tunggu cucian sambil santai di ruangan bersih, sejuk, dan nyaman untuk aktivitas harianmu.',
                'image_path' => 'slides/slide-1-interior.jpg',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'Cucian Bersih Tuntas & Higienis',
                'description' => 'Mesin cuci berkapasitas besar dengan teknologi terkini membersihkan noda secara optimal.',
                'image_path' => 'slides/slide-2-washer.jpg',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => '100% Kering Siap Lipat Tanpa Jemur',
                'description' => 'Pengering pakaian cepat dan bertenaga tinggi, pakaian langsung kering hangat siap pakai.',
                'image_path' => 'slides/slide-3-dryer.jpg',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'title' => 'Pakaian Bersih, Wangi & Bebas Repot',
                'description' => 'Hasil cucian bersih, wangi, dan segar. Kualitas laundry profesional dengan harga terjangkau.',
                'image_path' => 'slides/slide-4-clean.jpg',
                'is_active' => true,
                'order' => 4,
            ],
        ];
        foreach ($slides as $slide) {
            Slide::create($slide);
        }

        // Services
        Service::truncate();
        $services = [
            [
                'title' => 'Mesin Cuci (Washer)',
                'description' => 'Layanan mesin cuci self-service dengan drum kapasitas besar. 1 mesin khusus untuk pakaianmu sendiri tanpa dicampur orang lain. Dilengkapi sistem pencucian higienis berteknologi tinggi untuk hasil bersih maksimal.',
                'image_path' => 'services/service-washer.jpg',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'Mesin Pengering (Dryer)',
                'description' => 'Layanan pengering pakaian berkecepatan tinggi dengan suhu stabil. Pakaian kering 100% tuntas, hangat, dan siap langsung dilipat tanpa perlu dijemur lagi di bawah terik matahari.',
                'image_path' => 'services/service-dryer.jpg',
                'is_active' => true,
                'order' => 2,
            ],
        ];
        foreach ($services as $service) {
            Service::create($service);
        }

        // Advantages
        Advantage::truncate();
        $advantages = [
            [
                'title' => 'Mudah & Cepat',
                'description' => 'Proses laundry yang sangat mudah dan cepat. Cukup masukkan koin, pilih program, dan mesin otomatis jalan. Tidak perlu antri panjang.',
                'icon_class' => 'fas fa-bolt',
                'order' => 1,
            ],
            [
                'title' => 'Bersih & Higienis',
                'description' => 'Mesin cuci terawat dan dibersihkan secara rutin. 1 mesin hanya untuk 1 pelanggan tanpa dicampur baju orang lain.',
                'icon_class' => 'fas fa-shield-alt',
                'order' => 2,
            ],
            [
                'title' => 'Hemat Waktu',
                'description' => 'Cuci dan kering selesai dalam hitungan menit. Kamu bisa menunggu sambil santai atau mengerjakan hal lain dengan efisien.',
                'icon_class' => 'fas fa-clock',
                'order' => 3,
            ],
            [
                'title' => 'Mesin Cuci & Pengering',
                'description' => 'Tersedia lengkap mesin cuci dan pengering komersial di satu tempat. Baju kering tuntas siap lipat tanpa perlu dijemur.',
                'icon_class' => 'fas fa-tshirt',
                'order' => 4,
            ],
        ];
        foreach ($advantages as $adv) {
            Advantage::create($adv);
        }

        // Working Steps
        WorkingStep::truncate();
        $steps = [
            [
                'title' => 'Masukkan Koin Sesuai Harga',
                'description' => 'Siapkan koin sesuai harga layanan yang dipilih, lalu masukkan ke slot koin pada mesin yang tersedia.',
                'order' => 1,
            ],
            [
                'title' => 'Pilih Mesin Cuci / Pengering',
                'description' => 'Pilih mesin cuci atau mesin pengering sesuai kebutuhan pakaianmu. Masukkan pakaian ke dalam drum mesin.',
                'order' => 2,
            ],
            [
                'title' => 'Tekan Tombol Mulai (Start)',
                'description' => 'Setelah pakaian dan deterjen siap, tekan tombol START. Mesin akan langsung beroperasi secara otomatis.',
                'order' => 3,
            ],
            [
                'title' => 'Pakaian Bersih & Kering Selesai',
                'description' => 'Tunggu beberapa menit hingga alarm selesai berbunyi. Pakaianmu sudah bersih, harum, kering, dan siap dipakai.',
                'order' => 4,
            ],
        ];
        foreach ($steps as $step) {
            WorkingStep::create($step);
        }

        // Gallery
        GalleryImage::truncate();
        $gallery = [
            ['title' => 'Ruang Interior Outlet', 'image_path' => 'gallery/gallery-interior.jpg', 'order' => 1, 'is_active' => true],
            ['title' => 'Mesin Cuci Komersial', 'image_path' => 'gallery/gallery-washer.jpg', 'order' => 2, 'is_active' => true],
            ['title' => 'Mesin Pengering Cepat', 'image_path' => 'gallery/gallery-dryer.jpg', 'order' => 3, 'is_active' => true],
            ['title' => 'Fasilitas Ruang Tunggu', 'image_path' => 'gallery/gallery-facility.jpg', 'order' => 4, 'is_active' => true],
            ['title' => 'Hasil Pakaian Bersih & Rapi', 'image_path' => 'gallery/gallery-clothes.jpg', 'order' => 5, 'is_active' => true],
            ['title' => 'Area Outlet Bersih', 'image_path' => 'gallery/gallery-area.jpg', 'order' => 6, 'is_active' => true],
        ];
        foreach ($gallery as $img) {
            GalleryImage::create($img);
        }
    }
}
