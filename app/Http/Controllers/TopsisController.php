<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopsisController extends Controller
{
    public function index()
    {
        return view('PKK.SPK.topsis.index');
    }

    public function calculate(Request $request)
    {
        // Retrieve weights from the form input
        $weights = [
            $request->input('pendapatan'),
            $request->input('riwayat_pembayaran'),
            $request->input('lama_tinggal'),
            $request->input('usia'),
            $request->input('jumlah_tanggungan')
        ];

        // Placeholder data for demonstration purposes
        $alternativesArray = ['A1', 'A2', 'A3', 'A4', 'A5'];
        $decisionMatrix = [
            [5, 3, 4, 2, 1],
            [4, 4, 3, 3, 2],
            [3, 5, 2, 4, 3],
            [2, 2, 5, 5, 4],
            [1, 1, 1, 1, 5]
        ];

        // Define criteria and weights
        $criteria = ['Pendapatan Bulanan', 'Riwayat Pembayaran', 'Lama Tinggal', 'Usia', 'Jumlah Tanggungan'];
        $criteriaType = ['benefit', 'benefit', 'benefit', 'benefit', 'cost'];

        // Perform TOPSIS steps
        $normalizedMatrix = $this->normalizeMatrix($decisionMatrix, $criteria);
        $weightedNormalizedMatrix = $this->weightNormalizedMatrix($normalizedMatrix, $weights);
        list($idealBest, $idealWorst) = $this->determineIdealSolutions($weightedNormalizedMatrix, $criteria, $criteriaType);
        $distances = $this->calculateDistances($weightedNormalizedMatrix, $idealBest, $idealWorst);
        $scores = $this->calculateScores($distances);
        $rankings = $this->getRankings($alternativesArray, $scores);

        // Store steps for display
        $steps = [
            'normalizedMatrix' => $normalizedMatrix,
            'weightedNormalizedMatrix' => $weightedNormalizedMatrix,
            'idealBest' => $idealBest,
            'idealWorst' => $idealWorst,
            'distances' => $distances,
            'scores' => $scores,
            'rankings' => $rankings
        ];

        // Pass the steps data to the view
        return view('PKK.SPK.topsis.index', compact('steps', 'criteria', 'alternativesArray', 'weights'));
    }

    // Other TOPSIS calculation functions...

    // Placeholder functions for other TOPSIS calculation steps
}