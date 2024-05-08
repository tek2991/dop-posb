<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AllUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Sri Binayak Bhattacharjee', 'email' => 'haflongso@indiapost.gov.in', 'sub_division' => 'Haflong Sub Division'],
            ['name' => 'Sri Anirban Dey', 'email' => 'sdohailakandi.as@indiapost.gov.in', 'sub_division' => 'Hailakandi Sub Division'],
            ['name' => 'Sri Ajoy Barman', 'email' => 'sdokarimganj.as@indiapost.gov.in', 'sub_division' => 'Karimganj Sub Division'],
            ['name' => 'Smt. Bandana Deb', 'email' => 'sdopatharkandi.as@indiapost.gov.in', 'sub_division' => 'Patherkandi Sub Division'],
            ['name' => 'Sri Samir Das', 'email' => 'sdosilcharnorth.as@indiapost.gov.in', 'sub_division' => 'Silchar North Sub Division'],
            ['name' => 'Smt. Rupali Das Talukdar', 'email' => 'sdosilcharsouth.as@indiapost.gov.in', 'sub_division' => 'Silchar South Sub Division'],
            ['name' => 'Sri Anirban Dey', 'email' => 'sdosilcharwest.as@indiapost.gov.in', 'sub_division' => 'Silchar West Sub Division'],
            ['name' => 'Dhiraj Chavan', 'email' => 'dhirajvc9@gmail.com', 'sub_division' => 'Tezpur Sub Division'],
            ['name' => 'Pankaj Deuri', 'email' => 'sdichariali@gmail.com', 'sub_division' => 'Chariali Sub Division'],
            ['name' => 'Binanda Choudhury', 'email' => 'binandac@gmail.com', 'sub_division' => 'Dhekiajuli Sub Division'],
            ['name' => 'Kumud Ch Kakati', 'email' => 'kakatikumud@gmail.com', 'sub_division' => 'Mangaldoi Sub Division'],
            ['name' => 'Sonia', 'email' => 'sdodibrugarh.as@indiapost.gov.in', 'sub_division' => 'Dibrugarh Sub Division'],
            ['name' => 'Prasanna Kalita', 'email' => 'prasana.kalita.pk@gmail.com', 'sub_division' => 'Naharkatia Sub Division'],
            ['name' => 'Pabitra Pawan Bezbaruah', 'email' => 'ipdhemaji@gmail.com', 'sub_division' => 'Dhemaji Sub Division'],
            ['name' => 'Aswini Boro', 'email' => 'aswini_baro@yahoo.com', 'sub_division' => 'North Lakhimpur East Sub Division'],
            ['name' => 'Parag Baruah', 'email' => 'parx00@gmail.com', 'sub_division' => 'North Lakhimpur West Sub Division'],
            ['name' => 'Debabrat Khanikar', 'email' => 'aspogoalpara@gmail.com', 'sub_division' => 'Goalpara Sub Division'],
            ['name' => 'Dhan Nath', 'email' => 'dhannath123@gmail.com', 'sub_division' => 'Dhubri Sub Division'],
            ['name' => 'Victor Narzinary', 'email' => 'narjinary.victor@gmail.com', 'sub_division' => 'Kokrajhar Sub Division'],
            ['name' => 'Rahul Jajra', 'email' => 'rahuljajra02@gmail.com', 'sub_division' => 'Bongaigaon Sub Division'],
            ['name' => ' Sri Motilal Sah', 'email' => 'sdoghyeast.as@indiapost.gov.in', 'sub_division' => 'Guwahati East Sub Division'],
            ['name' => 'Sri Pappulal Meena', 'email' => 'sdoghywest.as@indiapost.gov.in', 'sub_division' => 'Guwahati West Sub Division'],
            ['name' => 'Sri Hemanta Barman', 'email' => 'sdobijoynagar.as@indiapost.gov.in', 'sub_division' => 'Bijoynagar Sub Division'],
            ['name' => 'KAIYUM AZAD', 'email' => 'kaiyumzad5@gmail.com', 'sub_division' => 'Nagaon East Sub Division'],
            ['name' => 'RAHUL AHMED TALUKDAR', 'email' => 'rahul.ahmed0@gmail.com', 'sub_division' => 'Nagaon West Sub Division'],
            ['name' => 'JOYSING DAS', 'email' => 'joysingdasipo@gmail.com', 'sub_division' => 'Morigaon Sub Division'],
            ['name' => 'NILAKANTHA MANDAL', 'email' => 'nil.mandal34@gmail.com', 'sub_division' => 'Hojai Sub Division'],
            ['name' => 'DEBABRATA BORA', 'email' => 'debabratabora13@gmail.com', 'sub_division' => 'Diphu Sub Division'],
            ['name' => 'Biju Kr Sarma', 'email' => 'bijusarma270@gmail.com', 'sub_division' => 'Nalbari East Sub Division'],
            ['name' => 'Ratul Sarmah, ASP', 'email' => 'ratul.sarmah@indiapost.gov.in', 'sub_division' => 'Nalbari West Sub Division'],
            ['name' => 'Chandan Baruah', 'email' => 'baruahchandan14@gmail.com', 'sub_division' => 'Pathsala Sub Division'],
            ['name' => 'Gitumani Barman', 'email' => 'gbarmanip123@gmail.com', 'sub_division' => 'Barpeta Sub Division'],
            ['name' => 'Sri Khagen Bakatial', 'email' => 'anitakhagen075@gmail.com', 'sub_division' => 'Jorhat South Sub Division'],
            ['name' => 'Sri Safiqul Islam', 'email' => 'islamsafi2011@gmail.com', 'sub_division' => 'Jorhat North Sub Division'],
            ['name' => 'Sri Khanindra Gogoi', 'email' => 'IPMARIANISUBDIVISION@GMAIL.COM', 'sub_division' => 'Mariani Sub Division'],
            ['name' => 'Sri Dhniram Ghatowal', 'email' => 'dhanirocks8@gmail.com', 'sub_division' => 'Golaghat Sub Division'],
            ['name' => 'Sri Khagen Bakatial (looking after Sivasagar Sub division)', 'email' => 'anitakhagen075_2@gmail.com', 'sub_division' => 'Sibsagar Sub Division'],
            ['name' => 'Sri Chandan Dey', 'email' => 'chandandeydop@gmail.com', 'sub_division' => 'Simaluguri Sub Division'],
            ['name' => 'Sri Dipankar Borah', 'email' => 'dipankarborah90@gmail.com', 'sub_division' => 'Doomdooma Sub Division'],
            ['name' => 'Smt Dulari Meena ', 'email' => 'meenadulari@gmail.com', 'sub_division' => 'Tinsukia Sub Division'],
        ];

        $user_role_id = \App\Models\Role::where('name', 'user')->first()->id;
        $common_pwd = bcrypt('Dop@781xx1');

        foreach ($users as $user) {
            $um = \App\Models\User::factory()->create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $common_pwd,
            ]);

            $um->update(['role_id' => $user_role_id]);
        }
    }
}
