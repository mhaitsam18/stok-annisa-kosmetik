"use strict";
!(function() {
    var a = document.querySelector("#TagifyBasic"),
        a = (new Tagify(a), document.querySelector("#TagifyReadonly")),
        a =
            (new Tagify(a),
            document.querySelector("#TagifyCustomInlineSuggestion")),
        e = document.querySelector("#TagifyCustomListSuggestion"),
        t = [
            "A# .NET",
            "A# (Axiom)",
            "A-0 System",
            "A+",
            "A++",
            "ABAP",
            "ABC",
            "ABC ALGOL",
            "ABSET",
            "ABSYS",
            "ACC",
            "Accent",
            "Ace DASL",
            "ACL2",
            "Avicsoft",
            "ACT-III",
            "Action!",
            "ActionScript",
            "Ada",
            "Adenine",
            "Agda",
            "Agilent VEE",
            "Agora",
            "AIMMS",
            "Alef",
            "ALF",
            "ALGOL 58",
            "ALGOL 60",
            "ALGOL 68",
            "ALGOL W",
            "Alice",
            "Alma-0",
            "AmbientTalk",
            "Amiga E",
            "AMOS",
            "AMPL",
            "Apex (Salesforce.com)",
            "APL",
            "AppleScript",
            "Arc",
            "ARexx",
            "Argus",
            "AspectJ",
            "Assembly language",
            "ATS",
            "Ateji PX",
            "AutoHotkey",
            "Autocoder",
            "AutoIt",
            "AutoLISP / Visual LISP",
            "Averest",
            "AWK",
            "Axum",
            "Active Server Pages",
            "ASP.NET"
        ],
        a =
            (new Tagify(a, {
                whitelist: t,
                maxTags: 10,
                dropdown: {
                    maxItems: 20,
                    classname: "tags-inline",
                    enabled: 0,
                    closeOnSelect: !1
                }
            }),
            new Tagify(e, {
                whitelist: t,
                maxTags: 10,
                dropdown: {
                    maxItems: 20,
                    classname: "",
                    enabled: 0,
                    closeOnSelect: !1
                }
            }),
            document.querySelector("#TagifyUserList"));

    var url = "/menu/get_all_menu";
    fetch(url, {
        method: "GET", // Metode HTTP yang digunakan
        headers: {
            "Content-Type": "application/json" // Header permintaan, contoh disini adalah pengaturan Content-Type sebagai application/json
        }
    }) // Ganti "whitelist.json" dengan URL atau path file JSON Anda
        .then(response => response.json()) // Mengambil response JSON
        .then(data => {
            // Data whitelist tersedia di sini, dapat digunakan untuk inisialisasi Tagify
            let i = new Tagify(a, {
                tagTextProp: "name",
                // enforceWhitelist: false,
                skipInvalid: true,
                dropdown: {
                    closeOnSelect: false,
                    enabled: 0,
                    classname: "users-list",
                    searchKeys: ["nama_menu", "harga"]
                },
                templates: {
                    tag: function(a) {
                        // console.log(assetsPath + "json/whitelist.json");
                        return `
          <tag title="${a.title || a.nama_menu}"
            contenteditable='false'
            spellcheck='false'
            tabIndex="-1"
            class="${this.settings.classNames.tag} ${a.class || ""}"
            ${this.getAttributes(a)}
          >
            <x title='' class='tagify__tag__removeBtn' role='button' aria-label='remove tag'></x>
            <div>
              <div class='tagify__tag__avatar-wrap'>
                <img onerror="this.style.visibility='hidden'" src="${assetsPath +
                    "img/menu/" +
                    a.gambar}">
              </div>
              <span class='tagify__tag-text' style="display:none">${
                  a.harga
              }</span>
              <span class='tagify__tag-text'>${a.nama_menu}</span>
            </div>
          </tag>
        `;
                    },
                    dropdownItem: function(a) {
                        return `
          <div ${this.getAttributes(a)}
            class='tagify__dropdown__item align-items-center ${a.class || ""}'
            tabindex="0"
            role="option"
          >
            ${
                a.gambar
                    ? `<div class='tagify__dropdown__item__avatar-wrap'>
                <img onerror="this.style.visibility='hidden'" src="${assetsPath +
                    "img/menu/" +
                    a.gambar}">
              </div>`
                    : ""
            }
            <strong>${a.nama_menu}</strong>
            <span>${formatRupiah(a.harga)}</span>
          </div>
        `;
                    }
                },
                whitelist: data
            });

            // Fungsi untuk mengubah angka menjadi format rupiah
            function formatRupiah(angka) {
                let rupiah = "";
                let angkaRev = angka
                    .toString()
                    .split("")
                    .reverse()
                    .join("");
                for (let i = 0; i < angkaRev.length; i++) {
                    if (i % 3 === 0) {
                        rupiah += angkaRev.substr(i, 3) + ".";
                    }
                }
                return (
                    "Rp. " +
                    rupiah
                        .split("", rupiah.length - 1)
                        .reverse()
                        .join("")
                );
            }

            var total = 0;
            i.on("dropdown:select", function(a) {
                // e.stopPropagation();

                let selectedData = a.detail.data;
                let harga = selectedData.harga;

                var harga2 = harga;

                total += parseFloat(harga2);

                // Mengubah nilai total menjadi format rupiah
                let formattedTotal = formatRupiah(total);

                // Mengupdate nilai total pada elemen dengan id "total"
                $("#total").text(formattedTotal);

                let inputKembalian = document.getElementById("kembalian")
                    .innerText;
                // Menghapus karakter selain angka
                inputKembalian = inputKembalian.replace(/[^0-9-]/g, "");
                // Mengubah input kembalian menjadi angka
                inputKembalian = parseInt(inputKembalian);

                let kembalian = parseFloat(inputKembalian) - parseFloat(harga);
                document.getElementById("kembalian").innerText = formatRupiah(
                    kembalian
                );
            });

            // Fungsi untuk membatasi input hanya menerima angka
            $(".angka").on("input", function() {
                // Mengambil nilai input
                var value = $(this).val();
                // Menghapus semua karakter selain angka
                value = value.replace(/[^0-9]/g, "");
                // Menyimpan nilai yang sudah dihapus karakter selain angka kembali ke input
                $(this).val(value);
            });

            // Fungsi untuk mengubah format input menjadi rupiah
            $(".rupiah").on("input", function() {
                // Mengambil nilai input
                var value = $(this).val();
                // Menghapus semua karakter selain angka
                value = value.replace(/[^0-9]/g, "");
                // Mengubah nilai menjadi format rupiah
                value = formatRupiah(value);

                $(this).val(value);

                // console.log(value);

                var kembalian = hitungKembalian(value, total);
                document.getElementById("kembalian").innerText = kembalian;
            });

            document.addEventListener("click", function(event) {
                if (event.target.matches(".tagify__tag__removeBtn")) {
                    // Mengambil data harga dari elemen tag yang akan dihapus
                    let tagElement = event.target.closest(".tagify__tag");
                    let harga = tagElement.querySelector(".tagify__tag-text")
                        .innerText;

                    // Mengurangi nilai total dengan harga yang dihapus
                    total -= parseFloat(harga);

                    // Mengubah nilai total menjadi format rupiah
                    let formattedTotal = formatRupiah(total);

                    // Mengupdate nilai total pada elemen dengan id "total"
                    $("#total").text(formattedTotal);

                    let inputKembalian = document.getElementById("kembalian")
                        .innerText;
                    // Menghapus karakter selain angka
                    inputKembalian = inputKembalian.replace(/[^0-9-]/g, "");
                    // Mengubah input kembalian menjadi angka
                    inputKembalian = parseInt(inputKembalian);

                    let kembalian = inputKembalian + parseFloat(harga);
                    document.getElementById(
                        "kembalian"
                    ).innerText = formatRupiah(kembalian);

                    console.log(kembalian);
                }
            });

            function hitungKembalian(angka, total_belanja) {
                var inputKembalian = angka;
                // Menghapus karakter selain angka
                inputKembalian = inputKembalian.replace(/[^0-9]/g, "");
                // Mengubah input kembalian menjadi angka
                inputKembalian = parseInt(inputKembalian);
                // Menghitung kembalian
                var kembalian = inputKembalian - total_belanja;
                // Mengubah kembalian menjadi format rupiah
                var formattedKembalian = formatRupiah(kembalian);
                // Menampilkan kembalian pada elemen dengan ID 'kembalian'
                return formattedKembalian;
            }
        })
        .catch(error => console.error(error));

    let n;
    e = Array.apply(null, Array(100)).map(function() {
        return (
            Array.apply(null, Array(~~(10 * Math.random() + 3)))
                .map(function() {
                    return String.fromCharCode(26 * Math.random() + 97);
                })
                .join("") + "@gmail.com"
        );
    });
    const l = document.querySelector("#TagifyEmailList"),
        r = new Tagify(l, {
            pattern: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
            whitelist: e,
            callbacks: {
                invalid: function(a) {
                    console.log("invalid", a.detail);
                }
            },
            dropdown: { position: "text", enabled: 1 }
        }),
        s = l.nextElementSibling;
    s.addEventListener("click", function() {
        r.addEmptyTag();
    });
})();
