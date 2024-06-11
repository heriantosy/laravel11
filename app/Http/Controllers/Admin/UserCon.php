<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Dosen_model;
use App\Models\Karyawan_model;
use App\Models\Mahasiswa_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use App\Models\Prodi_model;
use App\Models\User;

class UserCon extends Controller
{
    public function index()
    {
		$users = User::orderBy('id', 'DESC')->take(50)->select('id', 'name', 'email','username','roles','unit','ProdiID')->get();
        $prodi = Prodi_model::select('ProdiID', 'Nama', 'NA')->orderBy('Nama','ASC')->where('NA', 'N')->get();
		$data  = array(  'title'     => 'List User',
						'prodi'      => $prodi,
                        'users'      => $users,
                        'content'   => 'admin/user/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    public function edit($id)
    {
        //$idx = Crypt::decryptString($username);
        $user   = User::where('id',$id)->orderBy('id','DESC')->first();
        $prodi  = Prodi_model::select('ProdiID', 'Nama', 'NA')->orderBy('Nama','ASC')->where('NA', 'N')->get();
        $data = array(  'title'     => 'Edit User',
                        'user'      => $user,
                        'prodi'      => $prodi,
                        'content'   => 'admin/user/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    public function edit_proses(Request $request)
    {    	
    	request()->validate([
					        'name'     => 'required',
                            'username' => 'required',
                            'password' => 'required',
                            'email'    => 'required',
					        ]);  
        $prodiIDs       = $request->input('aksesprodi', []);  
        $prodiIDString  = implode(',', $prodiIDs);                                
        User::where('id','=',$request->id)->update([
            'name'          => $request->name,
            'email'         => $request->email,
            'username'      => $request->username,
            'unit'          => $request->prodi,
            'ProdiID'       => $prodiIDString,
            'password'      => Hash::make($request->password),
            'roles'         => $request->roles
        ]);
        return redirect('admin/user');
    }

    public function tambah_proses(Request $request)
    {    	
    	request()->validate([
                            'username' => 'required',
                            'name'     => 'required',
					        'username' => 'required|unique:users',
					        'password' => 'required',
                            'email'    => 'required',
					        ]);
            $prodiIDs       = $request->input('aksesprodi', []);  
            $prodiIDString  = implode(',', $prodiIDs);                                 
            User::insert([
            'username'  => $request->username,
            'name'      => $request->name,
            'email'     => $request->email,
            'username'  => $request->username,
            'ProdiID'   => $prodiIDString,
            'password'  => Hash::make($request->password),
            'roles'     => $request->roles
        ]);
        return redirect('admin/user')->with(['sukses' => 'Data telah ditambah']);
    }

    public function sincronize_user(Request $request)
    {
        $datax = [];
        if ($request->roles == 'ADMIN') {
            $karyawan = Karyawan_model::select('Login', 'Nama', 'Email')->whereNotNull('Email')->limit(10)->get();
            foreach ($karyawan as $rows) {
                $datax[] = [
                    'name' => $rows->Nama,
                    'password' => Hash::make($rows->Login),
                    'roles' => 'ADMIN',
                    'username' => $rows->Login,
                ];
            }
        } elseif ($request->roles == 'DOSEN') {
            $dosen = Dosen_model::select('Login', 'Nama', 'Email')->whereNotNull('Email')->limit(10)->get();
            foreach ($dosen as $rows) {
                $datax[] = [
                    'username' => $rows->Login,
                    'name' => $rows->Nama,
                    'password' => Hash::make($rows->Login),
                    'roles' => 'DOSEN'
                ];
            }
        } else {
            $mahasiswa = Mahasiswa_model::select('MhswID', 'ProdiID', 'Nama', 'Email', 'TahunID')
                ->where('ProdiID', '=',$request->prodi)
                ->where('TahunID', '=',$request->angkatan)
                ->whereNotNull('Email')
                ->limit(10)
                ->get();          
            foreach ($mahasiswa as $rows) {
                $datax[] = [
                    'username' => $rows->MhswID,
                    'name' => $rows->Nama,
                    'password' => Hash::make($rows->MhswID),
                    'roles' => 'MAHASISWA'
                ];
            }
        }

        User::insert($datax);

        $users = User::limit(50)->get();
        $prodi = Prodi_model::select('ProdiID', 'Nama', 'NA')->orderBy('Nama', 'ASC')->where('NA', 'N')->get();

        $data = [
            'title' => 'List User',
            'users' => $users,
            'prodi' => $prodi,
            'content' => 'admin/user/index'
        ];

        return view('admin/layout/wrapper', $data);
    }


    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        if(isset($_POST['hapus'])) {
            $id_usernya       = $request->id_user;
            for($i=0; $i < sizeof($id_usernya);$i++) {
                User::where('id_user','=',$id_usernya[$i])->delete();
            }
            return redirect('admin/user');
        }
    }

    public function delete($id)
    {
    	//$idx = Crypt::decryptString($username);
    	User::where('id','=',$id)->delete();
    	return redirect('admin/user')->with(['sukses' => 'Data telah dihapus']);
    }


}
