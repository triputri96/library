// Tutup pesan saat tombol close diklik
document
  .getElementById("alertMessage")
  .addEventListener("closed.bs.alert", function () {
    // Tindakan tambahan yang dapat Anda lakukan setelah pesan ditutup
    console.log("Alert ditutup");
  });
