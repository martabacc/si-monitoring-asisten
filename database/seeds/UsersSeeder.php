<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('privileges')->insert([[
            'role' => 'admin',
            ],[
            'role' => 'umum',
            ],
        ]);

        DB::table('users')->insert([[
            'name' => 'admin',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'privilege_id' => 1,
            ],[
            'name' => 'teacher',
            'username' => 'teacher',
            'password' => bcrypt('teacher'),
            'privilege_id' => 2,
            ],[
            'name' => 'assistant',
            'username' => 'assistant',
            'password' => bcrypt('assistant'),
            'privilege_id' => 2,
            ],[
            'name' => 'student',
            'username' => 'student',
            'password' => bcrypt('student'),
            'privilege_id' => 2,
            ],
        ]);

        DB::table('teachers')->insert([[
            'user_id' => 1,
            ],[
            'user_id' => 2,
            ],
        ]);

        DB::table('assistants')->insert([[
            'user_id' => 1,
            ],[
            'user_id' => 3,
            ],
        ]);

        DB::table('students')->insert([[
            'user_id' => 1,
            ],[
            'user_id' => 4,
            ],
        ]);
    }
}
