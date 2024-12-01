<?php
namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\User;
use App\Models\Post;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
    */
    public function run(): void
    {
        // Students
        // 1
        User::create([
            'name' => 'Andre',
            'surname' => 'Porfovorovs',
            'phone_number' => '10200300',
            'email' => 'andre@gmail.com',
            'password' => '123456789',
        ]);


        // Teachers
        // 2
        User::create([
            'name' => 'Mārīte',
            'surname' => 'Bizene',
            'phone_number' => '33555666',
            'email' => 'marite@inbox.lv',
            'role' => 'teacher',
            'password' => '123456789',
        ]);
        Teacher::create([ // id=1
            'user_id' => '2',
        ]);
        Post::create([
            'title' => 'I will help with primary mathimatic (Mārīte)',
            'text' => 'Ikdienas prakse liecina, ka kurss uz sociāli orientētu nacionālu projektu lielā mērā nosaka jaunu priekšlikumu radīšanu.',
            'teacher_id' => '1',
            'category' => 'Mathimatics',
            'level' => '1-3',
            'cost' => '8',
        ]);

        // 3
        User::create([
            'name' => 'John',
            'surname' => 'Doe',
            'phone_number' => '12345678',
            'email' => 'john.doe@example.com',
            'role' => 'teacher',
            'password' => 'password123',
        ]);
        Teacher::create([ // id=2
            'user_id' => '3',
        ]);
        Post::create([
            'title' => 'Can study how use all Office360 programmes (John)',
            'text' => 'Practical experience shows that the course for a socially-oriented national project allows the most important tasks to be completed in developing key components of the planned update. Likewise, consultation with IT professionals creates the prerequisites for qualitatively new steps in forms of influence.',
            'teacher_id' => '2',
            'category' => 'IT',
            'level' => '4-6',
            'cost' => '10',
        ]);

        // 4
        User::create([
            'name' => 'Jane',
            'surname' => 'Smith',
            // 'phone_number' => '23456789',
            'email' => 'jane.smith@example.com',
            'role' => 'teacher',
            'password' => 'securepassword',
        ]);
        Teacher::create([ // id=3
            'user_id' => '4',
        ]);
        Post::create([
            'title' => 'Es varu palidzēt ar Ķimiju (Jane)',
            'text' => 'Ņemot vērā galvenos uzvedības scenārijus, kvalitatīvs nākotnes projekta prototips ir kvalitatīvi jauns profesionālās kopienas progresa posms. Nanotehnoloģijas, kas ir tikai daļa no kopējā attēla, cenšoties izspiest tradicionālo ražošanu, tiek aplūkotas tikai mārketinga un finansiālo priekšnoteikumu ziņā. Cenšoties uzlabot lietotāju pieredzi, mēs pietrūkst, ka trešās pasaules valstis, kas aktīvi attīstās, līdz pat šai dienai paliek liberāļu rīcībā, kuri vēlas tikt pakļauti virknei neatkarīgu pētījumu. Un tiešie tehniskā progresa dalībnieki mūs aicina uz jauniem sasniegumiem, kas savukārt jāsajauc ar neunikāliem datiem līdz pilnīgai neatpazīstamībai, tāpēc to nederības statuss paaugstinās.',
            'teacher_id' => '3',
            'category' => 'Chemestry',
            'level' => '4-6',
            'cost' => '15',
        ]);
        
        // 5
        User::create([
            'name' => 'Michael',
            'surname' => 'Johnson',
            'phone_number' => '34567890',
            'email' => 'michael.johnson@example.com',
            'role' => 'teacher',
            'password' => 'mypassword',
        ]);
        Teacher::create([ // id=4
            'user_id' => '5',
        ]);
        Post::create([
            'title' => 'I can prepere you for biology exam (Michael)',
            'text' => 'Diverse and rich experience tells us that long-term planning entails the process of implementing and modernizing the personnel training system that meets current needs. Our business is not as straightforward as it may seem: consultation with a broad asset predetermines high demand for forms of influence. The task of the organization, especially the deep level of immersion, is an interesting experiment to test further development directions. First of all, socio-economic development allows you to fulfill important tasks in developing clustering efforts.',
            'teacher_id' => '4',
            'category' => 'Biology',
            'level' => '10-12',
            'cost' => '20',
        ]);

        //6
        User::create([
            'name' => 'Emily',
            'surname' => 'Davis',
            'phone_number' => '45678901',
            'email' => 'emily.davis@example.com',
            'role' => 'teacher',
            'password' => 'emilyspass',
        ]);
        Teacher::create([ // id=5
            'user_id' => '6',
        ]);
        Post::create([
            'title' => 'Varu palidzēt ar elemntaru biologiju (Emily)',
            'text' => 'Zinātne par dzīvajām būtnēm un to mijiedarbību ar vidi. Pēta visus dzīves aspektus, jo īpaši: dzīvo organismu uzbūvi, darbību, augšanu, izcelsmi, evolūciju un izplatību uz Zemes.',
            'teacher_id' => '5',
            'category' => 'Biology',
            'level' => '7-9',
            'cost' => '18',
        ]);

        Post::create([
            'title' => 'Varu palidzēt ar elemntaru ķimiju (Emily)',
            'text' => 'Ikdienas prakse rāda, ka personāla apmācības apjoms un vieta veicina atbilstošo aktivizācijas nosacījumu atbilstību. Organizācijas uzdevums, īpaši pastāvīga kvantitatīvā izaugsme un darbības apjoms, liek mums sistemātiski analizēt liela mēroga izmaiņu sistēmu vairākos parametros.',
            'teacher_id' => '5',
            'category' => 'Chemestry',
            'level' => '4-6',
            'cost' => '13',
        ]);



        // People Creation       
        User::create([
            'name' => 'Chris',
            'surname' => 'Brown',
            'phone_number' => '56789012',
            'email' => 'chris.brown@example.com',
            'password' => 'chrispassword',
        ]);
        
        User::create([
            'name' => 'Jessica',
            'surname' => 'Williams',
            'phone_number' => '67890123',
            'email' => 'jessica.williams@example.com',
            'password' => 'jesspassword',
        ]);
        
        User::create([
            'name' => 'David',
            'surname' => 'Miller',
            'phone_number' => '78901234',
            'email' => 'david.miller@example.com',
            'password' => 'davidspass',
        ]);
        
        User::create([
            'name' => 'Sarah',
            'surname' => 'Wilson',
            'phone_number' => '89012345',
            'email' => 'sarah.wilson@example.com',
            'password' => 'sarahpassword',
        ]);
        
        User::create([
            'name' => 'James',
            'surname' => 'Taylor',
            'phone_number' => '90123456',
            'email' => 'james.taylor@example.com',
            'password' => 'jamestaylorpass',
        ]);
        
        User::create([
            'name' => 'Laura',
            'surname' => 'Anderson',
            'phone_number' => '01234567',
            'email' => 'laura.anderson@example.com',
            'password' => 'lauraspass',
        ]);


        // Admin
        User::create([
            'name' => 'Admin',
            'surname' => 'Admin',
            'phone_number' => '11111111',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => '123456789',
        ]);

    }
}
