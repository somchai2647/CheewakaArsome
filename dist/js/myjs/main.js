$(document).ready(function() {

    // $('#content').load('html/contants/users/mainpage.php');
    // $('#btnmainpage').addClass('active');
    $('.btnimgproduct').click(function(e) {
      e.preventDefault();
      $('#p_picture').click();
    });

    $('#p_picture').change(function(e) {
      let filename = e.target.files[0].name;
      $('#filename').text(filename);
    });
    $('#addproductform').on('submit', function(e) {
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: "controller/upload.php",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(response) {
          if (response == 1) {
            Swal.fire(
              'Success',
              'เพิ่มสินค้าเสร็จสิ้น',
              'success'
            ).then((result) => {
              $('#addproductform')[0].reset();
              $('addproductModal').modal('toggle');
              window.location.reload();
            });
          } else {
            Swal.fire(
              'เกิดข้อผิดพลาดขึ้น',
              'ติดต่อเจ้าหน้าที่',
              'error'
            ).then((result) => {
              $('#addproductform')[0].reset();
              $('addproductModal').modal('toggle');
              window.location.reload();
            });
          }

        }
      });
    });
    $('.delpro').click(function(e) {
      e.preventDefault();
      let id = $($(this).parents("div.card")[0]).attr('id');
      let name = $($(this).parents("div.card")[0]).attr('name');
      let delpro = "";
      Swal.fire({
        title: 'คุณต้องการลบหรือไม่?',
        text: "ข้อมูลสินค้าจะไม่สามารถเรียกกลับคืนได้",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ยืนยัน',
        cancelButtonText: 'ยกเลิก'
      }).then((result) => {
        if (result.value) {
          $.ajax({
            type: "post",
            url: "controller/manage_product.php",
            data: {
              id,
              delpro
            },
            success: function(response) {
              if (response == 1) {
                Swal.fire(
                  'ลบสินค้าสำเร็จ',
                  `สินค้า ${name} ถูกลบแล้ว!!`,
                  'success'
                ).then(function() {
                  window.location.reload();
                });
              } else {
                Swal.fire(
                  'เกิดข้อผิดพลาด',
                  `ไม่สามารถลบได้`,
                  'error'
                ).then(function() {
                  window.location.reload();
                });
              }
            }
          });
        }
      })
    });
    $('.editproduct').click(function(e) {
      e.preventDefault();
      let id = $($(this).parents("div.card")[0]).attr('id');
      let editpro = "";
      $.ajax({
        type: "post",
        url: "controller/manage_product.php",
        data: {
          id,
          editpro
        },
        success: function(response) {
          $('#areaeditpro').html(response);
          $('#editproductmodal').modal('show');
        }
      });
    });
    $('.nbtn').click(function(e) {
      e.preventDefault();
      let savepage = $(this).attr('page');
      if (savepage != "") {
        $.ajax({
          type: "post",
          url: "controller/savepage.php",
          data: {
            savepage: savepage
          },
          success: function(response) {
            window.location.reload();
          }
        });
      }
    });
    $('#editproductform').on('submit', function(e) {
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: "controller/manage_product.php",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(response) {
          if (response == 1) {
            $('editproductModal').modal('toggle');
            Swal.fire(
              'Success',
              'แก้ไขสินค้าเสร็จสิ้น',
              'success'
            ).then((result) => {
              $('#editproductform')[0].reset();
              window.location.reload();
            });
          } else {
            Swal.fire(
              'เกิดข้อผิดพลาดขึ้น',
              'ติดต่อเจ้าหน้าที่',
              'error'
            ).then((result) => {
              $('#editproductform')[0].reset();
              window.location.reload();
            });
          }
        }
      });
    });
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });