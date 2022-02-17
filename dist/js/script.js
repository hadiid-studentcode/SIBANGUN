jQuery(document).ready(function ($) {
  $("#nmpembeli").on("keyup", function () {
    var nmpembeli = parseInt($(this).val());
    var ungdibyr = parseInt($("#ungdibyr").val());
    var tambah = $("#opsi").val();

    if (tambah == "-") {
      total = nmpembeli - ungdibyr;
    } 

    $("#ungkembalian").val(total);
  });

  $("#ungdibyr").on("keyup", function () {
    var nmpembeli = parseInt($("#nmpembeli").val());
    var ungdibyr = parseInt($(this).val());
    var tambah = $("#opsi").val();

    if (tambah == "-") {
      total = nmpembeli - ungdibyr;
    } 

    $("#ungkembalian").val(total);
  });

  $("#tambah").on("change", function () {
    var nmpembeli = parseInt($("#nmpembeli").val());
    var ungdibyr = parseInt($("#ungdibyr").val());
    var tambah = $(this).val();
    if (tambah == "+") {
      total = nmpembeli - ungdibyr;
    } 

    $("#ungkembalian").val(total);
  });
});
