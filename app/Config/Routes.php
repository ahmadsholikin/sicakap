<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();
$folder_backend = "Backend\'";

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Frontend\Home\Main');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

$routes->set404Override(function () {
    $param['code']      = 403;
    $param['message']   = "Whoaa Halaman tidak ditemukan... ";
    $param['image']     = "forbidden.png";
    $param['desc']      = "<p>Sepertinya halaman web yang Anda akses tidak ditemukan</p>";
    return view('response/page', $param);
});

$routes->add('denied', function () {
    $param['code']      = 403;
    $param['message']   = "Uups Akses ditolak... ";
    $param['image']     = "denied.jpg";
    $param['desc']      = "<p>Anda tidak mempunyai hak akses untuk masuk ke dalam halaman yang ingin Anda tuju</p>";
    return view('response/page', $param);
});

$routes->add('error', function () {
    $param['code']      = 101;
    $param['message']   = "Uups Erros Gaes... ";
    $param['image']     = "denied.jpg";
    $param['desc']      = "<p>Sepertinya ada kesalahan teknis, mohon bersabar untuk perbaikan selanjutnya ya... </p>";
    return view('response/page', $param);
});

$routes->add('done', function () {
    $param['code']      = ')';
    $param['message']   = "Yeayy pengisian selesai... ";
    $param['image']     = "barloader.gif";
    $param['desc']      = "<p>Terima kasih telah melengkapi isiannya. Silakan melanjutkan aktivitas lainnya...</p>";
    return view('response/page', $param);
});

$routes->add('/404', 'Pages\Response::not_found');
$routes->add('/403', 'Pages\Response::denied');
$routes->add('/101', 'Pages\Response::unavailable');
$routes->add('/comingsoon', 'Pages\Response::comingsoon');

$routes->get('/', 'Frontend\Home\Main::index');


//frontend
$routes->group('auth', function ($routes) {
    $root_menu = "Pages\Auth\Auth";
    //pages
    $routes->add('/', $root_menu . '::index');
    $routes->get('signout', $root_menu.'::signout');
    $routes->get('logout',  $root_menu.'::signout');

    $routes->post('login',  $root_menu.'::signin');
    $routes->post('signin',  $root_menu.'::signin');
    $routes->post('sso',  $root_menu.'::sso');
});


