<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TokenResource extends JsonResource
{
    protected $user;

    public function __construct($token, $user)
    {
        parent::__construct($token);
        $this->user = $user;
    }

    public function toArray($request)
    {
        return [
            'data' => [
                'type' => 'tokens',
                'id' => (string) $this->user->id,
                'attributes' => [
                    'token' => $this->resource,
                    'token_type' => 'Bearer',
                ],
                'relationships' => [
                    'user' => [
                        'data' => [
                            'type' => 'users',
                            'id' => (string) $this->user->id,
                        ],
                    ],
                ],
            ],
        ];
    }
}
