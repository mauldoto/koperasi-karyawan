window.onload = () => {
  const baseURL = document.querySelector('meta[name="baseURL"]').content;
  console.log(baseURL);
  $("#loadbtn").on("click", function () {
    let data = {};
    data.koderumah = $("#kodePerumahan").val();
    data.nopintu = $("#noPintu").val();
  });

  $(".nik-select2").select2({
    placeholder: "Ketik Nik atau Nama Karyawan disini",
    minimumInputLength: 3,
    ajax: {
      url: baseURL + "/blockuser/select2",
      dataType: "json",
      delay: 250,
      data: function (params) {
        return {
          search: params.term, // search term
        };
      },
      processResults: function (data) {
        // Transforms the top-level key of the response object from 'items' to 'results'
        return {
          results: data,
        };
      },
      // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
    },
  });

  // $(".nik-select2").change(function () {
  //   getStatusBlock();
  // });

  function getStatusBlock() {
    const nik = $("[name='filterNik']").val();
    $(".detail").slideUp();
    $.ajax({
      url: baseURL + "/BlockUser/detail?nik=" + nik,
      type: "get",
      success: function (results) {
        const data = JSON.parse(results);
        console.log(data);
        const anggota = data.anggota;
        const status = data.status;
        if (anggota) {
          $("#resNik").html(anggota.kode);
          $("#resName").html(anggota.nama);
          const statusElm = status
            ? "<span style='background-color:red; padding:2px;'>Diblokir</span>"
            : "-";
          $("#resStatus").html(statusElm);
          // $("#isLoaded").val(karyawan.EMPCODE);

          $(".detail").slideDown();
        } else {
          alert("Nik tidak terdaftar!!");
        }

        //setAnswer(jawaban);
      },
    });
  }
};
