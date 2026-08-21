<?php 

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;


class UserRepository implements UserRepositoryInterface
{   
    public function getAll(
        ?string $search,
        ?int $limit,
        bool $execute)
    {
        $query = User::where(function ($query) use ($search) {
            // jika ada parameter search, akan melakukan search yang didefinisikan di model User
            if ($search) {
                $query->search($search);
            }
        });


        if ($limit) {
            //mengambil data berdasarkan limit
            $query->take($limit);
        }


        if ($execute) {
            return $query->get();
        }

        return $query;
    }

    
    public function getAllPaginated(
        ?string $search,
        ?int $rowPerPage
    )
    {
        $query = $this->getAll(
            $search,
            $rowPerPage,
            false
        );
    }
}