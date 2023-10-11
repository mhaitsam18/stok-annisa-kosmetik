@extends('profile')

@section('content_page')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">Pengaturan Akun /</span>
        Keamanan
    </h4>
@endsection


@section('content_profile')
    <!-- Change Password -->
    <div class="card mb-4">
        <h5 class="card-header">Ubah Sandi</h5>
        <div class="card-body">
            <form id="formAccountSettings" method="POST" onsubmit="return false" action="{{ route('profile.edit_pw') }}">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-6 form-password-toggle">
                        <label class="form-label" for="currentPassword">Sandi Saat Ini</label>
                        <div class="input-group input-group-merge">
                            <input class="form-control" type="password" name="currentPassword" id="currentPassword"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6 form-password-toggle">
                        <label class="form-label" for="newPassword">Sandi Baru</label>
                        <div class="input-group input-group-merge">
                            <input class="form-control" type="password" id="newPassword" name="newPassword"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>

                    <div class="mb-3 col-md-6 form-password-toggle">
                        <label class="form-label" for="confirmPassword">Konfirmasi Sandi Baru</label>
                        <div class="input-group input-group-merge">
                            <input class="form-control" type="password" name="confirmPassword" id="confirmPassword"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <p class="fw-semibold mt-2">Persyaratan Kata Sandi:</p>
                        <ul class="ps-3 mb-0">
                            <li class="mb-1">
                                Panjang minimum 8 karakter - semakin banyak, semakin baik
                            </li>
                            <li class="mb-1">Setidaknya satu karakter huruf kecil</li>
                            <li>Setidaknya satu angka, simbol, atau karakter spasi</li>
                        </ul>
                    </div>
                    <div class="col-12 mt-1">
                        <button type="submit" class="btn btn-primary me-2">Simpan perubahan</button>
                        <button type="reset" class="btn btn-label-secondary">Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--/ Change Password -->
@endsection

@section('addScript')
    <script src="{{ asset('/') }}assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/cleavejs/cleave-phone.js"></script>
    <!-- Page JS -->
    <script src="{{ asset('/') }}assets/js/pages-account-settings-security.js"></script>

    @if ($message = Session::get('success'))
        <script>
            swal({
                title: "{{ $message }}",
                icon: "success",
                button: "Ok!",
            });
        </script>
    @endif

    @if ($message = Session::get('error'))
        <script>
            swal({
                title: "{{ $message }}",
                icon: "error",
                button: "Ok!",
            });
        </script>
    @endif
@endsection