$routes->group('backend', function ($routes) {

    $routes->group('beranda', function ($routes) {
        $root_folder = "Backend\Dashboard\Main";
        //pages
        $routes->add('/', $root_folder . '::index', ['filter' => 'auth']);
    });

    $routes->group('site', function ($routes) {
        $root_folder = "Backend\Option\Site";
        //pages
        $routes->add('/', $root_folder . '::index', ['filter' => 'auth']);
    });

    // Route Option    
    $routes->group('menu', function ($routes) {
        $root_menu = "Backend\Option\Menu";
        //pages
        $routes->add('/', $root_menu . '::index');
        $routes->add('add', $root_menu . '::add', ['filter' => 'auth']);
        $routes->get('edit', $root_menu . '::edit', ['filter' => 'auth']);
        //process
        $routes->post('insert', $root_menu . '::insert', ['filter' => 'auth']);
        $routes->post('update', $root_menu . '::update', ['filter' => 'auth']);
        $routes->get('delete', $root_menu . '::delete', ['filter' => 'auth']);
        $routes->post('sorting', $root_menu . '::sorting', ['filter' => 'auth']);

        $routes->add('get_primary_key', $root_menu . '::get_primary_key', ['filter' => 'auth']);
        $routes->add('get_list_menu', $root_menu . '::get_list_menu', ['filter' => 'auth']);
    });

    $routes->group('groups', function ($routes) {
        $root_groups = "Backend\Option\Groups";
        //pages
        $routes->add('/', $root_groups . '::index', ['filter' => 'auth']);
        $routes->add('add', $root_groups . '::add', ['filter' => 'auth']);
        $routes->get('edit', $root_groups . '::edit', ['filter' => 'auth']);
        //process
        $routes->post('insert', $root_groups . '::insert', ['filter' => 'auth']);
        $routes->post('update', $root_groups . '::update', ['filter' => 'auth']);
        $routes->get('delete', $root_groups . '::delete', ['filter' => 'auth']);
    });

    $routes->group('role', function ($routes) {
        $root_role = "Backend\Option\Role";
        //pages
        $routes->add('/', $root_role.'::index', ['filter' => 'auth']);
        //process
        $routes->add('getRole', $root_role.'::getRole', ['filter' => 'auth']);
        $routes->add('setRole', $root_role.'::setRole', ['filter' => 'auth']);
    });

    $routes->group('users', function ($routes) {
        $root_user = "Backend\Option\Users";
        //pages
        $routes->add('/', $root_user.'::index', ['filter' => 'auth']);
        $routes->add('add', $root_user.'::add', ['filter' => 'auth']);
        $routes->get('edit', $root_user.'::edit', ['filter' => 'auth']);

        //process
        $routes->post('insert', $root_user.'::insert', ['filter' => 'auth']);
        $routes->post('update', $root_user.'::update', ['filter' => 'auth']);
        $routes->get('delete', $root_user.'::delete', ['filter' => 'auth']);
        $routes->get('is_active', $root_user.'::is_active', ['filter' => 'auth']);

        //link atasan
        $routes->post('simpan-link', $root_user.'::simpanLink', ['filter' => 'auth']);
        $routes->post('memuat-link', $root_user.'::memuatLink', ['filter' => 'auth']);
        $routes->post('hapus-link', $root_user.'::hapusLink', ['filter' => 'auth']);
        $routes->post('aktif-link', $root_user.'::aktifLink', ['filter' => 'auth']);
    });

    $routes->group('profile', function ($routes) {
        $root_profile = "Backend\Option\Profile";
        //pages
        $routes->add('/', $root_profile.'::index', ['filter' => 'auth']);
        $routes->post('update', $root_profile.'::update', ['filter' => 'auth']);
    });

    //entrian data - periode skp
    $routes->group('periode-skp', function ($routes) {
        $root_groups = "Backend\EntrianData\PeriodeSKP";
        //pages
        $routes->add('/', $root_groups . '::index', ['filter' => 'auth']);
        $routes->add('add', $root_groups . '::add', ['filter' => 'auth']);
        $routes->get('edit', $root_groups . '::edit', ['filter' => 'auth']);
        //process
        $routes->post('insert', $root_groups . '::insert', ['filter' => 'auth']);
        $routes->post('update', $root_groups . '::update', ['filter' => 'auth']);
        $routes->get('delete', $root_groups . '::delete', ['filter' => 'auth']);
        $routes->get('default', $root_groups . '::default', ['filter' => 'auth']);
    });

    //entrian data - susunan skp
    $routes->group('susunan-skp', function ($routes) {
        $root_groups = "Backend\EntrianData\SusunanSKP";
        //pages
        $routes->add('/', $root_groups . '::index', ['filter' => 'auth']);
        $routes->add('add', $root_groups . '::add', ['filter' => 'auth']);
        $routes->get('edit', $root_groups . '::edit', ['filter' => 'auth']);
        //process
        $routes->post('insert', $root_groups . '::insert', ['filter' => 'auth']);
        $routes->post('update', $root_groups . '::update', ['filter' => 'auth']);
        $routes->get('delete', $root_groups . '::delete', ['filter' => 'auth']);
    });

     //entrian data - aktivitas harian
     $routes->group('aktivitas-harian', function ($routes) {
        $root_groups = "Backend\EntrianData\AktivitasHarian";
        //pages
        $routes->add('/', $root_groups . '::index', ['filter' => 'auth']);
        $routes->add('add', $root_groups . '::add', ['filter' => 'auth']);
        $routes->get('edit', $root_groups . '::edit', ['filter' => 'auth']);
        //process
        $routes->post('insert', $root_groups . '::insert', ['filter' => 'auth']);
        $routes->post('update', $root_groups . '::update', ['filter' => 'auth']);
        $routes->get('delete', $root_groups . '::delete', ['filter' => 'auth']);
    });

    //verifikasi - persetujuan skp
    $routes->group('persetujuan-skp', function ($routes) {
        $root_groups = "Backend\Verifikasi\PersetujuanSKP";
        //pages
        $routes->add('/', $root_groups . '::index', ['filter' => 'auth']);
        $routes->add('acc-all', $root_groups . '::accAll', ['filter' => 'auth']);
        $routes->post('set-status', $root_groups . '::setStatus', ['filter' => 'auth']);
    });

    //verifikasi - persetujuan skp
    $routes->group('verif-aktivitas-harian', function ($routes) {
        $root_groups = "Backend\Verifikasi\VerifAktivitasHarian";
        //pages
        $routes->add('/', $root_groups . '::index', ['filter' => 'auth']);
        $routes->post('set-status', $root_groups . '::setStatus', ['filter' => 'auth']);
    });


    //Penilaian - penyesuaian skp
    $routes->group('penyesuaian-skp', function ($routes) {
        $root_groups = "Backend\Penilaian\PenyesuaianSKP";
        //pages
        $routes->add('/', $root_groups . '::index', ['filter' => 'auth']);
        $routes->get('get-skp', $root_groups . '::getSKP', ['filter' => 'auth']);
        $routes->post('set-skp', $root_groups . '::setSKP', ['filter' => 'auth']);

        $routes->post('add-tambahan-kreativitas', $root_groups . '::addTambahanKreativitas', ['filter' => 'auth']);
        $routes->get('delete-tambahan-kreativitas', $root_groups . '::deleteTambahanKreativitas', ['filter' => 'auth']);
        $routes->post('approve-tambahan-kreativitas', $root_groups . '::approveTambahanKreativitas', ['filter' => 'auth']);
    });

    //Penilaian - capaian skp
    $routes->group('capaian-skp', function ($routes) {
        $root_groups = "Backend\Penilaian\CapaianSKP";
        //pages
        $routes->add('/', $root_groups . '::index', ['filter' => 'auth']);
        $routes->post('set-skp', $root_groups . '::setSKP', ['filter' => 'auth']);
    });


    //Penilaian - perilaku kerja
    $routes->group('perilaku-kerja', function ($routes) {
        $root_groups = "Backend\Penilaian\PerilakuKerja";
        //pages
        $routes->add('/', $root_groups . '::index', ['filter' => 'auth']);
        $routes->post('set-nilai', $root_groups . '::setNilai', ['filter' => 'auth']);
        $routes->post('info-wa', $root_groups . '::infoWa', ['filter' => 'auth']);
    });

    //Penilaian - review
    $routes->group('review', function ($routes) {
        $root_groups = "Backend\Penilaian\Review";
        //pages
        $routes->add('/', $root_groups . '::index', ['filter' => 'auth']);
        $routes->post('kirim-pesan', $root_groups . '::kirimPesan', ['filter' => 'auth']);
    });

});
//output - print_skp
$routes->group('output', function ($routes) {
    $root_groups = "Output\Cetak";
    //pages
    $routes->post('cetak-skp', $root_groups . '::print_skp', ['filter' => 'auth']);
});

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}