<?php

namespace LACC\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddCpfRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $cpf = preg_replace( "/[^0-9]/", "", $this->get( 'cpf' ) );

        $this->replace( [
            'cpf' => $cpf
        ] );

        return [
            'cpf' => [
                'required',
                'cpf',  //@seed /path/app/Providers/AppServiceProvider.php - method boot()
                Rule::unique( 'users', 'cpf' )
                    ->ignore( $this->user( 'api' )->id )
            ]
        ];
    }
}
