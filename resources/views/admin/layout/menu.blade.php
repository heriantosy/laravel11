@php
use Illuminate\Support\Facades\Auth;
use App\Models\Tahun_model;

$tahun = Tahun_model::select('TahunID', 'ProdiID', 'ProgramID', 'Nama', 'NA')
        ->orderBy('Nama', 'ASC')
        ->where('NA', 'N')
        ->first();
$program ='REG A';
$unit    ='SI';
@endphp




<style type="text/css" media="screen">
  .nav ul li p !important {
    font-size: 12px;
  }
  .infoku {
    margin-left: 20px; 
    text-transform: uppercase;
    color: yellow;
    font-size: 11px;
  }
  .far.fa-circle.nav-icon {
    width: 2px; /* Sesuaikan dengan lebar yang Anda inginkan */
    height: 2px; /* Sesuaikan dengan tinggi yang Anda inginkan */
  }
</style>

<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ asset('admin/dasbor') }}" class="brand-link">
    <img src=""
         alt=""
         class="brand-image img-circle elevation-3"
         style="opacity: .8">
      <span class="brand-text font-weight-light">Galih</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- DASHBOARD -->
          <li class="nav-item">
            <a href="{{ asset('admin/dasbor') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>


  <li class="batas"><hr> <span class="infoku"><i class="fa fa-certificate"></i> Master</span></li>
          <li class="batas"><hr></li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>Master <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Identitas</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/tahun') }}?tahun={{ $tahun->TahunID }}&program={{ $program }}&prodi={{ $unit }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Data Tahun</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/prodi') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Data Prodi</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/dosen') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Data Dosen</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/matakuliah') }}?prodi={{ $unit }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Data Matakuliah</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/mahasiswa') }}?prodi={{ $unit }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Data Mahasiswa</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/mahasiswax') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Data MahasiswaX</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/ruang') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Data Ruang</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/asalsekolah') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Data Asal Sekolah</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/tahunakademik') }}?tahun={{ $tahun->TahunID }}&program={{ $program }}&prodi={{ $unit }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Waktu PKL/Skripsi</p></a>
              </li>
            </ul>
          </li>
  
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>PMB<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="{{ asset('admin/setuppmb') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Setup PMB</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/pmb/pmbjualform') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Penjualan Formulir</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/pmb') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Data PMB</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/pmb/pmbtahun') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>PMB Per Tahun</p></a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>Keuangan<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="{{ asset('admin/financeh2hmhs') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Keuangan H2H</p></a></li>             
              <li class="nav-item"><a href="{{ asset('admin/pembayaranpkl') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Pembayaran PKL</p></a></li>             
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Jurusan<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="{{ asset('admin/jadwal') }}?tahun={{ $tahun->TahunID }}&program={{ $program }}&prodi={{ $unit }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Jadwal Kuliah</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/jadwalx') }}?tahun={{ $tahun->TahunID }}&program={{ $program }}&prodi={{ $unit }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Jadwal & File</p></a>
              </li>

              <li class="nav-item"><a href="{{ asset('admin/jadwalujian') }}?tahun={{ $tahun->TahunID }}&program={{ $program }}&prodi={{ $unit }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Jadwal Ujian</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/absensi') }}?tahun={{ $tahun->TahunID }}&program={{ $program }}&prodi={{ $unit }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Absensi</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/krsadm') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Kartu Rencana Studi (KRS)</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/nilaieditmhs') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Edit Nilai</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/khsadm') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Kartu Hasil Studi (KHS)</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/transkrip') }}?tahun={{ $tahun->TahunID }}&program={{ $program }}&prodi={{ $unit }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Transkrip</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/aka_mhs') }}?tahun={{ $tahun->TahunID }}&program={{ $program }}&prodi={{ $unit }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Akademik & Jatah SKS</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/rekapdata') }}?tahun={{ $tahun->TahunID }}&program={{ $program }}&prodi={{ $unit }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Rekap Data & IPS Mhs</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/mbkmadm') }}?tahun={{ $tahun->TahunID }}&program={{ $program }}&prodi={{ $unit }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>MBKM</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/suratadm') }}?tahun={{ $tahun->TahunID }}&program={{ $program }}&prodi={{ $unit }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Manajemen Surat</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/beasiswaadm') }}?tahun={{ date('Y') }}&program={{ $program }}&prodi={{ $unit }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Beasiswa</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/prestasimhs') }}?tahun={{ $tahun->TahunID }}&program={{ $program }}&prodi={{ $unit }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Prestasi</p></a>
              </li>
            </ul>
          </li>
     

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Dosen<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="{{ asset('admin/jadwalkuliahdosen/index') }}?tahun={{ $tahun->TahunID }}&program={{ $program }}&prodi={{ $unit }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Jadwal Kuliah</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/jadwalkuliahdosen') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Nilai Kuliah</p></a>
              </li>

            </ul>
          </li>
       
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Mahasiswa<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="{{ asset('admin.krsadm.index') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Kartu Rencana Studi (KRS)</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/khsadm') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Kartu Hasil Studi (KHS)</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/khsadm/ceksesi') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Cek Sesi KHS</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/jadwalujian/cekkehadiran') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Cek Kehadiran</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/prestasimhs') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Prestasi Mahasiswa</p></a>
              </li>

            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>Semester Pendek<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="{{ asset('admin/pengajuansp') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Pengajuan SP</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/pengajuansp/nilaisp/20201/SI') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Nilai SP</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/khsadmsp') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Cetak Kartu Hasil Studi</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/transkripsp') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Cetak Transkrip</p></a>
              </li>
            </ul>
          </li>

          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>Kerja Praktek<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="{{ asset('admin/pengajuankp') }}?tahun={{ $tahun->TahunID }}&program={{ $program }}&prodi={{ $unit }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Pengajuan Judul KP</p><a>

              </li>
              <li class="nav-item"><a href="{{ asset('admin/kerjapraktekpro') }}?tahun={{ $tahun->TahunID }}&program={{ $program }}&prodi={{ $unit }}') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Hasil KP</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/kerjapraktekpro') }}?tahun={{ $tahun->TahunID }}&program={{ $program }}&prodi={{ $unit }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Proses Nilai KP</p></a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>Skripsi<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="{{ asset('admin/pengajuanta') }}?tahun={{ $tahun->TahunID }}&program={{ $program }}&prodi={{ $unit }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Pengajuan Judul</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/skripsipro') }}?tahun={{ $tahun->TahunID }}&program={{ $program }}&prodi={{ $unit }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Proposal Skripsi</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/skripsihsl/hasilta') }}?tahun={{ $tahun->TahunID }}&program={{ $program }}&prodi={{ $unit }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Hasil Skripsi</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/skripsinilai/nilaita') }}?tahun={{ $tahun->TahunID }}&program={{ $program }}&prodi={{ $unit }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Proses Nilai</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/refjudul') }}?tahun={{ $tahun->TahunID }}&program={{ $program }}&prodi={{ $unit }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Referensi Judul</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/ujianprogram') }}?tahun={{ $tahun->TahunID }}&program={{ $program }}&prodi={{ $unit }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Ujian Program</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/yudisium') }}?tahun={{ $tahun->TahunID }}&program={{ $program }}&prodi={{ $unit }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Yudisium</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/sinkronskripsi') }}?tahun={{ $tahun->TahunID }}&program={{ $program }}&prodi={{ $unit }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Sinkron Skripsi</p></a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>Dok SPMI<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="{{ asset('admin/kebijakanspmi') }}" class="nav-link"><i class="fa fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Kebijakan SPMI</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/manualspmi') }}" class="nav-link"><i class="fa fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Manual SPMI</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/stadarspmi') }}" class="nav-link"><i class="fa fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Standar SPMI</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/formulirspmi') }}" class="nav-link"><i class="fa fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Formulir SPMI</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/mutu/sop') }}" class="nav-link"><i class="fa fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>SOP</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/dokumensnpt') }}" class="nav-link"><i class="fa fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Dokumen SNPT</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/dokumenpenting') }}" class="nav-link"><i class="fa fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Dokumen Penting</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/dokumenppepp') }}" class="nav-link"><i class="fa fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Dokumen PPEPP</p></a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>Kepegawaian<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item"><a href="{{ asset('admin/pegawai') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>List Pegawai</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/pelatihan') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Pelatihan/Workshop</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/pengajuancuti') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Pengajuan Cuti</p></a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>Transaksi<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item"><a href="{{ asset('admin/productsnew') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Product</p></a></li>
            <li class="nav-item"><a href="{{ asset('admin/purchases') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Purchase</p></a></li>
            <li class="nav-item"><a href="{{ asset('admin/employee/attendence') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Attendance</p></a></li>
            <li class="nav-item"><a href="{{ asset('admin/sales') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>POS</p></a></li>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>Dokumen<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item"><a href="{{ asset('admin/download') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Download Dokumen</p></a></li>           
            </ul>
          </li>
       
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>Laporan<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="{{ asset('admin/lapakademik/grafik_pmb') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Grafik PMB New</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/lapakademik/grafikpmb') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Grafik PMB</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/dashboard/mhs') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Dashboard Grafik</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/lapakademik') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Laporan Akademik</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/sppangkatan') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>SPP Per Angkatan</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/pmb/angkapmb') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>PMB Dalam Angka</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/mahasiswa/angkamahasiswa') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Mhs Baru Dalam Angka</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/lapakademik/mhsaktifprodi') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Mhs Aktif Prodi</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/mahasiswa/angkalulusan') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Lulus Dalam Angka</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/lapakademik/lapbkddosen') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Laporan BKD</p></a>
              </li>
            </ul>
          </li>

           <!-- Website Content -->
           <li class="batas"><hr> <span class="infoku"><i class="fa fa-certificate"></i> System Setting</span></li>
          <li class="batas"><hr></li>
          <li class="nav-item">
            <a href="{{ asset('admin/user') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>List User</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ asset('admin/karyawan') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Setting Karyawan</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>Change Photo & Pass</p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ asset('admin/heading') }}" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>Header Gambar</p>
            </a>
          </li>
          
          <!-- MENU -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Konfigurasi
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="{{ asset('admin/konfigurasi') }}" class="nav-link"><i class="fas fa-tools nav-icon"></i><p>Konfigurasi Umum</p></a>
              </li>
            
              <li class="nav-item"><a href="{{ asset('admin/konfigurasi/logo') }}" class="nav-link"><i class="fa fa-home nav-icon"></i><p>Ganti Logo</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/konfigurasi/icon') }}" class="nav-link"><i class="fa fa-upload nav-icon"></i><p>Ganti Icon</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/konfigurasi/email') }}" class="nav-link"><i class="fa fa-envelope nav-icon"></i><p>Email Setting</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/rekening') }}" class="nav-link"><i class="fas fa-book nav-icon"></i><p>Rekening</p></a>
              </li>
            </ul>
          </li>


            <!-- Website Content -->
            <li class="batas"><hr> <span class="infoku"><i class="fa fa-certificate"></i> Berita &amp; Updates</span></li>
          <li class="batas"><hr></li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>Berita &amp; Update<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="{{ asset('admin/berita') }}" class="nav-link"><i class="fas fa-newspaper nav-icon"></i><p>Data Berita &amp; Update</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/berita/tambah') }}" class="nav-link"><i class="fa fa-plus nav-icon"></i><p>Tambah Berita/Update</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/kategori') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Kategori berita</p></a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>Galeri &amp; Banner<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="{{ asset('admin/galeri') }}" class="nav-link"><i class="fas fa-newspaper nav-icon"></i><p>Data Galeri</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/galeri/tambah') }}" class="nav-link"><i class="fa fa-plus nav-icon"></i><p>Tambah Galeri</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/kategori_galeri') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Kategori Galeri</p></a>
              </li>
            </ul>
          </li>

          

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>Event &amp; Agenda<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="{{ asset('admin/agenda') }}" class="nav-link"><i class="fas fa-newspaper nav-icon"></i><p>Data Event &amp; Agenda</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/agenda/tambah') }}" class="nav-link"><i class="fa fa-plus nav-icon"></i><p>Tambah Event &amp; Agenda</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/kategori_agenda') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Kategori Event &amp; Agenda</p></a>
              </li>
            </ul>
          </li>
          

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-download"></i>
              <p>Download &amp; File<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="{{ asset('admin/download') }}" class="nav-link"><i class="fas fa-newspaper nav-icon"></i><p>Data File</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/download/tambah') }}" class="nav-link"><i class="fa fa-plus nav-icon"></i><p>Tambah File</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/kategori_download') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Kategori File</p></a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{ asset('admin/video') }}" class="nav-link">
              <i class="nav-icon fas fa-film"></i>
              <p>Video Webinar</p>
            </a>
          </li>

          <!-- Website Content -->
          <li class="batas"><hr> <span class="infoku"><i class="fa fa-certificate"></i> Profil &amp; Layanan</span></li>
          <li class="batas"><hr></li>

          <li class="nav-item">
            <a href="{{ asset('admin/konfigurasi/profil') }}" class="nav-link">
              <i class="nav-icon fas fa-leaf"></i>
              <p>Update Profil</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ asset('admin/berita/jenis_berita/Layanan') }}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Layanan</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Board &amp; Team<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="{{ asset('admin/staff') }}" class="nav-link"><i class="fas fa-newspaper nav-icon"></i><p>Data Board &amp; Team</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/staff/tambah') }}" class="nav-link"><i class="fa fa-plus nav-icon"></i><p>Tambah Board &amp; Team</p></a>
              </li>
              <li class="nav-item"><a href="{{ asset('admin/kategori_staff') }}" class="nav-link"><i class="far fa-circle nav-icon" style="color: yellow; border-radius: 50%;"></i><p>Kategori Board &amp; Team</p></a>
              </li>
            </ul>
          </li>
       
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
              <div class="col-md-12">
              <h2 class="card-title"><b style="color:purple">{{ strtoupper($title) }}</b></h2>
              </div>
                           
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
<div class="table-responsive konten">
    
    
    <!-- Leweh add-->
<script>
  /** add active class and stay opened when selected */
var url = window.location;

// for sidebar menu entirely but not cover treeview
$('ul.nav-sidebar a').filter(function() {
    return this.href == url;
}).addClass('active');

// for treeview
$('ul.nav-treeview a').filter(function() {
    return this.href == url;
}).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open') .prev('a').addClass('active');
</script>

<!-- end leweh add-->

    