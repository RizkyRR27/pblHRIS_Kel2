<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Letter;
<<<<<<< HEAD
use App\Http\Resources\LetterResource;
use App\Http\Resources\LetterCollection;
use Illuminate\Http\Request;

class LetterController extends Controller
{
    public function index()
    {
        $letters = Letter::with('letterFormat')->active()->paginate(10);
        return new LetterCollection($letters);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'letter_format_id' => 'required|uuid|exists:letter_formats,id',
            'user_id' => 'nullable|uuid', // nullable karena sementara
            'name' => 'required|string|max:100',
        ]);

        $letter = Letter::create($validated);
        return new LetterResource($letter);
    }

    public function show($id)
    {
        $letter = Letter::with('letterFormat')->active()->findOrFail($id);
        return new LetterResource($letter);
    }

    public function update(Request $request, $id)
    {
        $letter = Letter::active()->findOrFail($id);
        $validated = $request->validate([
            'letter_format_id' => 'sometimes|uuid|exists:letter_formats,id',
            'user_id' => 'sometimes|nullable|uuid',
            'name' => 'sometimes|string|max:100',
        ]);

        $letter->update($validated);
        return new LetterResource($letter);
    }

    public function destroy($id)
    {
        $letter = Letter::findOrFail($id);
        $letter->deleted_at = now()->format('Y-m-d H:i:s');
        $letter->save();
        return response()->json(['message' => 'deleted']);
=======
use App\Models\LetterFormat;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Storage;

class LetterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'jenis_surat' => 'required|integer',
            'tanggal' => 'required|date',
        ]);

        // Ambil format template
        $format = LetterFormat::find($request->jenis_surat);

        if (!$format) {
            return response()->json(['error' => 'Format tidak ditemukan'], 404);
        }

        // Ambil template HTML
        $html = $format->content;

        // Replace placeholders
        $html = str_replace('{{nama}}', $request->nama, $html);
        $html = str_replace('{{tanggal}}', $request->tanggal, $html);

        // Generate PDF
        $pdf = PDF::loadHTML($html);

        // Nama file
        $fileName = 'surat_' . time() . '.pdf';

        // Simpan PDF ke storage/app/public/surat/
        Storage::put("public/surat/$fileName", $pdf->output());

        // Simpan data di database
        $letter = Letter::create([
            'letter_format_id' => $format->id,
            'employee_id' => 1, // nanti diganti user login
            'name' => $request->nama,
            'status' => 1,
            'file_path' => "surat/$fileName"
        ]);

        return response()->json([
            'success' => true,
            'data' => [
                'letter' => $letter,
                'file_url' => asset("storage/surat/$fileName"),
                'rendered_html' => $html,
            ]
        ]);
>>>>>>> 3e544c07ad744a462140f624dcff9c15f3812863
    }
}
