<?php

namespace App\Http\Controllers;
use GuzzleHttp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;


class GuzzleController extends Controller
{
    public function getData(){
        $mataPelajaran = Http::get('http://ajaruji-demo-alpha.demo.klik.digital/demo/mapel')
            ->json()['data'];
        $tryOutArray = Http::get('http://ajaruji-demo-alpha.demo.klik.digital/demo/to')
        ->json()['data'];
        $page = 1;
        return view('mapel',[
        'mataPelajaran' => $mataPelajaran,
        'page'          => $page,
        ]);
        
    }
    public function ajax_mapel(Request $request) {
            //dd($this->baseurl.'to?id_mapel='.$request->matapelajaran);
            //$res = Http::get('http://ajaruji-demo-alpha.demo.klik.digital/demo/to?id_mapel='.$request->matapelajaran);
            //$responsejson = json_decode($res->getBody());
            $response = Http::get('http://ajaruji-demo-alpha.demo.klik.digital/demo/to?id_mapel='.$request->matapelajaran);
            $responsejson = json_decode($response->getBody());
            
            $hasil = '<option value="">--- Pilih Soal</option>';
            foreach($responsejson->data as $d) {
            $hasil .= '<option value='.$d->id.'>'.$d->nama.'</option>';
            }
            $hasil .= '</select>';
            
            
            return $hasil; 
    }
    public function soal(Request $request,$page) {
        //dd($this->baseurl.'to?id_mapel='.$request->matapelajaran);
        //$res = Http::get('http://ajaruji-demo-alpha.demo.klik.digital/demo/to?id_mapel='.$request->matapelajaran);
        //$responsejson = json_decode($res->getBody());\
        $soal = Http::get('ajaruji-demo-alpha.demo.klik.digital/demo/quiz?mapel='.$request->matapelajaran.'&id='.$request->soal.'&no_urut='.$page)
        ->json()['data'];
        $soal1 = Http::get('ajaruji-demo-alpha.demo.klik.digital/demo/quiz?mapel='.$request->matapelajaran.'&id='.$request->soal)
        ->json()['data'];
        $data= $request->matapelajaran;
        $idsoal= $request->soal;
        $benar = 0;
        $salah = 0;
        if($request->hasil == 'jawaban anda benar'){
            $benar = $benar + 1;
        }
        $output ='<ul class="pagination">';
        if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
            $output .= '<li class="disabled"><a href="#">First</a></li>';
            $output .= '<li class="disabled"><a href="#">&laquo;</a></li>';
            }else{ // Jika page bukan page ke 1
              $link_prev = ($page > 1)? $page - 1 : 1;
              $output .= '<li><a href="1?matapelajaran='.$data.'&soal='.$idsoal.'&_token=Yx5wKvg0bKMrpvZNHPhIrM3YWqdd67cAiWokzprc">First</a></li>';
              $output .= '<li><a href="'.$link_prev.'?matapelajaran='.$data.'&soal='.$idsoal.'&_token=Yx5wKvg0bKMrpvZNHPhIrM3YWqdd67cAiWokzprc">&laquo;</a></li>';
            }
        $total_pages = count($soal1['soal']);
        $jumlah_number = 5; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
        $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
        $end_number = ($page < ($total_pages - $jumlah_number))? $page + $jumlah_number : $total_pages;
        if($request->page){
            $page = $request->page;
        }
        else{
            $page = 1;
        }
        for($i=$start_number; $i<=$end_number; $i++)  
        {  
            $link_active = ($page == $i)? ' class="active"' : ''; 
             $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'&_token=Yx5wKvg0bKMrpvZNHPhIrM3YWqdd67cAiWokzprc" value ="'.$i.'">'.$i.'</a></li>';  
        } 
        if($page == $total_pages){
            $output .='<li class="disabled"><a href="#">&raquo;</a></li>';
            $output .='<li class="disabled"><a href="#">Last</a></li>';
        }else{ // Jika Bukan page terakhir
            $link_next = ($page < $total_pages)? $page + 1 : $total_pages;
            $output .='<li><a href="'.$link_next.'?matapelajaran='.$data.'&soal='.$idsoal.'&_token=Yx5wKvg0bKMrpvZNHPhIrM3YWqdd67cAiWokzprc">&raquo;</a></li>';
            $output .='<li><a href="'.$total_pages.'?matapelajaran='.$data.'&soal='.$idsoal.'&_token=Yx5wKvg0bKMrpvZNHPhIrM3YWqdd67cAiWokzprc">Last</a></li>';
        }
        $output .= '</ul>';
        $link_next = ($page < $total_pages)? $page + 1 : $total_pages;
        $lanjut ='<a href="'.$link_next.'?matapelajaran='.$data.'&soal='.$idsoal.'&_token=Yx5wKvg0bKMrpvZNHPhIrM3YWqdd67cAiWokzprc">lanjut</a>';
        return view('soal',[
            'lanjut' =>$lanjut,
            'benar' =>$benar,
            'salah' =>$salah,
            'output' => $output,
            'soal' => $soal,
            'data' => $data,
            'page' => $page,
            'idsoal' => $idsoal,
            ]);

        }
    public function jawab(Request $request,$data,$idsoal,$page) {
        $response = Http::get('ajaruji-demo-alpha.demo.klik.digital/demo/quiz?mapel='.$data.'&id='.$idsoal.'&no_urut='.$page)
        ;
        $responsejson = json_decode($response->getBody());
        $soal = $responsejson->data->soal;
        $soal1 = $soal[0]->answer;
        $count= count($soal1);

        $jawab = '<span name="hasil"id="res_message" value="jawaban anda salah">jawaban anda salah</span>';
        for($i = 0; $i <$count; $i++){
            $hasil = $soal1[$i]->content;
            $hasil2 = $soal1[$i]->status;
            if ($request->jawaban == $hasil && $hasil2 == 1){
                $jawab = '<span name="hasil"id="res_message" value="jawaban anda benar">jawaban anda benar</span>';
                }
            }
            return $jawab;
               
            }
    public function penjelasan($data,$idsoal,$page) {
            //dd($this->baseurl.'to?id_mapel='.$request->matapelajaran);
            //$res = Http::get('http://ajaruji-demo-alpha.demo.klik.digital/demo/to?id_mapel='.$request->matapelajaran);
            //$responsejson = json_decode($res->getBody());
            $penjelasan = Http::get('ajaruji-demo-alpha.demo.klik.digital/demo/quiz?mapel='.$data.'&id='.$idsoal.'&no_urut='.$page)
            ->json()['data']['soal'][0]['explain'];
            $soal1 = Http::get('ajaruji-demo-alpha.demo.klik.digital/demo/quiz?mapel='.$data.'&id='.$idsoal)
            ->json()['data'];
            $total_pages = count($soal1['soal']);
            $link_next = ($page < $total_pages)? $page + 1 : $total_pages;
            $lanjut ='<a href="http://127.0.0.1:8000/soal/'.$link_next.'?matapelajaran='.$data.'&soal='.$idsoal.'&_token=Yx5wKvg0bKMrpvZNHPhIrM3YWqdd67cAiWokzprc">lanjut</a>';
            return view('jelas',[
                'lanjut' => $lanjut,
                'penjelasan' => $penjelasan,
                  ]);
            }
            
}
