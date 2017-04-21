<?php
namespace LACC\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Category extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [ 'name', 'color', 'url' ];

    public function rules()
    {
        $idCategory = ( \Request::segment( 3 ) ) ? : null;

        return [
            'name'  => 'required|min:5|max:100|unique:categories,name,' . $idCategory,
            'color' => 'required|unique:categories,color,' . $idCategory,
        ];
    }
}
