<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
//        $this->call(AdminsTableSeeder::class);
        $this->command->info('Users table seeding ...');
        $this->call(UsersTableSeeder::class);
        $this->command->info('Users table seeded!');

        $this->command->info('Package table seeding ...');
        $this->call(PackageTableSeeder::class);
        $this->command->info('Package table seeded!');

        $this->command->info('Booking DateTimes seeding ...');
        $this->call(BookingDateTimeTableSeeder::class);
        $this->command->info('Booking DateTimes seeded!');

        $this->command->info('Customers seeding ...');
        $this->call(CustomerSeeder::class);
        $this->command->info('Customers seeded!');

        $this->command->info('Appointments seeding ...');
        $this->call(AppointmentSeeder::class);
        $this->command->info('Appointments seeded!');

        $this->command->info('Admins seeding ...');
        $this->call(AdminSeeder::class);
        $this->command->info('Admins seeded!');

        $this->command->info('Time intervals seeding ...');
        $this->call(TimeIntervalTableSeeder::class);
        $this->command->info('Time intervals seeded!');

        $this->command->info('Configurations seeding ...');
        $this->call(ConfigurationTableSeeder::class);
        $this->command->info('Configurations seeded!');

        Eloquent::unguard();
    }

}
