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

    public function updateVote($dataVote)
    {
        try {
            return $this->voteModel->fill($dataVote)->save();
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getVote($productId)
    {
        return $this->voteModel->where('product_id', $productId)
            ->where('actived', 1)->with('user')->orderBy('created_at', 'DESC')->get();
    }
}