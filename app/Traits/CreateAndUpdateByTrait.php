<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait CreateAndUpdateByTrait
{
    public function setCreatedBy(User $user)
    {
        $this->userCreate()->associate($user);
        return $this;
    }

    public function setUpdatedBy(User $user)
    {
        $this->userUpdate()->associate($user);
        return $this;
    }

    /**
     * Set relation created_by to users
     *
     * @return BelongsTo
     */
    public function userCreate():BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    /**
     * Set relation updated_by to users
     *
     * @return BelongsTo
     */
    public function userUpdate():BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}
