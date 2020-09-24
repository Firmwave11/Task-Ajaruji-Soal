<?php

namespace App\Http\Controllers;
use GuzzleHttp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;


class GuzzleController extends Controller
{
    public function getData(Request $request){
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
        $nilai = $request->session()->get('jawaban');
        $output ='<ul class="pagination">';
        
        if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
            $output .= '<li class="disabled"><a href="#">First</a></li>';
            $output .= '<li class="disabled"><a href="#">&laquo;</a></li>';
            }else{ // Jika page bukan page ke 1
              $link_prev = ($page > 1)? $page - 1 : 1;
              $output .= '<li><a href="1?matapelajaran='.$data.'&soal='.$idsoal.'">First</a></li>';
              $output .= '<li><a href="'.$link_prev.'?matapelajaran='.$data.'&soal='.$idsoal.'">&laquo;</a></li>';
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
             $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';  
        } 
        if($page == $total_pages){
            $output .='<li class="disabled"><a href="#">&raquo;</a></li>';
            $output .='<li class="disabled"><a href="#">Last</a></li>';
        }else{ // Jika Bukan page terakhir
            $link_next = ($page < $total_pages)? $page + 1 : $total_pages;
            $output .='<li><a href="'.$link_next.'?matapelajaran='.$data.'&soal='.$idsoal.'">&raquo;</a></li>';
            $output .='<li><a href="'.$total_pages.'?matapelajaran='.$data.'&soal='.$idsoal.'">Last</a></li>';
        }
        $output .= '</ul>';
        $nilai1=$request->session()->get('pertanyaan1');
        $nilai2=$request->session()->get('pertanyaan2');
        $nilai3=$request->session()->get('pertanyaan3');
        $nilai4=$request->session()->get('pertanyaan4');
        $nilai5=$request->session()->get('pertanyaan5');
        $nilai6=$request->session()->get('pertanyaan6');
        $nilai7=$request->session()->get('pertanyaan7');
        $nilai8=$request->session()->get('pertanyaan8');
        $nilai9=$request->session()->get('pertanyaan9');
        $nilai10=$request->session()->get('pertanyaan10');
        $nilai11=$request->session()->get('pertanyaan11');
        $nilai12=$request->session()->get('pertanyaan12');
        $nilai13=$request->session()->get('pertanyaan13');
        $nilai14=$request->session()->get('pertanyaan14');
        $nilai15=$request->session()->get('pertanyaan15');
        $nilai16=$request->session()->get('pertanyaan16');
        $nilai17=$request->session()->get('pertanyaan17');
        $nilai18=$request->session()->get('pertanyaan18');
        $nilai19=$request->session()->get('pertanyaan19');
        $nilai20=$request->session()->get('pertanyaan20');
        $nilai21=$request->session()->get('pertanyaan21');
        $nilai22=$request->session()->get('pertanyaan22');
        $nilai23=$request->session()->get('pertanyaan23');
        $nilai24=$request->session()->get('pertanyaan24');
        $nilai25=$request->session()->get('pertanyaan25');
        $nilai26=$request->session()->get('pertanyaan26');
        $nilai27=$request->session()->get('pertanyaan27');
        $nilai28=$request->session()->get('pertanyaan28');
        $nilai29=$request->session()->get('pertanyaan29');
        $nilai30=$request->session()->get('pertanyaan30');
        $nilai31=$request->session()->get('pertanyaan31');
        $nilai32=$request->session()->get('pertanyaan32');
        $nilai33=$request->session()->get('pertanyaan33');
        $nilai34=$request->session()->get('pertanyaan34');
        $nilai35=$request->session()->get('pertanyaan35');
        $nilai36=$request->session()->get('pertanyaan36');
        $nilai37=$request->session()->get('pertanyaan37');
        $nilai38=$request->session()->get('pertanyaan38');
        $nilai39=$request->session()->get('pertanyaan39');
        $nilai40=$request->session()->get('pertanyaan40');
        $nilai41=$request->session()->get('pertanyaan41');
        $nilai42=$request->session()->get('pertanyaan42');
        $nilai43=$request->session()->get('pertanyaan43');
        $nilai44=$request->session()->get('pertanyaan44');
        $nilai45=$request->session()->get('pertanyaan45');
        $nilai46=$request->session()->get('pertanyaan46');
        $nilai47=$request->session()->get('pertanyaan47');
        $nilai48=$request->session()->get('pertanyaan48');
        $nilai49=$request->session()->get('pertanyaan49');
        $nilai50=$request->session()->get('pertanyaan50');
        $hasil= $nilai1 + $nilai2 + $nilai3 + $nilai4 + $nilai5 + $nilai6 + $nilai7 + $nilai8 + $nilai9 + $nilai10 + $nilai11 + $nilai12 + $nilai13 + $nilai14 + $nilai15 + $nilai16 + $nilai17 +
        $nilai18 + $nilai19 + $nilai20 + $nilai21 + $nilai22 + $nilai23 + $nilai24 + $nilai25 + $nilai26 + $nilai27 + $nilai28 + $nilai29 + $nilai30 + $nilai31 + $nilai32 + $nilai33 + $nilai34 + $nilai35 +
        $nilai36 + $nilai37 + $nilai38 + $nilai39 + $nilai40 + $nilai41 + $nilai42 + $nilai43 + $nilai44 + $nilai45 + $nilai46 + $nilai47 + $nilai48 + $nilai49 + $nilai50;
        $link_next = ($page < $total_pages)? $page + 1 : $total_pages;
        $lanjut ='<a href="'.$link_next.'?matapelajaran='.$data.'&soal='.$idsoal.'">lanjut</a>';
        return view('soal',[
            'lanjut' =>$lanjut,
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
        $jawaban= $request->jawaban;
        $jawab = '<span name="hasil" id="res_message" value="0">jawaban anda salah</span>';
        for($i = 0; $i <$count; $i++){
            $hasil = $soal1[$i]->content;
            $hasil2 = $soal1[$i]->status;
            if ($request->jawaban == $hasil && $hasil2 == 1){
                $jawab = '<span name="hasil" id="res_message" value="1">jawaban anda benar</span>';
                switch($page){
                    case 1:
                        $value1 = 0;
                    $value1++;
                    $request->session()->put('pertanyaan1', $value1);
                    break;                    
                    case 2:
                        $value2 = 0;
                    $value2++;
                    $request->session()->put('pertanyaan2', $value2);
                    break;
                    case 3:
                        $value3 = 0;
                    $value3++;
                    $request->session()->put('pertanyaan3', $value3);
                    break;
                    case 4:
                    $value4 = 0;
                    $value4++;
                    $request->session()->put('pertanyaan4', $value4);
                    break;
                    case 5:
                        $value5 = 0;
                    $value5++;
                    $request->session()->put('pertanyaan5', $value5);

                    break;
                    case 6:
                        $value6 = 0;
                    $value6++;
                    $request->session()->put('pertanyaan6', $value6);

                    break;                    
                    case 7:
                        $value7 = 0;
                    $value7++;
                    $request->session()->put('pertanyaan7', $value7);
                    break;
                    case 8:
                        $value8 = 0;
                    $value8++;
                    $request->session()->put('pertanyaan8', $value8);
                    break;                                        
                    case 9:
                        $value9 = 0;
                    $value9++;
                    $request->session()->put('pertanyaan9', $value9);
                    break;
                    case 10:
                        $value10 = 0;
                    $value10++;
                    $request->session()->put('pertanyaan10', $value10);
                    break;
                    case 11:
                        $value11 = 0;
                    $value11++;
                    $request->session()->put('pertanyaan11', $value11);

                    break;
                    case 12:
                        $value12 = 0;
                    $value12++;
                    $request->session()->put('pertanyaan12', $value12);
                    break;
                    case 13:
                        $value13 = 0;
                    $value13++;
                    $request->session()->put('pertanyaan13', $value13);
                    break;
                    case 14:
                        $value14 = 0;
                    $value14++;
                    $request->session()->put('pertanyaan14', $value14);
                    break;
                    case 15:
                        $value15 = 0;
                    $value15++;
                    $request->session()->put('pertanyaan15', $value15);
                    break;
                    case 16:
                        $value16 = 0;
                    $value16++;
                    $request->session()->put('pertanyaan16', $value16);
                    break;
                    case 17:
                        $value17 = 0;
                    $value17++;
                    $request->session()->put('pertanyaan17', $value17);
                    break;
                    case 18:
                        $value18 = 0;
                    $value18++;
                    $request->session()->put('pertanyaan18', $value18);
                    break;
                    case 19:
                        $value19 = 0;
                    $value19++;
                    $request->session()->put('pertanyaan19', $value19);
                    break;
                    case 20:
                        $value20 = 0;
                    $value20++;
                    $request->session()->put('pertanyaan20', $value20);
                    break;
                    case 21:
                        $value21 = 0;
                    $value21++;
                    $request->session()->put('pertanyaan21', $value21);
                    break;
                    case 22:
                        $value22 = 0;
                    $value22++;
                    $request->session()->put('pertanyaan22', $value22);
                    break;
                    case 23:
                        $value23 = 0;
                    $value23++;
                    $request->session()->put('pertanyaan23', $value23);
                    break;
                    case 24:
                        $value24 = 0;
                    $value24++;
                    $request->session()->put('pertanyaan24', $value24);
                    break;
                    case 25:
                        $value25 = 0;
                    $value25++;
                    $request->session()->put('pertanyaan25', $value25);
                    break;
                    case 26:
                        $value26 = 0;
                    $value26++;
                    $request->session()->put('pertanyaan26', $value26);
                    break;
                    case 27:
                        $value27 = 0;
                    $value27++;
                    $request->session()->put('pertanyaan27', $value27);
                    break;
                    case 28:
                        $value28 = 0;
                    $value28++;
                    $request->session()->put('pertanyaan28', $value28);
                    break;
                    case 29:
                        $value29 = 0;
                    $value29++;
                    $request->session()->put('pertanyaan29', $value29);
                    break;
                    case 30:
                        $value30 = 0;
                    $value30++;
                    $request->session()->put('pertanyaan30', $value30);
                    break;
                    case 31:
                        $value31 = 0;
                    $value31++;
                    $request->session()->put('pertanyaan31', $value31);
                    break;
                    case 32:
                        $value32 = 0;
                    $value32++;
                    $request->session()->put('pertanyaan32', $value32);
                    break;
                    case 33:
                        $value33 = 0;
                    $value33++;
                    $request->session()->put('pertanyaan33', $value33);
                    break;
                    case 34:
                        $value34 = 0;
                    $value34++;
                    $request->session()->put('pertanyaan34', $value34);
                    break;
                    case 35:
                        $value35 = 0;
                    $value35++;
                    $request->session()->put('pertanyaan35', $value35);
                    break;
                    case 36:
                        $value36 = 0;
                    $value36++;
                    $request->session()->put('pertanyaan36', $value36);
                    break;
                    case 37:
                        $value37 = 0;
                    $value37++;
                    $request->session()->put('pertanyaan37', $value37);
                    break;
                    case 38:
                        $value38 = 0;
                    $value38++;
                    $request->session()->put('pertanyaan38', $value38);
                    break;
                    case 39:
                        $value39 = 0;
                    $value39++;
                    $request->session()->put('pertanyaan39', $value39);
                    break;
                    case 40:
                        $value40 = 0;
                    $value40++;
                    $request->session()->put('pertanyaan40', $value40);
                    break;
                    case 41:
                        $value41 = 0;
                    $value41++;
                    $request->session()->put('pertanyaan41', $value41);
                    break;
                    case 42:
                        $value42 = 0;
                    $value42++;
                    $request->session()->put('pertanyaan42', $value42);
                    break;
                    case 43:
                        $value43 = 0;
                    $value43++;
                    $request->session()->put('pertanyaan43', $value43);
                    break;
                    case 44:
                        $value44 = 0;
                    $value44++;
                    $request->session()->put('pertanyaan44', $value44);
                    break;
                    case 45:
                        $value45 = 0;
                    $value45++;
                    $request->session()->put('pertanyaan45', $value45);
                    break;
                    case 46:
                        $value46 = 0;
                    $value46++;
                    $request->session()->put('pertanyaan46', $value46);
                    break;
                    case 47:
                        $value47 = 0;
                    $value47++;
                    $request->session()->put('pertanyaan47', $value47);
                    break;
                    case 48:
                        $value48 = 0;
                    $value48++;
                    $request->session()->put('pertanyaan48', $value48);
                    break;
                    case 49:
                        $value49 = 0;
                    $value49++;
                    $request->session()->put('pertanyaan49', $value49);
                    break;
                    case 50:
                        $value50 = 0;
                    $value50++;
                    $request->session()->put('pertanyaan50', $value50);
                    break;
                }

            }
            }
            return $jawab;
               
            }
    public function penjelasan(Request $request,$data,$idsoal,$page) {
            //dd($this->baseurl.'to?id_mapel='.$request->matapelajaran);
            //$res = Http::get('http://ajaruji-demo-alpha.demo.klik.digital/demo/to?id_mapel='.$request->matapelajaran);
            //$responsejson = json_decode($res->getBody());
            $penjelasan = Http::get('ajaruji-demo-alpha.demo.klik.digital/demo/quiz?mapel='.$data.'&id='.$idsoal.'&no_urut='.$page)
            ->json()['data']['soal'][0]['explain'];
            $soal1 = Http::get('ajaruji-demo-alpha.demo.klik.digital/demo/quiz?mapel='.$data.'&id='.$idsoal)
            ->json()['data'];
            $total_pages = count($soal1['soal']);
            $link_next = ($page < $total_pages)? $page + 1 : $total_pages;
            $lanjut ='<a href="http://127.0.0.1:8000/soal/'.$link_next.'?matapelajaran='.$data.'&soal='.$idsoal.'">lanjut</a>';
            return view('jelas',[
                'penjelasan' => $penjelasan,
                'lanjut' => $lanjut,
                ]);
            }
            
}
