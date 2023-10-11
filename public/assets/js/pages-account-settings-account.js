"use strict";
document.addEventListener("DOMContentLoaded", function(e) {
    {
        const o = document.querySelector("#formAccountSettings"),
            a = document.querySelector("#formAccountDeactivation"),
            i = a.querySelector(".deactivate-account"),
            s =
                (o &&
                    FormValidation.formValidation(o, {
                        fields: {
                            name: {
                                validators: {
                                    notEmpty: {
                                        message: "Nama lengkap harus diisi"
                                    }
                                }
                            },
                            username: {
                                validators: {
                                    notEmpty: {
                                        message: "Username harus diisi"
                                    }
                                }
                            },
                            role: {
                                validators: {
                                    notEmpty: {
                                        message: "Pilih role terlebih dahulu"
                                    }
                                }
                            }
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap5: new FormValidation.plugins.Bootstrap5({
                                eleValidClass: "",
                                rowSelector: ".col-md-6"
                            }),
                            submitButton: new FormValidation.plugins.SubmitButton(),
                            defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                            autoFocus: new FormValidation.plugins.AutoFocus()
                        },
                        init: e => {
                            e.on("plugins.message.placed", function(e) {
                                e.element.parentElement.classList.contains(
                                    "input-group"
                                ) &&
                                    e.element.parentElement.insertAdjacentElement(
                                        "afterend",
                                        e.messageElement
                                    );
                            });
                        }
                    }),
                a &&
                    FormValidation.formValidation(a, {
                        fields: {
                            accountActivation: {
                                validators: {
                                    notEmpty: {
                                        message:
                                            "Harap konfirmasi bahwa Anda ingin menghapus akun"
                                    }
                                }
                            }
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap5: new FormValidation.plugins.Bootstrap5({
                                eleValidClass: ""
                            }),
                            submitButton: new FormValidation.plugins.SubmitButton(),
                            fieldStatus: new FormValidation.plugins.FieldStatus(
                                {
                                    onStatusChanged: function(e) {
                                        e
                                            ? i.removeAttribute("disabled")
                                            : i.setAttribute(
                                                  "disabled",
                                                  "disabled"
                                              );
                                    }
                                }
                            ),
                            autoFocus: new FormValidation.plugins.AutoFocus()
                        },
                        init: e => {
                            e.on("plugins.message.placed", function(e) {
                                e.element.parentElement.classList.contains(
                                    "input-group"
                                ) &&
                                    e.element.parentElement.insertAdjacentElement(
                                        "afterend",
                                        e.messageElement
                                    );
                            });
                        }
                    }),
                document.querySelector("#accountActivation"));
        i &&
            (i.onclick = function() {
                1 == s.checked &&
                    swal({
                        text:
                            "Are you sure you would like to deactivate your account?",
                        icon: "warning",
                        showCancelButton: !0,
                        buttons: ["Batal", "Ya!"],
                        buttons: ["Batal", "Ya!"],
                        dangerMode: true,
                        confirmButtonText: "Ya, hapus data itu!"
                    }).then(willDelete => {
                        if (willDelete) {
                            // alert("ok");
                            $("#formAccountDeactivation").submit();
                        } else {
                            swal("Data batal dihapus!");
                        }
                    });
            });
        var t = document.querySelector("#phoneNumber"),
            n = document.querySelector("#zipCode");
        t && new Cleave(t, { phone: !0, phoneRegionCode: "US" }),
            n && new Cleave(n, { delimiter: "", numeral: !0 });
        let e = document.getElementById("uploadedAvatar");
        const l = document.querySelector(".account-file-input"),
            c = document.querySelector(".account-image-reset");
        if (e) {
            const r = e.src;
            (l.onchange = () => {
                l.files[0] && (e.src = window.URL.createObjectURL(l.files[0]));
            }),
                (c.onclick = () => {
                    (l.value = ""), (e.src = r);
                });
        }
    }
}),
    $(function() {
        var e = $(".select2");
        e.length &&
            e.each(function() {
                var e = $(this);
                e.wrap('<div class="position-relative"></div>'),
                    e.select2({ dropdownParent: e.parent() });
            });
    });
