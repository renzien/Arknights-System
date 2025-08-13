<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // <-- Gunakan File Facade
use Illuminate\Support\Facades\Log;

class OperatorController extends Controller
{
    public function show($charId)
    {
        try {
            // UPDATED: Tentukan path ke file JSON lokal kita
            $path = storage_path('app/data/character_table.json');

            // Cek apakah file ada untuk mencegah error
            if (!File::exists($path)) {
                abort(500, 'Local data file not found at storage/app/data/character_table.json');
            }

            // Baca konten file dan ubah menjadi array
            $jsonContent = File::get($path);
            $allCharacters = json_decode($jsonContent, true);

            // Cek apakah operator ada di data lokal
            if (!isset($allCharacters[$charId])) {
                abort(404, 'Operator not found in the local data file.');
            }

            $operator = $allCharacters[$charId];

            // Tambahkan data 'display' yang di-hardcode
            $operator['display'] = [
                'illustrator' => 'NORIZC',
                'birthdate' => 'November 3rd',
                'combat_skill' => 'Excellent',
                'arts_adaptability' => 'Flawed'
            ];

            return view('operator.detail', ['operator' => $operator]);

        } catch (\Exception $e) {
            Log::error("Error processing local operator data: " . $e->getMessage());
            abort(500, 'An error occurred while processing operator data.');
        }
    }
}
