<?php

namespace App\Exceptions;

use Exception;

class NotFoundException extends Exception
{
    protected $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function render()
    {
        return response()->json([
            'message' => "Data {$this->message} tidak ditemukan"
        ], 404);
    }
}
