<?php

namespace App\Exports;

use App\Models\Histori;
use App\Models\Questions;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Redirect;
class TracerExportHistori implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $tracer = Histori::with('alumni')->get();
        $questions = Questions::where('status', 'publish')->get();
        $questionIds = $questions->pluck('id')->toArray();
        $questionHeadings = $questions->pluck('pertanyaan')->toArray();

        $data = collect();

        foreach ($tracer as $dataTracer) {
            // dd($dataTracer);
            $rowData = [
                'ID Alumni' => $dataTracer->alumni['id'],
                'Nama Alumni' => $dataTracer->alumni['nama_alumni'],
                'NIM' => $dataTracer->alumni['nim'],
                'tanggal_tracer' => date_format($dataTracer->created_at,'d M Y'),
                'tracer_ke' => $dataTracer->alumni['total_tracer'],
            ];
            // dd($rowData);

            $jawaban = $dataTracer->jawaban;
// dd($jawaban);
            foreach ($questionIds as $questionId) {
                $foundJawaban = collect($jawaban)->firstWhere('id', $questionId);
                $rowData[] = $foundJawaban ? $foundJawaban['value'] : 'Tidak ada jawaban';
            }

            $data->push($rowData);
        }

        return $data;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        $questions = Questions::where('status', 'publish')->get();
        $questionHeadings = $questions->pluck('pertanyaan')->toArray();

        $headings = [
            'ID Alumni',
            'Nama Alumni',
            'NIM',
            'tanggal_tracer',
            'tracer_ke',
        ];

        // Tambahkan judul pertanyaan lainnya ke dalam heading
        foreach ($questionHeadings as $questionHeading) {
            $headings[] = $questionHeading;
        }

        return $headings;

    }
    public function afterExport($exporter, $download, $writerType, $writer)
    {
        // Redirect back to the same page after the export is complete
        return Redirect::back();
    }
}
