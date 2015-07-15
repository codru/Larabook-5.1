<?php

namespace Larabook\Users;

use App\Http\Requests\Request;

class UnfollowUserRequest extends Request
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
        return [
            'userIdToUnfollow' => 'required|exists:users,id',
        ];
    }
}
