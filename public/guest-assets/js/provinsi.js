var urlProvinsi = "https://ibnux.github.io/data-indonesia/provinsi.json";
var urlKabupaten = "https://ibnux.github.io/data-indonesia/kabupaten/";
var urlKecamatan = "https://ibnux.github.io/data-indonesia/kecamatan/";
var urlKelurahan = "https://ibnux.github.io/data-indonesia/kelurahan/";

function clearOptions(id) {
    console.log("on clearOptions :" + id);

    $("#" + id)
        .empty()
        .trigger("change");
}

$.getJSON(urlProvinsi, function (res) {
    res = $.map(res, function (obj) {
        obj.text = obj.nama;
        return obj;
    });

    // Mengurutkan data berdasarkan properti text (A-Z)
    res.sort(function (a, b) {
        var textA = a.text.toUpperCase();
        var textB = b.text.toUpperCase();
        if (textA < textB) {
            return -1;
        }
        if (textA > textB) {
            return 1;
        }
        return 0;
    });

    data = [
        {
            id: "",
            nama: "- Pilih Provinsi -",
            text: "- Pilih Provinsi -",
        },
    ].concat(res);

    //implemen data ke select provinsi
    $("#provinsi").select2({
        dropdownAutoWidth: true,
        width: "100%",
        data: data,
    });
});

var selectProv = $("#provinsi");
$(selectProv).change(function () {
    var text = $("#provinsi :selected").text();
    $("#hiddenProv").val(text);
});
