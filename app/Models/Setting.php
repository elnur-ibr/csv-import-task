<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Setting
 *
 * @property int $id
 * @property string $database_name
 * @property string $table_name
 * @property array $columns
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $label
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereColumns($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereDatabaseName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTableName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Setting extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'database_name',
        'table_name',
        'columns'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'columns' => 'array'
    ];


    /**
     * @return string
     */
    public function getLabelAttribute(): string
    {
        return ucfirst($this->database_name)
            . ':'
            . ucfirst($this->table_name);
    }

    public function getExpectedColumnsAttribute()
    {
        $columns = [];
        foreach($this->columns as $key => $column) {
            $columns [$column['order']] = $key;
        }
        ksort($columns);

        return $columns;
    }
}
