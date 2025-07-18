<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrudPermission  extends Model
{
    use HasFactory;
    protected $table = 'crud_permissions';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = ['permission_id', 'name', 'can_add', 'can_modify', 'can_delete', 'can_view', 'can_print', 'can_bulk_delete', 'can_bulk_print', 'can_import'];

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }
}
