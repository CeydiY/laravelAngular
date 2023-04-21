<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'name' => $this->name,
            'age' => $this->age,
            'address' => $this->address,
            'gender' => $this->gender,
            'country' => $this->country,
            'birthdate' => $this->birthdate,
            'username' => $this->username,
            'email' => $this->email,
            'password' => $this->password,
        ];
        //return parent::toArray($request);
    }

}
