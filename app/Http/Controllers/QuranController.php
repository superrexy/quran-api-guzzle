<?php

namespace App\Http\Controllers;

use App\Models\Quran;
use Illuminate\Http\Request;

class QuranController extends Controller
{
    public function index()
    {
        $quran = Quran::with('audio')->get();
        return response()->json($quran);
    }

    public function fetch()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://equran.id/api/v2/surat');
        $quran = json_decode($response->getBody()->getContents());
        foreach ($quran->data as $item) {
            $quran = new Quran();
            $quran->nomor = $item->nomor;
            $quran->nama = $item->nama;
            $quran->nama_latin = $item->namaLatin;
            $quran->jumlah_ayat = $item->jumlahAyat;
            $quran->tempat_turun = $item->tempatTurun;
            $quran->arti = $item->arti;
            $quran->deskripsi = $item->deskripsi;

            $quran->save();

            foreach ($item->audioFull as $audio) {
                $quran->audio()->create([
                    'audio' => $audio,
                    'quran_id' => $quran->id,
                ]);
            }
        }

        return response()->json("SUCCESS_FETCH_DATA");
    }
}
