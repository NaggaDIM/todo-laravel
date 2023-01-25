<?php

namespace App\Models;

use App\Enums\Tasks\Status;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read integer id
 * @property Status status
 * @property string description
 * @property-read null|Carbon created_at
 * @property-read null|Carbon updated_at
 */
class Task extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'description'];
    protected $casts = ['status' => Status::class];
}
