<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // $admin = new Admin();
    // $admin->name = "Admin";
    // $admin->email = "admin@gmail.com";
    // $admin->password = bcrypt("password");
    // $admin->save();

    $admin = Admin::find(1);
    $admin->assignRole("Quản trị viên hệ thống");
  }
}
