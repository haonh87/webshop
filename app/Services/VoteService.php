<?php

namespace App\Services;

use App\Models\Vote;

class VoteService
{
    private $voteModel;

    /**
     * VoteService constructor.
     * @param Vote $voteModel
     */
    public function __construct(Vote $voteModel)
    {
        $this->voteModel = $voteModel;
    }
}