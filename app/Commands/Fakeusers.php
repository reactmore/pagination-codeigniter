<?php

namespace App\Commands;

use App\Models\UsersModel;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use \Faker\Factory;

class Fakeusers extends BaseCommand
{
    /**
     * The Command's Group
     *
     * @var string
     */
    protected $group = 'CustomCommand';

    /**
     * The Command's Name
     *
     * @var string
     */
    protected $name = 'fake:users';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = 'It will create 50 fake users and save into database';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = 'command:name [arguments] [options]';

    /**
     * The Command's Arguments
     *
     * @var array
     */
    protected $arguments = [];

    /**
     * The Command's Options
     *
     * @var array
     */
    protected $options = [];

    /**
     * Actually execute a command.
     *
     * @param array $params
     */
    public function run(array $params)
    {
        $user_obj = new UsersModel();

        $data = [];

        for ($i = 0; $i < 50; $i++) {

            $data[] = $this->generateFakeUser();
        }

        $user_obj->insertBatch($data);

        CLI::write("50 Fake Users created successfully");
    }

    public function generateFakeUser()
    {
        $faker = Factory::create();

        return [
            "username" => $faker->username(),
            "address" => $faker->address(),
        ];
    }
}
