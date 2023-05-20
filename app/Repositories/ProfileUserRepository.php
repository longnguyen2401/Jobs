<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;

class ProfileUserRepository extends BaseRepository
{
    /**
     * The attributes prefix for each model.
     * 
     * @var string
     */
    protected string $prefix = 'ProfileUser';
}