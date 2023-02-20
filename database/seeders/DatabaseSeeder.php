<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Lokasi;
use App\Models\Ulasan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // lokasi seeder
        Lokasi::create([
            'nama_lokasi' => 'Syah Point',
            'alamat_lokasi' => 'Kabupaten Pohuwato',
            'depth' => '3m - 17m',
            'visibility' => '10m - 15m',
            'coral_reef' => 'Sponges, actiniidae, cerianthidae, clavelinidae, diazonidae, polycitoridae, melithaeidae, plexauridae, ellisellidae, pennatulacea',
            'creature' => 'Anemonefish, blennies, boxfish, butterflyfishes, gobies, nudiranch, damsel, flathead, lionfish, tobies',
            'latitude' => '0.417517',
            'longitude' => '121.947978',
            'status' => 'terverifikasi'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'Busy Corner',
            'alamat_lokasi' => 'Kabupaten Pohuwato',
            'depth' => '6m - 50m',
            'visibility' => '20m - 40m',
            'coral_reef' => 'Ascidians, ascidiidae, clavelinidae, diazonidae, polycitoridae, melithaeidae, plexauridae, ellisellidae, petrosia lignosa',
            'creature' => 'Groupers, puffer, whiptails, switlips, snapper, tobies, wrasses, polyceridae, big eye, turtles, eagle ray, giant traveling',
            'latitude' => '0.408011',
            'longitude' => '122.043014',
            'status' => 'terverifikasi'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'Eagle Point',
            'alamat_lokasi' => 'Kabupaten Pohuwato',
            'depth' => '6m - 40m',
            'visibility' => '20m - 40m',
            'coral_reef' => 'Ascidians, ascidiidae, clavelinidae, diazonidae, polycitoridae, melithaeidae, plexauridae, gorgoniidae, ellisellidae, petrosia lignosa',
            'creature' => 'Groupers, puffer, whiptails, switlips, snapper, tobies, wrasses, polyceridae, turtles, big eye, eagle ray, fire goby',
            'latitude' => '0.407033',
            'longitude' => '122.044794',
            'status' => 'terverifikasi'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'Biluhu ring',
            'alamat_lokasi' => 'Desa Biluhu kabupaten Gorontalo',
            'depth' => '5m - 20m',
            'visibility' => '20m - 25m',
            'coral_reef' => 'polycarpa, symplegma, rhopalaea, didemnum, petrosia lignosa',
            'creature' => 'anthias, parrotfish, triggerfish, nudibranch, surgeonfish',
            'latitude' => '0.490028',
            'longitude' => '122.965611',
            'status' => 'terverifikasi'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'Sand channels',
            'alamat_lokasi' => 'Desa Biluhu kabupaten Gorontalo',
            'depth' => '5m - 20m',
            'visibility' => '15m – 18m',
            'coral_reef' => 'oxycomanthus, triphyllozoon sp, cirrhipathes, heliopora',
            'creature' => 'anthias, blue devil, butterflyfish, grouper, nudibranch, foxtail colonial tunicates',
            'latitude' => '0.488778',
            'longitude' => '122.974472',
            'status' => 'terverifikasi'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'west point',
            'alamat_lokasi' => 'Desa Biluhu kabupaten Gorontalo',
            'depth' => '5m - 30m',
            'visibility' => '20m – 30m',
            'coral_reef' => 'petrosia lignose, heliopore, plexauridea, dendronephthya sp, gorgonian',
            'creature' => 'blenny, grouper, triggerfish, anemone, clownfish',
            'latitude' => '0.486389',
            'longitude' => '122.976944',
            'status' => 'terverifikasi'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'windows',
            'alamat_lokasi' => 'Desa Kayubulan Kabupaten Gorontalo',
            'depth' => '5m - 20m',
            'visibility' => '10m – 25m',
            'coral_reef' => 'arcopora, sarcophyton sp, sunilaria sp, lobophyton sp, petrosia lignosa',
            'creature' => 'napoleon wrasse, anthias, blenny, firefish goby, fusiliers',
            'latitude' => '0.486194',
            'longitude' => '122.985139',
            'status' => 'terverifikasi'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'Cliffs',
            'alamat_lokasi' => 'Desa Kayubulan Kabupaten Gorontalo',
            'depth' => '3m - 25m',
            'visibility' => '10m – 25m',
            'coral_reef' => 'petrosia lignosa, favites, alveopora, porites sp, arcopora',
            'creature' => 'sweetlips, damsel, parrotfish, anthias, napoleon wrasse',
            'latitude' => '0.485556',
            'longitude' => '122.990028',
            'status' => 'terverifikasi'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'Lady Fingers',
            'alamat_lokasi' => 'Desa Kayubulan Kabupaten Gorontalo',
            'depth' => '3m - 25m',
            'visibility' => '10m – 25m',
            'coral_reef' => 'favites, platygyra, turbinaria, lobophyton sp, petrosia lignosa',
            'creature' => 'hawkfish, grouper, anthias, damsel, snapper',
            'latitude' => '0.486917',
            'longitude' => '122.991944',
            'status' => 'terverifikasi'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'Sunrise Garden',
            'alamat_lokasi' => 'Desa Lopo Kabupaten Gorontalo',
            'depth' => '3m - 30m',
            'visibility' => '10m – 25m',
            'coral_reef' => 'hextospongia, milleporasp, pocillopora, stylophora, petrosia lignosa, antipathies sp',
            'creature' => 'pymy seahorse, snapper, anthias, Sarasvati shrimp, bubble coral shrimp',
            'latitude' => '0.488917',
            'longitude' => '123.010278',
            'status' => 'terverifikasi'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'Otje garden',
            'alamat_lokasi' => 'Desa Lopo Kabupaten Gorontalo',
            'depth' => '3m - 20m',
            'visibility' => '10m – 25m',
            'coral_reef' => 'arcopra, echinopora, turbinaria, millepora sp, xetospongia, cribrochalina',
            'creature' => 'anthias, sea star shrimp, crinoid shrimp, squat shrimp, fusilier, algae shrimp',
            'latitude' => '0.491306',
            'longitude' => '123.012972',
            'status' => 'terverifikasi'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'Rawan',
            'alamat_lokasi' => 'Desa Lopo Kabupaten Gorontalo',
            'depth' => '5m - 25m',
            'visibility' => '10m - 25m',
            'coral_reef' => 'favites, dendronephthya sp, ellisellasp, sinularia sp, arcopora',
            'creature' => 'nudibranch, crinoid shrimp, parrotfish, sweetlips, Sarasvati shrimp',
            'latitude' => '0.492056',
            'longitude' => '123.023361',
            'status' => 'terverifikasi'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'Tempat Baru',
            'alamat_lokasi' => 'Desa Bongo Kabupaten Gorontalo',
            'depth' => '3m - 25m',
            'visibility' => '10m - 25m',
            'coral_reef' => 'arcopora, cribrochalina, theonella, callyspongia, polycarpa, rhopalaea',
            'creature' => 'anthias, damsel, sweetlips, cryptic sponge shrimp, nudibranch, sea cucumber',
            'latitude' => '0.491139',
            'longitude' => '123.027278',
            'status' => 'terverifikasi'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'Mystic Point',
            'alamat_lokasi' => 'Desa Tanjung keramat Kota Gorontalo',
            'depth' => '3m - 18m',
            'visibility' => '10m - 15m',
            'coral_reef' => 'sarcophyton sp, arcopora, alveopora, stylophora, cribrochalina sp, didemnum',
            'creature' => 'sea cucumber, goby, nudibranch, leaf scorpionfish, cardinalfish',
            'latitude' => '0.493750',
            'longitude' => '123.04444',
            'status' => 'terverifikasi'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'Tjendrawasih barge wreck',
            'alamat_lokasi' => 'Desa Leato Selatan kota Gorontalo',
            'depth' => '8m – 25m',
            'visibility' => '5m – 15m',
            'coral_reef' => 'lobophyton, arcopora, gelliodes, didemnum, comaster',
            'creature' => 'lionfish, stonefish, surgeonfish, cardinalfish, goatfish',
            'latitude' => '0.495472',
            'longitude' => '123.071194',
            'status' => 'terverifikasi'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'Tamboo muck diving',
            'alamat_lokasi' => 'Desa Leato Selatan kota Gorontalo',
            'depth' => '3m – 25m',
            'visibility' => '5m – 15m',
            'coral_reef' => 'alveopora, porites, cirrhipathes, callyspongia sp, gelliodes',
            'creature' => 'ghost pipefish, frogfish, mimic octopus, dragon sea moth, anemone,ambonscorpinfish',
            'latitude' => '0.491694',
            'longitude' => '123.077972',
            'status' => 'terverifikasi'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'Japanese cargo wreck',
            'alamat_lokasi' => 'Desa Leato Selatan kota Gorontalo',
            'depth' => '5m – 52m',
            'visibility' => '25m – 30m',
            'coral_reef' => 'favites, porites, arcopora, spirastrella, tridacna',
            'creature' => 'snapper, turtle, napoleon wrasse, parrotfish, goby, Sarasvati shrimp',
            'latitude' => '0.486139',
            'longitude' => '123.082972',
            'status' => 'terverifikasi'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'Swirling Steps',
            'alamat_lokasi' => 'Desa Botubarani Kabupaten Bone Bolango',
            'depth' => '5m – 40m',
            'visibility' => '10m – 30m',
            'coral_reef' => 'turbinaria, arcopora, gorgonian, seriatopora, millepora sp, clathria, montipora',
            'creature' => 'napoleon wrasse, turtle, hammerhead shark, whitetip shark, triggerfish',
            'latitude' => '0.478056',
            'longitude' => '123.086083',
            'status' => 'terverifikasi'
        ]);
     
        Lokasi::create([
            'nama_lokasi' => 'Kurenai beach',
            'alamat_lokasi' => 'Desa Botubarani Kabupaten Bone Bolango',
            'depth' => '3m – 25m',
            'visibility' => '10m – 30m',
            'coral_reef' => 'triphylozoon sp, heliopore, dendronephthya sp, gorgonian, sinularia',
            'creature' => 'turtle, cuttlefish, snapper, napoleon wrasse, grouper',
            'latitude' => '0.477306',
            'longitude' => '123.089639',
            'status' => 'terverifikasi'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'Whale Shark Area',
            'alamat_lokasi' => 'Desa Botubarani Kabupaten Bone Bolango',
            'depth' => '5m – 30m',
            'visibility' => '5m – 15m',
            'coral_reef' => 'arcopora, sarcophyton sp, Xestospongia sp, millepora sp, cribrochalina sp',
            'creature' => 'whale shark, napoleon wrasse, triggerfish, parrotfish, remora fish',
            'latitude' => '0.4740581',
            'longitude' => '123.0998722',
            'status' => 'terverifikasi'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'Sunken island',
            'alamat_lokasi' => 'Desa Molotabu Kabupaten Bone Bolango',
            'depth' => '8m – 30m',
            'visibility' => '10m – 15m',
            'coral_reef' => 'sarcophyton sp, sinularia, turbinaria, platygyra, cribrochalina, agaricidae',
            'creature' => 'grouper, pufferfish, cardinalfish, lionfish, goby, anthias',
            'latitude' => '0.441278',
            'longitude' => '123.129611',
            'status' => 'terverifikasi'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'Sand castle muck diving',
            'alamat_lokasi' => 'Desa Molotabu Kabupaten Bone Bolango',
            'depth' => '2m – 18m',
            'visibility' => '5m – 10m',
            'coral_reef' => 'placortis, clathria, udotea sp, callyspongia sp',
            'creature' => 'lionfish, nudibranch, blenny, tozeuma shrimp, garden eels, pteroidessp',
            'latitude' => '0.441833',
            'longitude' => '123.130722',
            'status' => 'terverifikasi'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'Shadowlands',
            'alamat_lokasi' => 'Desa Oluhuta Kabupaten Bone Bolango',
            'depth' => '3m – 30m',
            'visibility' => '10m – 25m',
            'coral_reef' => 'gorgonian, siphonogorgia sp, seleronephthya sp, didemnum, acabaria sp',
            'creature' => 'boxer crab, pygmy seahorse, harlequin shrimp, nudibranch, mantis shrimp, grouper',
            'latitude' => '0.422417',
            'longitude' => '123.130722',
            'status' => 'terverifikasi'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'Oluhuta beach',
            'alamat_lokasi' => 'Desa Oluhuta Kabupaten Bone Bolango',
            'depth' => '3m – 30m',
            'visibility' => '10m – 25m',
            'coral_reef' => 'gorgonian, siphonogorgia sp, seleronephthya sp, didemnum, acabaria sp',
            'creature' => 'boxer crab, pygmy seahorse, harlequin shrimp, nudibranch, mantis shrimp, grouper',
            'latitude' => '0.420056',
            'longitude' => '123.145000',
            'status' => 'terverifikasi'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'Honeycomb West',
            'alamat_lokasi' => 'Desa Oluhuta Kabupaten Bone Bolango',
            'depth' => '3m – 30m',
            'visibility' => '10m – 25m',
            'coral_reef' => 'gorgonian, siphonogorgia sp, seleronephthya sp, didemnum, acabaria sp',
            'creature' => 'boxer crab, pygmy seahorse, harlequin shrimp, nudibranch, mantis shrimp, grouper',
            'latitude' => '0.417194',
            'longitude' => '123.143944',
            'status' => 'terverifikasi'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'Honeycomb east',
            'alamat_lokasi' => 'Desa Olele Kabupaten Bone Bolango',
            'depth' => '3m – 30m',
            'visibility' => '10m – 25m',
            'coral_reef' => 'gorgonian, siphonogorgia sp, seleronephthya sp, didemnum, acabaria sp',
            'creature' => 'boxer crab, pygmy seahorse, harlequin shrimp, nudibranch, mantis shrimp, grouper',
            'latitude' => '0.414556',
            'longitude' => '123.146083',
            'status' => 'terverifikasi'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'Jin Caves',
            'alamat_lokasi' => 'Desa Olele Kabupaten Bone Bolango',
            'depth' => '3m – 30m',
            'visibility' => '10m – 25m',
            'coral_reef' => 'gorgonian, siphonogorgia sp, seleronephthya sp, didemnum, acabaria sp',
            'creature' => 'boxer crab, pygmy seahorse, harlequin shrimp, nudibranch, mantis shrimp, grouper',
            'latitude' => '0.405917',
            'longitude' => '123.155194',
            'status' => 'terverifikasi'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'Fallen rock',
            'alamat_lokasi' => 'Desa Olele Kabupaten Bone Bolango',
            'depth' => '3m – 30m',
            'visibility' => '10m – 25m',
            'coral_reef' => 'gorgonian, siphonogorgia sp, seleronephthya sp, didemnum, acabaria sp',
            'creature' => 'boxer crab, pygmy seahorse, harlequin shrimp, nudibranch, mantis shrimp, grouper',
            'latitude' => '0.402111',
            'longitude' => '123.157556',
            'status' => 'terverifikasi'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'PuloCinta',
            'alamat_lokasi' => 'Kabupaten Boalemo',
            'depth' => '3m – 30m',
            'visibility' => '10m – 25m',
            'coral_reef' => 'gorgonian, siphonogorgia sp, seleronephthya sp, didemnum, acabaria sp',
            'creature' => 'boxer crab, pygmy seahorse, harlequin shrimp, nudibranch, mantis shrimp, grouper',
            'latitude' => '0.4515582',
            'longitude' => '122.2909267',
            'status' => 'terverifikasi'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'Litobohu',
            'alamat_lokasi' => 'Kabupaten Gorontalo Utara',
            'depth' => '3m – 30m',
            'visibility' => '10m – 25m',
            'coral_reef' => 'gorgonian, siphonogorgia sp, seleronephthya sp, didemnum, acabaria sp',
            'creature' => 'boxer crab, pygmy seahorse, harlequin shrimp, nudibranch, mantis shrimp, grouper',
            'latitude' => '0.912163',
            'longitude' => '122.741411',
            'status' => 'terverifikasi'
        ]);

        // \App\Models\User::factory(10)->create();
        

        User::create([
            'username' => 'admin12345',
            'password' => bcrypt('admin12345'),
            'role' => 'SuperAdmin'
        ]);

        Admin::create([
            'user_id' => '1',
            'nama' => 'mohamad ilham akbar',
            'jenis_kelamin' => 'laki-laki',
            'alamat' => 'jl. Tribrata',
            'telpon' => '082271599875',
            'foto' => '',
        ]);

        Ulasan::factory(20)->create();
    }
}
