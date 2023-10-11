@extends('layouts.app')

@section('addStyle')
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
@endsection

@section('content')
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">
            <!-- Menu -->

            @include('layouts.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="container-fluid">
                        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
                            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                                <i class="bx bx-menu bx-sm"></i>
                            </a>
                        </div>

                        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

                            @include('layouts.headbar')
                        </div>


                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">

                        <!-- Users List Table -->
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h5 class="card-title">List Pengguna Aplikasi</h5>

                                {{-- @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <h6 class="alert-heading mb-1">
                                            <i class="bx bx-xs bx-store align-top me-2"></i>Danger!
                                        </h6>
                                        <span>

                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>

                                        </span>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif --}}

                                <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                                    <div class="col-md-4 user_role"></div>

                                </div>
                            </div>
                            <div class="card-datatable table-responsive">
                                <table class="datatables-users table border-top">
                                    <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>Nama Lengkap</th>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>




                                </table>
                            </div>

                            @include('offcanvas.edit_user')
                            @include('offcanvas.add_new_user')

                        </div>
                    </div>
                    <!-- / Content -->

                    @include('layouts.footer')

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->
@endsection

@section('addScript')
    {{-- <script src="{{ asset('/') }}assets/vendor/libs/jquery/jquery.js"></script> --}}

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    <script src="{{ asset('/') }}assets/vendor/libs/moment/moment.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/select2/select2.js"></script>\
    <script src="{{ asset('/') }}assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/cleavejs/cleave-phone.js"></script>

    <!-- Page JS -->
    {{-- <script src="{{ asset('/') }}assets/js/app-user-list.js"></script> --}}

    {{-- <script>
        $(document).ready(function() {
            $("#submitBtn").click(function() {
                $("#addNewUserForm").submit(); // Submit the form
            });
        });
    </script> --}}



    <script>
        $(document).ready(function() {
            $(function() {
                    let t, a, n;
                    n = (isDarkStyle ?
                        ((t = config.colors_dark.borderColor),
                            (a = config.colors_dark.bodyBg),
                            config.colors_dark) :
                        ((t = config.colors.borderColor),
                            (a = config.colors.bodyBg),
                            config.colors)
                    ).headingColor;
                    var e,
                        s = $(".datatables-users"),
                        o = $(".select2"),
                        r = "app-user-view-account.html",
                        l = {
                            1: {
                                title: "Pending",
                                class: "bg-label-warning"
                            },
                            2: {
                                title: "Active",
                                class: "bg-label-success"
                            },
                            3: {
                                title: "Inactive",
                                class: "bg-label-secondary"
                            }
                        };
                    o.length &&
                        (o = o).wrap('<div class="position-relative"></div>').select2({
                            placeholder: "Select Country",
                            dropdownParent: o.parent()
                        }),
                        s.length &&
                        (e = s.DataTable({
                            ajax: "{{ route('kelola_pengguna.users') }}",
                            columns: [{
                                    data: "id",
                                }, {
                                    data: 'name',
                                    name: 'name'
                                },
                                {
                                    data: 'username',
                                    name: 'username'
                                },
                                {
                                    data: 'role',
                                    name: 'role'
                                },
                                {
                                    data: 'status',
                                },
                                {
                                    data: 'action',
                                },
                            ],
                            columnDefs: [{
                                    className: "control",
                                    searchable: !1,
                                    orderable: !1,
                                    responsivePriority: 2,

                                    render: function(e, t, a, n) {
                                        return "";
                                    },
                                },
                                {
                                    targets: 1,
                                    responsivePriority: 4,
                                    render: function(e, t, a, n) {
                                        var s = a.name,
                                            o = a.username,
                                            l = a.avatar;
                                        return (
                                            '<div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3">' +
                                            (l ?
                                                '<img src="' +
                                                assetsPath +
                                                "img/avatars/" +
                                                l +
                                                '" alt="Avatar" class="rounded-circle">' :
                                                '<span class="avatar-initial rounded-circle bg-label-' +
                                                [
                                                    "success",
                                                    "danger",
                                                    "warning",
                                                    "info",
                                                    "dark",
                                                    "primary",
                                                    "secondary",
                                                ][Math.floor(6 * Math.random())] +
                                                '">' +
                                                (l = (
                                                    ((l = (s = a.full_name).match(
                                                            /\b\w/g) || []).shift() ||
                                                        "") + (l.pop() || "")
                                                ).toUpperCase()) +
                                                "</span>") +
                                            '</div></div><div class="d-flex flex-column"><a href="' +
                                            r +
                                            '" class="text-body text-truncate"><span class="fw-semibold">' +
                                            s +
                                            '</span></a><small class="text-muted">' +
                                            o +
                                            "</small></div></div>"
                                        );
                                    },
                                },
                                {
                                    targets: 4,
                                    title: "Status",
                                    searchable: !1,
                                    orderable: !1,
                                    render: function(e, t, a, n) {
                                        var s = a.status;
                                        var status = "";
                                        var checked = "checked"

                                        if (s == 1) {
                                            status = "Aktif";
                                        } else {
                                            checked = "";
                                            status = "Tidak aktif";
                                        }

                                        // return (
                                        //     '<span class = "badge rounded-pill bg-' +
                                        //     badge + '">' + status + '</span>'
                                        // );

                                        return ('<label class="switch"><input data-id="' + a
                                            .id +
                                            '" id="activate-acc" type="checkbox" class="switch-input"' +
                                            checked +
                                            '/><span class="switch-toggle-slider"><span class="switch-on"></span><span class="switch-off"></span></span><span class="switch-label switch-activate" id="switch-activate" >' +
                                            status + '</span></label>')
                                    },
                                },
                                {
                                    targets: -1,
                                    title: "Actions",
                                    searchable: !1,
                                    orderable: !1,
                                    render: function(e, t, a, n) {
                                        var s = "/kelola_pengguna/delete/" + a.id;

                                        return (
                                            '<div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon btn-edit" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditUser" data-name="' +
                                            a.name +
                                            '" data-username="' + a.username +
                                            '" data-role="' + a.role +
                                            '" data-avatar="' + a.avatar +
                                            '" data-id="' + a.id +
                                            '" data-password="' + a.password +
                                            '"><i class="bx bx-edit"></i></button><a class="btn btn-sm btn-icon delete-record" href="' +
                                            s + '"><i class="bx bx-trash"></i></a>'
                                        );
                                    },
                                }
                            ],
                            order: [
                                [1, "asc"]
                            ],
                            dom: '<"row mx-2"<"col-md-2"<"me-3"l>><"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                            language: {
                                sLengthMenu: "_MENU_",
                                search: "",
                                searchPlaceholder: "Cari.."
                            },
                            buttons: [{
                                    extend: "collection",
                                    className: "btn btn-label-secondary dropdown-toggle mx-3",
                                    text: '<i class="bx bx-upload me-1"></i>Export',
                                    buttons: [{
                                            extend: "print",
                                            text: '<i class="bx bx-printer me-2" ></i>Print',
                                            className: "dropdown-item",
                                            exportOptions: {
                                                columns: [1, 2, 3],
                                                format: {
                                                    body: function(e, t, a) {
                                                        var n;
                                                        return e.length <= 0 ?
                                                            e :
                                                            ((e = $.parseHTML(e)),
                                                                (n = ""),
                                                                $.each(e, function(e, t) {
                                                                    void 0 !== t
                                                                        .classList &&
                                                                        t.classList
                                                                        .contains(
                                                                            "user-name"
                                                                        ) ?
                                                                        (n +=
                                                                            t.lastChild
                                                                            .firstChild
                                                                            .textContent
                                                                        ) :
                                                                        void 0 ===
                                                                        t.innerText ?
                                                                        (n += t
                                                                            .textContent
                                                                        ) :
                                                                        (n += t
                                                                            .innerText);
                                                                }),
                                                                n);
                                                    }
                                                }
                                            },
                                            customize: function(e) {
                                                $(e.document.body)
                                                    .css("color", n)
                                                    .css("border-color", t)
                                                    .css("background-color", a),
                                                    $(e.document.body)
                                                    .find("table")
                                                    .addClass("compact")
                                                    .css("color", "inherit")
                                                    .css("border-color", "inherit")
                                                    .css("background-color", "inherit");
                                            }
                                        },
                                        {
                                            extend: "csv",
                                            text: '<i class="bx bx-file me-2" ></i>Csv',
                                            className: "dropdown-item",
                                            exportOptions: {
                                                columns: [1, 2, 3],
                                                format: {
                                                    body: function(e, t, a) {
                                                        var n;
                                                        return e.length <= 0 ?
                                                            e :
                                                            ((e = $.parseHTML(e)),
                                                                (n = ""),
                                                                $.each(e, function(e, t) {
                                                                    void 0 !== t
                                                                        .classList &&
                                                                        t.classList
                                                                        .contains(
                                                                            "user-name"
                                                                        ) ?
                                                                        (n +=
                                                                            t.lastChild
                                                                            .firstChild
                                                                            .textContent
                                                                        ) :
                                                                        void 0 ===
                                                                        t.innerText ?
                                                                        (n += t
                                                                            .textContent
                                                                        ) :
                                                                        (n += t
                                                                            .innerText);
                                                                }),
                                                                n);
                                                    }
                                                }
                                            }
                                        },
                                        {
                                            extend: "excel",
                                            text: '<i class="bx bxs-file-export me-2"></i>Excel',
                                            className: "dropdown-item",
                                            exportOptions: {
                                                columns: [1, 2, 3],
                                                format: {
                                                    body: function(e, t, a) {
                                                        var n;
                                                        return e.length <= 0 ?
                                                            e :
                                                            ((e = $.parseHTML(e)),
                                                                (n = ""),
                                                                $.each(e, function(e, t) {
                                                                    void 0 !== t
                                                                        .classList &&
                                                                        t.classList
                                                                        .contains(
                                                                            "user-name"
                                                                        ) ?
                                                                        (n +=
                                                                            t.lastChild
                                                                            .firstChild
                                                                            .textContent
                                                                        ) :
                                                                        void 0 ===
                                                                        t.innerText ?
                                                                        (n += t
                                                                            .textContent
                                                                        ) :
                                                                        (n += t
                                                                            .innerText);
                                                                }),
                                                                n);
                                                    }
                                                }
                                            }
                                        },
                                        {
                                            extend: "pdf",
                                            text: '<i class="bx bxs-file-pdf me-2"></i>Pdf',
                                            className: "dropdown-item",
                                            exportOptions: {
                                                columns: [1, 2, 3],
                                                format: {
                                                    body: function(e, t, a) {
                                                        var n;
                                                        return e.length <= 0 ?
                                                            e :
                                                            ((e = $.parseHTML(e)),
                                                                (n = ""),
                                                                $.each(e, function(e, t) {
                                                                    void 0 !== t
                                                                        .classList &&
                                                                        t.classList
                                                                        .contains(
                                                                            "user-name"
                                                                        ) ?
                                                                        (n +=
                                                                            t.lastChild
                                                                            .firstChild
                                                                            .textContent
                                                                        ) :
                                                                        void 0 ===
                                                                        t.innerText ?
                                                                        (n += t
                                                                            .textContent
                                                                        ) :
                                                                        (n += t
                                                                            .innerText);
                                                                }),
                                                                n);
                                                    }
                                                }
                                            }
                                        },
                                        {
                                            extend: "copy",
                                            text: '<i class="bx bx-copy me-2" ></i>Copy',
                                            className: "dropdown-item",
                                            exportOptions: {
                                                columns: [1, 2, 3],
                                                format: {
                                                    body: function(e, t, a) {
                                                        var n;
                                                        return e.length <= 0 ?
                                                            e :
                                                            ((e = $.parseHTML(e)),
                                                                (n = ""),
                                                                $.each(e, function(e, t) {
                                                                    void 0 !== t
                                                                        .classList &&
                                                                        t.classList
                                                                        .contains(
                                                                            "user-name"
                                                                        ) ?
                                                                        (n +=
                                                                            t.lastChild
                                                                            .firstChild
                                                                            .textContent
                                                                        ) :
                                                                        void 0 ===
                                                                        t.innerText ?
                                                                        (n += t
                                                                            .textContent
                                                                        ) :
                                                                        (n += t
                                                                            .innerText);
                                                                }),
                                                                n);
                                                    }
                                                }
                                            }
                                        }
                                    ]
                                },
                                {
                                    text: '<i class="bx bx-plus me-0 me-lg-2"></i><span class="d-none d-lg-inline-block">Tambah Pengguna Baru</span>',
                                    className: "add-new btn btn-primary",
                                    attr: {
                                        "data-bs-toggle": "offcanvas",
                                        "data-bs-target": "#offcanvasAddUser"
                                    }
                                }
                            ],
                            responsive: {
                                details: {
                                    display: $.fn.dataTable.Responsive.display.modal({
                                        header: function(e) {
                                            return "Details of " + e.data().full_name;
                                        }
                                    }),
                                    type: "column",
                                    renderer: function(e, t, a) {
                                        a = $.map(a, function(e, t) {
                                            return "" !== e.title ?
                                                '<tr data-dt-row="' +
                                                e.rowIndex +
                                                '" data-dt-column="' +
                                                e.columnIndex +
                                                '"><td>' +
                                                e.title +
                                                ":</td> <td>" +
                                                e.data +
                                                "</td></tr>" :
                                                "";
                                        }).join("");
                                        return (
                                            !!a &&
                                            $('<table class="table"/><tbody />').append(a)
                                        );
                                    }
                                }
                            },
                            initComplete: function() {
                                this.api()
                                    .columns(3)
                                    .every(function() {
                                        var t = this,
                                            a = $(
                                                '<select id="UserRole" class="form-select text-capitalize"><option value=""> Select Role </option></select>'
                                            )
                                            .appendTo(".user_role")
                                            .on("change", function() {
                                                var e = $.fn.dataTable.util.escapeRegex(
                                                    $(this).val()
                                                );
                                                t.search(
                                                    e ? "^" + e + "$" : "",
                                                    !0,
                                                    !1
                                                ).draw();
                                            });
                                        t.data()
                                            .unique()
                                            .sort()
                                            .each(function(e, t) {
                                                a.append(
                                                    '<option value="' +
                                                    e +
                                                    '">' +
                                                    e +
                                                    "</option>"
                                                );
                                            });
                                    })
                            }
                        })),
                        $(".datatables-users tbody").on("click", ".delete-record", function(e) {

                            const url = $(this).attr('href');
                            // var token = $(this).value("token");
                            e.preventDefault();
                            // swal({
                            //     title: "Are you sure you want to delete this record?",
                            //     text: "If you delete this, it will be gone forever.",
                            //     icon: "warning",
                            //     type: "warning",
                            //     buttons: ["Cancel", "Yes!"],
                            //     confirmButtonColor: '#3085d6',
                            //     cancelButtonColor: '#d33',
                            //     confirmButtonText: 'Yes, delete it!'
                            // }).then((willDelete) => {
                            //     if (willDelete) {
                            //         window.location.href = url;
                            //         // alert(url)
                            //     }
                            // });

                            swal({
                                    title: "Are you sure you want to delete this record?",
                                    text: "If you delete this, it will be gone forever.",
                                    icon: "warning",
                                    buttons: ["Batal", "Ya!"],
                                    dangerMode: true,
                                    confirmButtonText: 'Ya, hapus data itu!'
                                })
                                .then((willDelete) => {
                                    if (willDelete) {
                                        window.location.href = url;
                                    } else {
                                        swal("Data batal dihapus!");
                                    }
                                });


                        }),
                        $(".datatables-users tbody").on("click", ".btn-edit", function(e) {


                            $('#editUserForm')[0].reset();

                            var name = $(this).data('name');
                            var username = $(this).data('username');
                            var role = $(this).data('role');
                            var avatar = $(this).data('avatar');
                            var id = $(this).data('id');
                            var password = $(this).data('password');

                            $(".offcanvas-body #id_user").val(id);
                            $(".offcanvas-body #avatar_old").val(avatar);
                            $(".offcanvas-body #password_old").val(password);
                            $(".offcanvas-body #username").val(username);
                            $(".offcanvas-body #name").val(name);
                            $(".offcanvas-body #role").val(role).change();
                            $(".offcanvas-body .img-preview").attr("src",
                                "{{ asset('/') }}assets/img/avatars/" + avatar);
                            // As pointed out in comments, 
                            // it is unnecessary to have to manually call the modal.
                            // $('#addBookDialog').modal('show');

                        }),
                        $(".datatables-users tbody").on("click", ".switch", function(e) {

                            e.preventDefault();
                            var id = $(this).find('.switch-input').data('id');

                            // switch-label
                            var label = $(this).find('.switch-activate').html().trim();

                            // alert(id)

                            if (label === "Aktif") {
                                $(this).find('.switch-activate').html(
                                    "Tidak aktif"
                                );
                                $(this).find('.switch-input').attr('checked', false);
                            } else if (label === "Tidak aktif") {
                                $(this).find('.switch-activate').html(
                                    "Aktif");
                                $(this).find('.switch-input').attr('checked', true);
                            }


                            $.ajax({
                                url: '/kelola_pengguna/update_status/' + id,
                                method: 'GET',
                                success: function(response) {
                                    // Handle success response
                                    console.log(response);
                                },
                                error: function(response) {
                                    // Handle error response
                                    console.log(response);
                                }
                            });

                        }),

                        $(".add-new").on("click", function(e) {

                            $('#addNewUserForm')[0].reset();
                            // alert('aok')
                            // As pointed out in comments, 
                            // it is unnecessary to have to manually call the modal.
                            // $('#addBookDialog').modal('show');

                        }),
                        setTimeout(() => {
                            $(".dataTables_filter .form-control").removeClass(
                                    "form-control-sm"
                                ),
                                $(".dataTables_length .form-select").removeClass(
                                    "form-select-sm"
                                );
                        }, 300);
                }),
                (function() {
                    // c.preventDefault();
                    var e = document.querySelectorAll(".phone-mask"),
                        t = document.getElementById("addNewUserForm");
                    e &&
                        e.forEach(function(e) {
                            new Cleave(e, {
                                phone: !0,
                                phoneRegionCode: "US"
                            });
                        }),
                        FormValidation.formValidation(t, {
                            fields: {
                                name: {
                                    validators: {
                                        notEmpty: {
                                            message: "Masukkan nama lengkap pengguna"
                                        }
                                    }
                                },
                                username: {
                                    validators: {
                                        notEmpty: {
                                            message: "Masukkan username pengguna"
                                        }
                                    }
                                },
                                avatar: {
                                    validators: {
                                        notEmpty: {
                                            message: "Pilih foto terlebih"
                                        }
                                    }
                                },
                                password: {
                                    validators: {
                                        notEmpty: {
                                            message: "Please enter your password"
                                        }
                                    }
                                },
                                confirm_password: {
                                    validators: {
                                        notEmpty: {
                                            message: "Please confirm password"
                                        },
                                        identical: {
                                            compare: function() {
                                                return t.querySelector(
                                                    '[name="password"]'
                                                ).value;
                                            },
                                            message: "The password and its confirm are not the same"
                                        }
                                    }
                                },

                            },
                            plugins: {
                                trigger: new FormValidation.plugins.Trigger(),
                                bootstrap5: new FormValidation.plugins.Bootstrap5({
                                    eleValidClass: "",
                                    rowSelector: function(e, t) {
                                        return ".mb-3";
                                    }
                                }),
                                submitButton: new FormValidation.plugins.SubmitButton(),
                                defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                                autoFocus: new FormValidation.plugins.AutoFocus()
                            }
                        });
                })(), (function() {
                    // c.preventDefault();
                    var e = document.querySelectorAll(".phone-mask"),
                        t = document.getElementById("editUserForm");
                    e &&
                        e.forEach(function(e) {
                            new Cleave(e, {
                                phone: !0,
                                phoneRegionCode: "US"
                            });
                        }),
                        FormValidation.formValidation(t, {
                            fields: {
                                name: {
                                    validators: {
                                        notEmpty: {
                                            message: "Masukkan nama lengkap pengguna"
                                        }
                                    }
                                },
                                username: {
                                    validators: {
                                        notEmpty: {
                                            message: "Masukkan username pengguna"
                                        }
                                    }
                                },

                                confirm_password: {
                                    validators: {
                                        identical: {
                                            compare: function() {
                                                return t.querySelector(
                                                    '[name="password"]'
                                                ).value;
                                            },
                                            message: "The password and its confirm are not the same"
                                        }
                                    }
                                },

                            },
                            plugins: {
                                trigger: new FormValidation.plugins.Trigger(),
                                bootstrap5: new FormValidation.plugins.Bootstrap5({
                                    eleValidClass: "",
                                    rowSelector: function(e, t) {
                                        return ".mb-3";
                                    }
                                }),
                                submitButton: new FormValidation.plugins.SubmitButton(),
                                defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                                autoFocus: new FormValidation.plugins.AutoFocus()
                            }
                        });
                })();

        });
    </script>

    @if ($message = Session::get('success'))
        <script>
            swal({
                title: "{{ $message }}",
                icon: "success",
                button: "Ok!",
            });
        </script>
    @endif



    <script>
        function preview_img() {

            const avatar = document.querySelector('#avatar_add');
            const sampulLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview-add');

            avatar.textContent = avatar.files[0].name;

            const fileAvatar = new FileReader();
            fileAvatar.readAsDataURL(avatar.files[0]);

            fileAvatar.onload = function(e) {
                imgPreview.src = e.target.result;
            }

        }

        function preview_img_2() {

            const avatar = document.querySelector('#avatar');
            const sampulLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');

            avatar.textContent = avatar.files[0].name;

            const fileAvatar = new FileReader();
            fileAvatar.readAsDataURL(avatar.files[0]);

            fileAvatar.onload = function(e) {
                imgPreview.src = e.target.result;
            }

        }
    </script>

    <script>
        $(".add-new").click(function() {
            alert("Handler for .click() called.");
        });
    </script>

    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#offcanvasAddUser').offcanvas('show')
            });
        </script>
    @endif
@endsection
