<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Barang;
class AditController extends Controller
{
    //
    public function TampilkanData(){
        $data = DB::table('Barang')->get();
        return view('user/tampildata', ['data' => $data]);
    }
        public function TambahData(){
            return view('user/tambahdata');
        }
    
        public function TambahDataAction(Request $request){
            // Validasi data
            $request->validate([
                'nama_barang' => 'required|string|max:255',
                'jumlah_barang' => 'required|integer',
            ]);
    
            DB::table('Barang')->insert([
                'nama_barang' => $request->nama_barang,
                'jumlah_barang' => $request->jumlah_barang,

            ]);
           
            return redirect()->route('TampilkanData')->with('success', 'Data barang berhasil ditambahkan!');
        }
    
        // hapus dat
        public function HapusData($id) {
            
            DB::table('Barang')->where('id_barang', $id)->delete();
        
            
            return redirect()->route('TampilkanData')->with('success', 'Data barang berhasil dihapus!');
        }

        // edit data 
        public function EditData($id) {
            
            $barang = DB::table('Barang')->where('id_barang', $id)->first();
            
            
            if (!$barang) {
                return redirect()->route('TampilkanData')->with('error', 'Data barang tidak ditemukan!');
            }
        
            return view('user/editdata', ['barang' => $barang]);
        }

        // edit data update
        public function UpdateDataAction(Request $request, $id) {
            
            $request->validate([
                'nama_barang' => 'required|string|max:255',
                'jumlah_barang' => 'required|integer',
            ]);
        
            
            DB::table('Barang')->where('id_barang', $id)->update([
                'nama_barang' => $request->nama_barang,
                'jumlah_barang' => $request->jumlah_barang,
            ]);
        
            
            return redirect()->route('TampilkanData')->with('success', 'Data barang berhasil diupdate!');
        }


}
