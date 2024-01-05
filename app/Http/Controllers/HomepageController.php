<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Modules\Layanan\Entities\Voting;
use Modules\Layanan\Entities\Votingpilihan;
use Modules\Superadmin\Entities\Datapokok;
use Modules\Zelnaralink\Entities\Linkmaster;
use Modules\Zelnaralink\Entities\Linkmasterbutton;

class HomepageController extends Controller
{
    function index(){
        return view('welcome');
    }

    function page($page){
        switch ($page) {
            case '404':
                return view('page.404');
                break;
            
            default:
            return redirect('/');
                break;
        }
    }
    
    // ZELNARA LINK
    
    function link(){
        return view('zelnara.link.index');
    }
    function linkurl($url){
        $linkmaster = Linkmaster::where('url',$url)->first();
        if (!$linkmaster) {
            return redirect('/page/404');
        }
        $linkmaster->view = $linkmaster->view + 1;
        $linkmaster->save();
        return view('zelnara.link.show',compact('linkmaster'));
    }

    // ZELNARA VOTING
    
    function voting(){
        return view('zelnara.voting.index');
    }
    function votingshow($url){
        $voting = Voting::where('link',$url)->first();
        if (!$voting) {
            return redirect('/page/404');
        }
        // $voting->view = $voting->view + 1;
        // $voting->save();
        return view('zelnara.voting.show',compact('voting'));
    }

    // AJAX
    function ajax(){
        $s = (isset($_GET['s'])) ? Crypt::decryptString($_GET['s']) : NULL ;
        switch ($s) {
            case 'jumlah_link_button':
                $id = (isset($_GET['id'])) ? Crypt::decryptString($_GET['id']) : NULL ;
                $linkmasterbutton = Linkmasterbutton::find($id);
                if ($linkmasterbutton) {
                    $linkmasterbutton->jumlah_klik = $linkmasterbutton->jumlah_klik + 1;
                    $linkmasterbutton->save();
                }
                break;
            case 'vote_pilihan':
                $jumlah = NULL;
                $id = (isset($_GET['id'])) ? Crypt::decryptString($_GET['id']) : NULL ;
                $pilihan = Votingpilihan::find($id);
                if ($pilihan) {
                    $pilihan->jumlah = $pilihan->jumlah + 1;
                    $pilihan->save();
                }
                $voting = Votingpilihan::select('id','jumlah')->where('voting_id',$pilihan->voting_id)->get();
                return $voting;
                break;
            
            default:
                # code...
                break;
        }
    } 
}
