<?php

namespace App;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;

class DriversLicense extends Model
{
    use BelongsToUser;
    # TODO: Include information about what type of drivers licences (i.e. types of vehicles allowed)

    protected $fillable = [
        'license_number'
    ];
}
