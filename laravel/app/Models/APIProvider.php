<?php

namespace App\Models;

use App\Models\Interfaces\EntityInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class APIProvider
 * @package App\Models
 */
class APIProvider extends Model implements EntityInterface
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'site',
        'api_url',
        'class_control',
        'status'
    ];

    /**
     * Each new record starts being 1
     * Status can be
     * 1 - Enable
     * 0 - Disable
     * 2 - Deprecated
     * @var array
     */
    protected $attributes = [
        'status' => 1
    ];

    /**
     * @param null $id
     *
     * @return array
     */
    public function rules($id = null): array
    {
        $id        = empty($id) ? "" : ",".$id;
        $sometimes = empty($id) ? "" : "sometimes";

        return [
            'name'          => $sometimes.'|required|string|min:5|max:100',
            'site'          => $sometimes.'|url|max:100',
            'api_url'       => $sometimes.'|url|max:255',
            'class_control' => $sometimes.'|string|min:10|max:255',
        ];
    }
}
