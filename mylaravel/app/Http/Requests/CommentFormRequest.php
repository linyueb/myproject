<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Response;
class CommentFormRequest extends FormRequest
{
  public function rules()
  {
    return [
      'content' => 'required',
      'name' => 'required'
    ];
  }



}