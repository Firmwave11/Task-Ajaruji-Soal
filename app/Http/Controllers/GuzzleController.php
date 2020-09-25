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
        $request->session()->forget('pertanyaan1');
        $request->session()->forget('pertanyaan2');
        $request->session()->forget('pertanyaan3');
        $request->session()->forget('pertanyaan4');
        $request->session()->forget('pertanyaan5');
        $request->session()->forget('pertanyaan6');
        $request->session()->forget('pertanyaan7');
        $request->session()->forget('pertanyaan8');
        $request->session()->forget('pertanyaan9');
        $request->session()->forget('pertanyaan10');
        $request->session()->forget('pertanyaan11');
        $request->session()->forget('pertanyaan12');
        $request->session()->forget('pertanyaan13');
        $request->session()->forget('pertanyaan14');
        $request->session()->forget('pertanyaan15');
        $request->session()->forget('pertanyaan16');
        $request->session()->forget('pertanyaan17');
        $request->session()->forget('pertanyaan18');
        $request->session()->forget('pertanyaan19');
        $request->session()->forget('pertanyaan20');
        $request->session()->forget('pertanyaan21');
        $request->session()->forget('pertanyaan22');
        $request->session()->forget('pertanyaan23');
        $request->session()->forget('pertanyaan24');
        $request->session()->forget('pertanyaan25');
        $request->session()->forget('pertanyaan26');
        $request->session()->forget('pertanyaan27');
        $request->session()->forget('pertanyaan28');
        $request->session()->forget('pertanyaan29');
        $request->session()->forget('pertanyaan30');
        $request->session()->forget('pertanyaan31');
        $request->session()->forget('pertanyaan32');
        $request->session()->forget('pertanyaan33');
        $request->session()->forget('pertanyaan34');
        $request->session()->forget('pertanyaan35');
        $request->session()->forget('pertanyaan36');
        $request->session()->forget('pertanyaan37');
        $request->session()->forget('pertanyaan38');
        $request->session()->forget('pertanyaan39');
        $request->session()->forget('pertanyaan40');
        $request->session()->forget('pertanyaan41');
        $request->session()->forget('pertanyaan42');
        $request->session()->forget('pertanyaan43');
        $request->session()->forget('pertanyaan44');
        $request->session()->forget('pertanyaan45');
        $request->session()->forget('pertanyaan46');
        $request->session()->forget('pertanyaan47');
        $request->session()->forget('pertanyaan48');
        $request->session()->forget('pertanyaan49');
        $request->session()->forget('pertanyaan50');
        $request->session()->forget('pertanyaan1s');
        $request->session()->forget('pertanyaan2s');
        $request->session()->forget('pertanyaan3s');
        $request->session()->forget('pertanyaan4s');
        $request->session()->forget('pertanyaan5s');
        $request->session()->forget('pertanyaan6s');
        $request->session()->forget('pertanyaan7s');
        $request->session()->forget('pertanyaan8s');
        $request->session()->forget('pertanyaan9s');
        $request->session()->forget('pertanyaan10s');
        $request->session()->forget('pertanyaan11s');
        $request->session()->forget('pertanyaan12s');
        $request->session()->forget('pertanyaan13s');
        $request->session()->forget('pertanyaan14s');
        $request->session()->forget('pertanyaan15s');
        $request->session()->forget('pertanyaan16s');
        $request->session()->forget('pertanyaan17s');
        $request->session()->forget('pertanyaan18s');
        $request->session()->forget('pertanyaan19s');
        $request->session()->forget('pertanyaan20s');
        $request->session()->forget('pertanyaan21s');
        $request->session()->forget('pertanyaan22s');
        $request->session()->forget('pertanyaan23s');
        $request->session()->forget('pertanyaan24s');
        $request->session()->forget('pertanyaan25s');
        $request->session()->forget('pertanyaan26s');
        $request->session()->forget('pertanyaan27s');
        $request->session()->forget('pertanyaan28s');
        $request->session()->forget('pertanyaan29s');
        $request->session()->forget('pertanyaan30s');
        $request->session()->forget('pertanyaan31s');
        $request->session()->forget('pertanyaan32s');
        $request->session()->forget('pertanyaan33s');
        $request->session()->forget('pertanyaan34s');
        $request->session()->forget('pertanyaan35s');
        $request->session()->forget('pertanyaan36s');
        $request->session()->forget('pertanyaan37s');
        $request->session()->forget('pertanyaan38s');
        $request->session()->forget('pertanyaan39s');
        $request->session()->forget('pertanyaan40s');
        $request->session()->forget('pertanyaan41s');
        $request->session()->forget('pertanyaan42s');
        $request->session()->forget('pertanyaan43s');
        $request->session()->forget('pertanyaan44s');
        $request->session()->forget('pertanyaan45s');
        $request->session()->forget('pertanyaan46s');
        $request->session()->forget('pertanyaan47s');
        $request->session()->forget('pertanyaan48s');
        $request->session()->forget('pertanyaan49s');
        $request->session()->forget('pertanyaan50s');
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
        $nilai1s=$request->session()->get('pertanyaan1s');
        $nilai2s=$request->session()->get('pertanyaan2s');
        $nilai3s=$request->session()->get('pertanyaan3s');
        $nilai4s=$request->session()->get('pertanyaan4s');
        $nilai5s=$request->session()->get('pertanyaan5s');
        $nilai6s=$request->session()->get('pertanyaan6s');
        $nilai7s=$request->session()->get('pertanyaan7s');
        $nilai8s=$request->session()->get('pertanyaan8s');
        $nilai9s=$request->session()->get('pertanyaan9s');
        $nilai10s=$request->session()->get('pertanyaan10s');
        $nilai11s=$request->session()->get('pertanyaan11s');
        $nilai12s=$request->session()->get('pertanyaan12s');
        $nilai13s=$request->session()->get('pertanyaan13s');
        $nilai14s=$request->session()->get('pertanyaan14s');
        $nilai15s=$request->session()->get('pertanyaan15s');
        $nilai16s=$request->session()->get('pertanyaan16s');
        $nilai17s=$request->session()->get('pertanyaan17s');
        $nilai18s=$request->session()->get('pertanyaan18s');
        $nilai19s=$request->session()->get('pertanyaan19s');
        $nilai20s=$request->session()->get('pertanyaan20s');
        $nilai21s=$request->session()->get('pertanyaan21s');
        $nilai22s=$request->session()->get('pertanyaan22s');
        $nilai23s=$request->session()->get('pertanyaan23s');
        $nilai24s=$request->session()->get('pertanyaan24s');
        $nilai25s=$request->session()->get('pertanyaan25s');
        $nilai26s=$request->session()->get('pertanyaan26s');
        $nilai27s=$request->session()->get('pertanyaan27s');
        $nilai28s=$request->session()->get('pertanyaan28s');
        $nilai29s=$request->session()->get('pertanyaan29s');
        $nilai30s=$request->session()->get('pertanyaan30s');
        $nilai31s=$request->session()->get('pertanyaan31s');
        $nilai32s=$request->session()->get('pertanyaan32s');
        $nilai33s=$request->session()->get('pertanyaan33s');
        $nilai34s=$request->session()->get('pertanyaan34s');
        $nilai35s=$request->session()->get('pertanyaan35s');
        $nilai36s=$request->session()->get('pertanyaan36s');
        $nilai37s=$request->session()->get('pertanyaan37s');
        $nilai38s=$request->session()->get('pertanyaan38s');
        $nilai39s=$request->session()->get('pertanyaan39s');
        $nilai40s=$request->session()->get('pertanyaan40s');
        $nilai41s=$request->session()->get('pertanyaan41s');
        $nilai42s=$request->session()->get('pertanyaan42s');
        $nilai43s=$request->session()->get('pertanyaan43s');
        $nilai44s=$request->session()->get('pertanyaan44s');
        $nilai45s=$request->session()->get('pertanyaan45s');
        $nilai46s=$request->session()->get('pertanyaan46s');
        $nilai47s=$request->session()->get('pertanyaan47s');
        $nilai48s=$request->session()->get('pertanyaan48s');
        $nilai49s=$request->session()->get('pertanyaan49s');
        $nilai50s=$request->session()->get('pertanyaan50s');
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
            switch($i){
                case 1:
                if($nilai1s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;                    
                case 2:
                    if($nilai2s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 3:
                    if($nilai3s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 4:
                    if($nilai4s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 5:
                    if($nilai5s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 6:
                    if($nilai6s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;                    
                case 7:
                    if($nilai7s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 8:
                    if($nilai8s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;                                        
                case 9:
                    if($nilai9s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 10:
                    if($nilai10s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 11:
                    if($nilai11s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 12:
                    if($nilai12s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 13:
                    if($nilai13s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 14:
                    if($nilai14s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 15:
                    if($nilai15s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 16:
                    if($nilai16s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 17:
                    if($nilai17s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 18:
                    if($nilai18s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 19:
                    if($nilai19s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 20:
                    if($nilai20s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 21:
                    if($nilai21s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 22:
                    if($nilai22s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 23:
                    if($nilai23s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 24:
                    if($nilai24s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 25:
                    if($nilai25s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 26:
                    if($nilai26s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 27:
                    if($nilai27s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 28:
                    if($nilai28s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 29:
                    if($nilai29s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 30:
                    if($nilai30s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 31:
                    if($nilai31s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 32:
                    if($nilai32s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 33:
                    if($nilai33s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 34:
                    if($nilai34s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 35:
                    if($nilai35s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 36:
                    if($nilai36s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 37:
                    if($nilai37s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 38:
                    if($nilai38s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 39:
                    if($nilai39s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 40:
                    if($nilai40s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 41:
                    if($nilai41s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 42:
                    if($nilai42s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 43:
                    if($nilai43s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 44:
                    if($nilai44s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 45:
                    if($nilai45s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 46:
                    if($nilai46s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 47:
                    if($nilai47s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 48:
                    if($nilai48s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 49:
                    if($nilai49s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
                case 50:
                    if($nilai50s==1){
                        $output .= '<li class="disabled"><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }else{
                        $output .= '<li'.$link_active.'><a name="page" type="submit" href="'.$i.'?matapelajaran='.$data.'&soal='.$idsoal.'" value ="'.$i.'">'.$i.'</a></li>';
                    }
                break;
            }

        } 
        if($page == $total_pages){
            $output .='<li class="disabled"><a href="#">&raquo;</a></li>';
            $output .='<li class="disabled"><a href="#">Last</a></li>';
            $lanjut ='<a href="1?matapelajaran='.$data.'&soal='.$idsoal.'">lanjut</a>'; 
        }else{ // Jika Bukan page terakhir
            $link_next = ($page < $total_pages)? $page + 1 : $total_pages;
            $output .='<li><a href="'.$link_next.'?matapelajaran='.$data.'&soal='.$idsoal.'">&raquo;</a></li>';
            $output .='<li><a href="'.$total_pages.'?matapelajaran='.$data.'&soal='.$idsoal.'">Last</a></li>';
        }
        $output .= '</ul>';
        $hasil= $nilai1 + $nilai2 + $nilai3 + $nilai4 + $nilai5 + $nilai6 + $nilai7 + $nilai8 + $nilai9 + $nilai10 + $nilai11 + $nilai12 + $nilai13 + $nilai14 + $nilai15 + $nilai16 + $nilai17 +
        $nilai18 + $nilai19 + $nilai20 + $nilai21 + $nilai22 + $nilai23 + $nilai24 + $nilai25 + $nilai26 + $nilai27 + $nilai28 + $nilai29 + $nilai30 + $nilai31 + $nilai32 + $nilai33 + $nilai34 + $nilai35 +
        $nilai36 + $nilai37 + $nilai38 + $nilai39 + $nilai40 + $nilai41 + $nilai42 + $nilai43 + $nilai44 + $nilai45 + $nilai46 + $nilai47 + $nilai48 + $nilai49 + $nilai50;
        $hasils= $nilai1s + $nilai2s + $nilai3s + $nilai4s + $nilai5s + $nilai6s + $nilai7s + $nilai8s + $nilai9s + $nilai10s + $nilai11s + $nilai12s + $nilai13s + $nilai14s + $nilai15s + $nilai16s + $nilai17s +
        $nilai18s + $nilai19s + $nilai20s + $nilai21s + $nilai22s + $nilai23s + $nilai24s + $nilai25s + $nilai26s + $nilai27s + $nilai28s + $nilai29s + $nilai30s + $nilai31s + $nilai32s + $nilai33s + $nilai34s + $nilai35s +
        $nilai36s + $nilai37s + $nilai38s + $nilai39s + $nilai40s + $nilai41s + $nilai42s + $nilai43s + $nilai44s + $nilai45s + $nilai46 + $nilai47s + $nilai48s + $nilai49s + $nilai50s;
        $link_next = ($page < $total_pages)? $page + 1 : $total_pages;
        if($hasils == ($total_pages -1) ||$hasils == $total_pages){
            $lanjut ='<a href="'.route('hasil', [$data,$idsoal]).'">hasil</a>';
        }else{
            $lanjut ='<a href="'.$link_next.'?matapelajaran='.$data.'&soal='.$idsoal.'">lanjut</a>';
        }

        return view('soal',[
            'hasils' => $hasils,
            'hasil' => $hasil,
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
        $soal1 = Http::get('ajaruji-demo-alpha.demo.klik.digital/demo/quiz?mapel='.$data.'&id='.$idsoal)
        ->json()['data'];
        $total_pages = count($soal1['soal']);
        $responsejson = json_decode($response->getBody());
        $soal = $responsejson->data->soal;
        $soal1 = $soal[0]->answer;
        $count= count($soal1);
        $jawaban= $request->jawaban;
        if(isset($request->jawaban)){
        switch($page){
            case 1:
                $value1s = 0;
            $value1s++;
            $request->session()->put('pertanyaan1s', $value1s);
            break;                    
            case 2:
                $value2s = 0;
            $value2s++;
            $request->session()->put('pertanyaan2s', $value2s);
            break;
            case 3:
                $value3s = 0;
            $value3s++;
            $request->session()->put('pertanyaan3s', $value3s);
            break;
            case 4:
            $value4s = 0;
            $value4s++;
            $request->session()->put('pertanyaan4s', $value4s);
            break;
            case 5:
                $value5s = 0;
            $value5s++;
            $request->session()->put('pertanyaan5s', $value5s);

            break;
            case 6:
                $value6s = 0;
            $value6s++;
            $request->session()->put('pertanyaan6s', $value6s);

            break;                    
            case 7:
                $value7s = 0;
            $value7s++;
            $request->session()->put('pertanyaan7s', $value7s);
            break;
            case 8:
                $value8s = 0;
            $value8s++;
            $request->session()->put('pertanyaan8s', $value8s);
            break;                                        
            case 9:
                $value9s = 0;
            $value9s++;
            $request->session()->put('pertanyaan9s', $value9s);
            break;
            case 10:
                $value10s = 0;
            $value10s++;
            $request->session()->put('pertanyaan10s', $value10s);
            break;
            case 11:
                $value11s = 0;
            $value11s++;
            $request->session()->put('pertanyaan11s', $value11s);

            break;
            case 12:
                $value12s = 0;
            $value12s++;
            $request->session()->put('pertanyaan12s', $value12s);
            break;
            case 13:
                $value13s = 0;
            $value13s++;
            $request->session()->put('pertanyaan13s', $value13s);
            break;
            case 14:
                $value14s = 0;
            $value14s++;
            $request->session()->put('pertanyaan14s', $value14s);
            break;
            case 15:
                $value15s = 0;
            $value15s++;
            $request->session()->put('pertanyaan15s', $value15s);
            break;
            case 16:
                $value16s = 0;
            $value16s++;
            $request->session()->put('pertanyaan16s', $value16s);
            break;
            case 17:
                $value17s = 0;
            $value17s++;
            $request->session()->put('pertanyaan17s', $value17s);
            break;
            case 18:
                $value18s = 0;
            $value18s++;
            $request->session()->put('pertanyaan18s', $value18s);
            break;
            case 19:
                $value19s = 0;
            $value19s++;
            $request->session()->put('pertanyaan19s', $value19s);
            break;
            case 20:
                $value20s = 0;
            $value20s++;
            $request->session()->put('pertanyaan20s', $value20s);
            break;
            case 21:
                $value21s = 0;
            $value21s++;
            $request->session()->put('pertanyaan21s', $value21s);
            break;
            case 22:
                $value22s = 0;
            $value22s++;
            $request->session()->put('pertanyaan22s', $value22s);
            break;
            case 23:
                $value23s = 0;
            $value23s++;
            $request->session()->put('pertanyaan23s', $value23s);
            break;
            case 24:
                $value24s = 0;
            $value24s++;
            $request->session()->put('pertanyaan24s', $value24s);
            break;
            case 25:
                $value25s = 0;
            $value25s++;
            $request->session()->put('pertanyaan25s', $value25s);
            break;
            case 26:
                $value26s = 0;
            $value26s++;
            $request->session()->put('pertanyaan26s', $value26s);
            break;
            case 27:
                $value27s = 0;
            $value27s++;
            $request->session()->put('pertanyaan27s', $value27s);
            break;
            case 28:
                $value28s = 0;
            $value28s++;
            $request->session()->put('pertanyaan28s', $value28s);
            break;
            case 29:
                $value29s = 0;
            $value29s++;
            $request->session()->put('pertanyaan29s', $value29s);
            break;
            case 30:
                $value30s = 0;
            $value30s++;
            $request->session()->put('pertanyaan30s', $value30s);
            break;
            case 31:
                $value31s = 0;
            $value31s++;
            $request->session()->put('pertanyaan31s', $value31s);
            break;
            case 32:
                $value32s = 0;
            $value32s++;
            $request->session()->put('pertanyaan32s', $value32s);
            break;
            case 33:
                $value33s = 0;
            $value33s++;
            $request->session()->put('pertanyaan33s', $value33s);
            break;
            case 34:
                $value34s = 0;
            $value34s++;
            $request->session()->put('pertanyaan34s', $value34s);
            break;
            case 35:
                $value35s = 0;
            $value35s++;
            $request->session()->put('pertanyaan35s', $value35s);
            break;
            case 36:
                $value36s = 0;
            $value36s++;
            $request->session()->put('pertanyaan36s', $value36s);
            break;
            case 37:
                $value37s = 0;
            $value37s++;
            $request->session()->put('pertanyaan37s', $value37s);
            break;
            case 38:
                $value38s = 0;
            $value38s++;
            $request->session()->put('pertanyaan38s', $value38s);
            break;
            case 39:
                $value39s = 0;
            $value39s++;
            $request->session()->put('pertanyaan39s', $value39s);
            break;
            case 40:
                $value40s = 0;
            $value40s++;
            $request->session()->put('pertanyaan40s', $value40s);
            break;
            case 41:
                $value41s = 0;
            $value41s++;
            $request->session()->put('pertanyaan41s', $value41s);
            break;
            case 42:
                $value42s = 0;
            $value42s++;
            $request->session()->put('pertanyaan42s', $value42s);
            break;
            case 43:
                $value43s = 0;
            $value43s++;
            $request->session()->put('pertanyaan43s', $value43s);
            break;
            case 44:
                $value44s = 0;
            $value44s++;
            $request->session()->put('pertanyaan44s', $value44s);
            break;
            case 45:
                $value45s = 0;
            $value45s++;
            $request->session()->put('pertanyaan45s', $value45s);
            break;
            case 46:
                $value46s = 0;
            $value46s++;
            $request->session()->put('pertanyaan46s', $value46s);
            break;
            case 47:
                $value47s = 0;
            $value47s++;
            $request->session()->put('pertanyaan47s', $value47s);
            break;
            case 48:
                $value48s = 0;
            $value48s++;
            $request->session()->put('pertanyaan48s', $value48s);
            break;
            case 49:
                $value49s = 0;
            $value49s++;
            $request->session()->put('pertanyaan49s', $value49s);
            break;
            case 50:
                $value50s = 0;
            $value50s++;
            $request->session()->put('pertanyaan50s', $value50s);
            break;
        }
    }
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
        public function hasil(Request $request,$data,$idsoal) {
            //dd($this->baseurl.'to?id_mapel='.$request->matapelajaran);
            //$res = Http::get('http://ajaruji-demo-alpha.demo.klik.digital/demo/to?id_mapel='.$request->matapelajaran);
            //$responsejson = json_decode($res->getBody());
            $soal1 = Http::get('ajaruji-demo-alpha.demo.klik.digital/demo/quiz?mapel='.$data.'&id='.$idsoal)
            ->json()['data'];
            $total_pages = count($soal1['soal']);
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
            $nilai1s=$request->session()->get('pertanyaan1s');
            $nilai2s=$request->session()->get('pertanyaan2s');
            $nilai3s=$request->session()->get('pertanyaan3s');
            $nilai4s=$request->session()->get('pertanyaan4s');
            $nilai5s=$request->session()->get('pertanyaan5s');
            $nilai6s=$request->session()->get('pertanyaan6s');
            $nilai7s=$request->session()->get('pertanyaan7s');
            $nilai8s=$request->session()->get('pertanyaan8s');
            $nilai9s=$request->session()->get('pertanyaan9s');
            $nilai10s=$request->session()->get('pertanyaan10s');
            $nilai11s=$request->session()->get('pertanyaan11s');
            $nilai12s=$request->session()->get('pertanyaan12s');
            $nilai13s=$request->session()->get('pertanyaan13s');
            $nilai14s=$request->session()->get('pertanyaan14s');
            $nilai15s=$request->session()->get('pertanyaan15s');
            $nilai16s=$request->session()->get('pertanyaan16s');
            $nilai17s=$request->session()->get('pertanyaan17s');
            $nilai18s=$request->session()->get('pertanyaan18s');
            $nilai19s=$request->session()->get('pertanyaan19s');
            $nilai20s=$request->session()->get('pertanyaan20s');
            $nilai21s=$request->session()->get('pertanyaan21s');
            $nilai22s=$request->session()->get('pertanyaan22s');
            $nilai23s=$request->session()->get('pertanyaan23s');
            $nilai24s=$request->session()->get('pertanyaan24s');
            $nilai25s=$request->session()->get('pertanyaan25s');
            $nilai26s=$request->session()->get('pertanyaan26s');
            $nilai27s=$request->session()->get('pertanyaan27s');
            $nilai28s=$request->session()->get('pertanyaan28s');
            $nilai29s=$request->session()->get('pertanyaan29s');
            $nilai30s=$request->session()->get('pertanyaan30s');
            $nilai31s=$request->session()->get('pertanyaan31s');
            $nilai32s=$request->session()->get('pertanyaan32s');
            $nilai33s=$request->session()->get('pertanyaan33s');
            $nilai34s=$request->session()->get('pertanyaan34s');
            $nilai35s=$request->session()->get('pertanyaan35s');
            $nilai36s=$request->session()->get('pertanyaan36s');
            $nilai37s=$request->session()->get('pertanyaan37s');
            $nilai38s=$request->session()->get('pertanyaan38s');
            $nilai39s=$request->session()->get('pertanyaan39s');
            $nilai40s=$request->session()->get('pertanyaan40s');
            $nilai41s=$request->session()->get('pertanyaan41s');
            $nilai42s=$request->session()->get('pertanyaan42s');
            $nilai43s=$request->session()->get('pertanyaan43s');
            $nilai44s=$request->session()->get('pertanyaan44s');
            $nilai45s=$request->session()->get('pertanyaan45s');
            $nilai46s=$request->session()->get('pertanyaan46s');
            $nilai47s=$request->session()->get('pertanyaan47s');
            $nilai48s=$request->session()->get('pertanyaan48s');
            $nilai49s=$request->session()->get('pertanyaan49s');
            $nilai50s=$request->session()->get('pertanyaan50s');
             $hasils= $nilai1s + $nilai2s + $nilai3s + $nilai4s + $nilai5s + $nilai6s + $nilai7s + $nilai8s + $nilai9s + $nilai10s + $nilai11s + $nilai12s + $nilai13s + $nilai14s + $nilai15s + $nilai16s + $nilai17s +
        $nilai18s + $nilai19s + $nilai20s + $nilai21s + $nilai22s + $nilai23s + $nilai24s + $nilai25s + $nilai26s + $nilai27s + $nilai28s + $nilai29s + $nilai30s + $nilai31s + $nilai32s + $nilai33s + $nilai34s + $nilai35s +
        $nilai36s + $nilai37s + $nilai38s + $nilai39s + $nilai40s + $nilai41s + $nilai42s + $nilai43s + $nilai44s + $nilai45s + $nilai46 + $nilai47s + $nilai48s + $nilai49s + $nilai50s;
        $hasil= $nilai1 + $nilai2 + $nilai3 + $nilai4 + $nilai5 + $nilai6 + $nilai7 + $nilai8 + $nilai9 + $nilai10 + $nilai11 + $nilai12 + $nilai13 + $nilai14 + $nilai15 + $nilai16 + $nilai17 +
        $nilai18 + $nilai19 + $nilai20 + $nilai21 + $nilai22 + $nilai23 + $nilai24 + $nilai25 + $nilai26 + $nilai27 + $nilai28 + $nilai29 + $nilai30 + $nilai31 + $nilai32 + $nilai33 + $nilai34 + $nilai35 +
        $nilai36 + $nilai37 + $nilai38 + $nilai39 + $nilai40 + $nilai41 + $nilai42 + $nilai43 + $nilai44 + $nilai45 + $nilai46 + $nilai47 + $nilai48 + $nilai49 + $nilai50;
        $salah= 0; 
        $jawab = '';  
        if ($hasils == $total_pages ){
                $salah= $total_pages - $hasil;
                $angka = 100/$total_pages;
                $score = $angka*$hasil;
                $jawab .= 'jawaban benar:'.$hasil;
                $jawab .= '<br>jawaban salah:'.$salah.'</br>';
                $jawab .= '<br>Score anda:'.$score.'</br>';
            }
            return view('hasil',[
                'hasil' => $hasil,
                'jawab' => $jawab,
                ]);
            }

}
