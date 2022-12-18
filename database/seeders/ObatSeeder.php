<?php

namespace Database\Seeders;

use App\Models\Obat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("obat")->truncate();
        $data = array(
            [
                'ob_nama' => 'Trenmeza',
                'ob_kandunganVal' => NULL,
                'ob_kandunganSatuan' => NULL,
                'ob_harga' => 20000,
                'ob_stok' => 100,
                'ob_deskripsi' => "Trenmeza merupakan obat dengan kandungan Pseudoephedrine HCl dan Triprolidine HCl. Obat ini digunakan untuk meringankan gejala-gejala flu.",
                'to_id' => 2,
            ],
            [
                'ob_nama' => 'Cetirizine ',
                'ob_kandunganVal' => 10,
                'ob_kandunganSatuan' => "mg",
                'ob_harga' => 8000,
                'ob_stok' => 100,
                'ob_deskripsi' => "Cetirizine adalah obat untuk meredakan gejala atau keluhan akibat reaksi alergi, seperti gatal pada kulit, tenggorokan, hidung, bersin-bersin, atau biduran.",
                'to_id' => 2,
            ],
            [
                'ob_nama' => 'Panadol Extra',
                'ob_kandunganVal' => NULL,
                'ob_kandunganSatuan' => NULL,
                'ob_harga' => 10000,
                'ob_stok' => 100,
                'ob_deskripsi' => "Panadol Extra merupakan obat dengan kandungan Paracetamol dan Caffeine. Obat ini dapat digunakan untuk meringankan sakit kepala dan sakit gigi.",
                'to_id' => 2,
            ],
            [
                'ob_nama' => 'Sangobion',
                'ob_kandunganVal' => NULL,
                'ob_kandunganSatuan' => NULL,
                'ob_harga' => 10000,
                'ob_stok' => 100,
                'ob_deskripsi' => "Sangobion adalah vitamin dan zat besi penambah darah yang membantu proses pembentukan hemoglobin ditubuh sehingga dapat membantu mengatasi anemia saat menstruasi, hamil, menyusui, masa pertumbuhan, dan setelah mengalami pendarahan.",
                'to_id' => 1,
            ],
            [
                'ob_nama' => 'Epexol ',
                'ob_kandunganVal' => 30,
                'ob_kandunganSatuan' => "mg",
                'ob_harga' => 10000,
                'ob_stok' => 100,
                'ob_deskripsi' => "Epexol merupakan obat batuk yang mengandung Ambroxol hydrochloride. Ambroxol adalah agen mukolitik yang bekerja dengan cara meningkatkan sekresi saluran pernapasan dengan meningkatkan produksi surfaktan paru dan merangsang aktivitas silia dan menghasilkan peningkatan pembersihan mukosiliar serta peningkatan sekresi cairan yang memfasilitasi pengeluaran dan meredakan batuk.",
                'to_id' => 2,
            ],
            [
                'ob_nama' => 'Acetylcysteine',
                'ob_kandunganVal' => 200,
                'ob_kandunganSatuan' => "mg",
                'ob_harga' => 20000,
                'ob_stok' => 100,
                'ob_deskripsi' => "Acetylcysteine adalah obat yang digunakan untuk mengencerkan dahak pada beberapa kondisi, seperti asma, cystic fibrosis, atau PPOK. Selain itu, obat ini juga digunakan untuk mengobati keracunan paracetamol.",
                'to_id' => 1,
            ],
            [
                'ob_nama' => 'Acyclovir',
                'ob_kandunganVal' => 400,
                'ob_kandunganSatuan' => "mg",
                'ob_harga' => 10000,
                'ob_stok' => 100,
                'ob_deskripsi' => "Acyclovir adalah obat untuk mengatasi infeksi virus herpes, termasuk cacar air, cacar ular, atau herpes genital.",
                'to_id' => 2,
            ],
            [
                'ob_nama' => 'Bodrex',
                'ob_kandunganVal' => NULL,
                'ob_kandunganSatuan' => NULL,
                'ob_harga' => 10000,
                'ob_stok' => 100,
                'ob_deskripsi' => "Bodrex merupakan obat dengan kandungan Paracetamol dan Caffeine. Obat ini digunakan untuk meringankan sakit kepala, sakit gigi, dan menurunkan demam.",
                'to_id' => 2,
            ],
            [
                'ob_nama' => 'Ibuprofen',
                'ob_kandunganVal' => 200,
                'ob_kandunganSatuan' => "mg",
                'ob_harga' => 4000,
                'ob_stok' => 100,
                'ob_deskripsi' => "Ibuprofen adalah obat untuk meredakan nyeri dan menurunkan deman.",
                'to_id' => 2,
            ],
            [
                'ob_nama' => 'Mefinal',
                'ob_kandunganVal' => 400,
                'ob_kandunganSatuan' => "mg",
                'ob_harga' => 18000,
                'ob_stok' => 100,
                'ob_deskripsi' => "Mefinal adalah obat untuk Nyeri pada kondisi rematik, cedera jaringan lunak, kondisi muskuloskeletal menyakitkan lainnya, dismenorea, sakit kepala, sakit gigi, nyeri pasca operasi.",
                'to_id' => 2,
            ],
        );
        for ($i=0; $i < count($data); $i++) {
            Obat::create($data[$i]);
        }
    }
}
