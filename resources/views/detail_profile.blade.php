@extends('profile')

@section('content_page')
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">Pengaturan Akun /</span>
        Akun
    </h4>
@endsection


@section('content_profile')
    <div class="card mb-4">
        <h5 class="card-header">
            Detail Profil
        </h5>

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" id="formAccountSettings">
            @csrf

            <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
            <!-- Account -->
            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="{{ asset('/') }}assets/img/avatars/{{ Auth::user()->avatar }}" alt="user-avatar"
                        class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Unggah foto baru</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload" class="account-file-input" hidden
                                accept="image/png, image/jpeg" name="avatar" />
                        </label>
                        <button type="button" class="btn btn-label-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                        </button>

                        <p class="mb-0">
                            Ektensi yang diterima JPG, GIF atau PNG.
                            Maksimal ukuran yaitu 2MB
                        </p>
                    </div>
                </div>
            </div>
            <hr class="my-0" />
            <div class="card-body">

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input class="form-control" type="text" id="name" name="name"
                            value="{{ Auth::user()->name }}" autofocus />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="username" class="form-label">Username</label>
                        <input class="form-control @error('username', 'edit_profile') invalid @enderror" type="text"
                            name="username" id="username" value="{{ Auth::user()->username }}" />

                        @error('username', 'edit_profile')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="role">Role</label>
                        <select id="role" class="select2 form-select" name="role" disabled>
                            {{-- <option value="" disabled>Select</option> --}}

                            <option value="admin" <?= Auth::user()->role == 'admin' ? 'selected' : '' ?>>Admin
                            </option>
                            <option value="gudang" <?= Auth::user()->role == 'gudang' ? 'selected' : '' ?>>
                                Gudang</option>
                            <option value="manajer" <?= Auth::user()->role == 'manajer' ? 'selected' : '' ?>>
                                Manajer</option>
                            <option value="kasir" <?= Auth::user()->role == 'kasir' ? 'selected' : '' ?>>
                                Kasir</option>

                        </select>
                    </div>

                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">
                        Simpan perubahan
                    </button>

                </div>

            </div>
            <!-- /Account -->
        </form>
    </div>
    <div class="card">
        <h5 class="card-header">
            Hapus Akun
        </h5>
        <div class="card-body">
            <div class="mb-3 col-12 mb-0">
                <div class="alert alert-warning">
                    <h6 class="alert-heading mb-1">
                        Apakah Anda yakin ingin menghapus akun Anda?
                    </h6>
                    <p class="mb-0">
                        Setelah Anda menghapus Anda
                        akun, tidak ada
                        akan kembali. Silakan
                        yakin.
                    </p>
                </div>
            </div>
            <form id="formAccountDeactivation" method="POST" action="{{ route('profile.hapus_akun') }}">

                @csrf

                <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
                    <label class="form-check-label" for="accountActivation">Saya
                        mengkonfirmasi penonaktifan akun saya</label>
                </div>
                <button type="submit" class="btn btn-danger deactivate-account">
                    Hapus Akun
                </button>
            </form>
        </div>
    </div>
@endsection

@section('addScript')
    <script src="{{ asset('/') }}assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/cleavejs/cleave-phone.js"></script>
    <!-- Page JS -->
    <script src="{{ asset('/') }}assets/js/pages-account-settings-account.js"></script>

    @if ($message = Session::get('success'))
        <script>
            swal({
                title: "{{ $message }}",
                icon: "success",
                button: "Ok!",
            });
        </script>
    @endif

    {{-- @error('username', 'edit_profile')
        <script>
            swal({
                title: "{{ $message }}",
                icon: "success",
                button: "Ok!",
            });
        </script>
    @enderror --}}
@endsection
