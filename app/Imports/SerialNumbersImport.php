<?php

namespace App\Imports;

use App\Models\SerialNumber;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Contracts\Queue\ShouldQueue;

class SerialNumbersImport implements ToModel, WithChunkReading, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SerialNumber([
            'batch_id'     => $row[0],
            'code'    => $row[1],
        ]);
    }

    public function chunkSize(): int
    {
        return 1000; // Process in chunks of 1000
    }

    public function rules(): array
    {
        return [
            '0' => 'required|string', // batch_id rules
            '1' => 'required|string', // code rules
        ];
    }

    public function customValidationMessages()
    {
        return [
            '0.required' => 'Batch ID is required.',
            '1.required' => 'Code is required.',
        ];
    }
}
