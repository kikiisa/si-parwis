<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User as pengguna;
use App\Models\WisataCategory;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = new pengguna();
        $users->uuid = 'T3119051';
        $users->name = 'Mohamad Rizky Isa';
        $users->email = 'kikiisa89@gmail.com';
        $users->role = 'admin';
        $users->phone = '082393508734';
        $users->password = bcrypt('123');
        $users->save();

        WisataCategory::create([
            'uuid' => Uuid::uuid4()->toString(),
            'nama' => 'bahari',
            'slug' => Str::slug('bahari'),
            'deskripsi' => 'bahari'
        ]);
        WisataCategory::create([
            'uuid' => Uuid::uuid4()->toString(),
            'nama' => 'alam',
            'slug' => Str::slug('alam'),
            'deskripsi' => 'alam'
        ]);
        WisataCategory::create([
            'uuid' => Uuid::uuid4()->toString(),
            'nama' => 'hotel',
            'slug' => Str::slug('hotel'),
            'deskripsi' => 'hotel'
        ]);
        WisataCategory::create([
            'uuid' => Uuid::uuid4()->toString(),
            'nama' => 'budaya',
            'slug' => Str::slug('budaya'),
            'deskripsi' => 'budaya'
        ]);
    }
}
