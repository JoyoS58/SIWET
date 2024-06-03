<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SAWController extends Controller
{
    public function index() {
        // Data kriteria dan bobot
        $kriteria = array(
            'K1' => 0.3,
            'K2' => 0.2,
            'K3' => 0.5
        );
        
        // Data alternatif dan nilai
        $alternatif = array(
            array('nama' => 'Alternatif 1', 'K1' => 4, 'K2' => 5, 'K3' => 3),
            array('nama' => 'Alternatif 2', 'K1' => 3, 'K2' => 4, 'K3' => 5),
            array('nama' => 'Alternatif 3', 'K1' => 5, 'K2' => 3, 'K3' => 4),
        );
        
        // Proses perhitungan SAW
        $hasil = array();
        foreach($alternatif as $index => $alt) {
            $total = 0;
            foreach($kriteria as $k => $bobot) {
                $total += $alt[$k] * $bobot;
            }
            $hasil[] = array('index' => $index, 'nama' => $alt['nama'], 'total' => $total);
        }
        
        // Sorting hasil
        usort($hasil, function($a, $b) {
            return $b['total'] <=> $a['total'];
        });
        
        // Mengirim data ke view
        $data['hasil'] = $hasil;
        $data['kriteria'] = $kriteria;
        $data['alternatif'] = $alternatif;
        return view('PKK.SPK.Saw.perhitungan', $data);
    }
}
