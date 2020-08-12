$(document).ready(function () {
  $(".addcart").click(function (e) {
    e.preventDefault();
    let id = $($(this).parents("div.card")[0]).attr("id");
    let price = $($(this).parents("div.card")[0]).attr("price");
    addcart = "";
    $.ajax({
      type: "post",
      url: "controller/cart.php",
      data: {
        id,
        addcart,
        price
      },
      success: function (response) {
        if (response == 1) {
          const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
              toast.addEventListener("mouseenter", Swal.stopTimer);
              toast.addEventListener("mouseleave", Swal.resumeTimer);
            },
          });

          Toast.fire({
            icon: "success",
            title: `เพิ่มสินค้าในตะกร้า`,
          });
        } else if (response == 2) {
          Swal.fire("ไม่สามารถเพิ่ม", "สินค้านี้อยู่ในตะกร้าแล้ว", "warning");
        }
      },
    });
  });
  $('.delprolist').click(function () {
    let id = $($(this).parents("tr.rowproduct")[0]).attr("id");
    let delprolist = "";
    $.post("./controller/cart.php", { id, delprolist }, function (data, textStatus, jqXHR) {
      if (textStatus) {
        window.location.reload();
      }
    });
  });
  $('#clearcart').click(function () {
    Swal.fire({
      title: 'คุณแน่ใจหรือไม่?',
      text: "ต้องการลบรายการสินค้าทั้งหมด",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'ใช่!',
      cancelButtonText: 'ยกเลิก'
    }).then((result) => {
      if (result.value) {
        let clearcart = "";
        $.post("./controller/cart.php", { clearcart },
          function (data, textStatus, jqXHR) {
            if (data == 1) {
              Swal.fire(
                'ลบรายการแล้ว',
                'รายการสินค้าลบหมดแล้ว',
                'success'
              ).then(function () {
                window.location.reload();
              });
            }
          }
        );
      }
    })
  });
  $('.quantity').on('keyup keypress blur change', function () {
    let id = $($(this).parents("tr.rowproduct")[0]).attr("id");
    let value = $(this).val();
    let price = parseFloat($('#product_price' + id).val());
    let price2 = price.toFixed(2);
    let x = value * price2;
    let xx = x.toFixed(2);
    let updatequantity = "";
    $('#showprice' + id).text(xx + ".-");
    $.post("./controller/cart.php", { updatequantity, value, id }, function (data, textStatus, jqXHR) {
      $('#total').text(parseFloat(data).toFixed(2)+'.-');
    });
  });
  //ทำระบบนับแบบนี้ไปก่อนเดียวค่อยกับมาแก้
}); 
