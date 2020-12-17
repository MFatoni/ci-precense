<?php

namespace App\Database\Seeds;

class DataUserSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $this->db->query("
        INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
        (1, 'admin@email.com', 'Admin', '$2y$10$1W.NwhRqU3XBJka.2C.ZFOHOhVUeH9kmnO2XIZIkSnpNk7ADNP9Ee', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2020-12-16 17:59:36', '2020-12-16 17:59:36', NULL);
        ");
    }
}
