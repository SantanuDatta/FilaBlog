<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Sequence;

class RoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Role::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            Role::factory(3)
            ->state(new Sequence(
                ['name' => 'admin', 'description' => 'Admin Privilege'],
                ['name' => 'staff', 'description' => 'Staff Privilege'],
                ['name' => 'borrower', 'description' => 'Borrower Privilege'],
            ))->create()
        ];
    }
}
