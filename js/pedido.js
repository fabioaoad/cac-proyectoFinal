$(document).ready(function() {
    let confirma = document.getElementById("confirma");

    // $('.btn-danger').on('click',function(e))
    var id_modal;
    $("#confirma").on("shown.bs.modal", function(e) {
        $("#texto-confirma").html(
            "¿Desea eliminar el pedido Nº " + e.relatedTarget.dataset.id + "?"
        );
        id_modal = e.relatedTarget.dataset.id;
    });
    // confirma.addEventListener("show.bs.modal", (e) => {
    //   document.getElementById("texto-confirma").innerHTML =
    //     "¿Desea eliminar el pedido Nº " + e.relatedTarget.dataset.id + "?";
    //   document.getElementById("btnSi").dataset.id = e.relatedTarget.dataset.id;
    // });

    jQuery(".btnSi").on("click", function() {
        // var $this = $(this).data("id");
        $.ajax({
            type: "POST",
            url: "../controller/borrarPedidoC.php",
            data: { id: id_modal },
            success: function(res) {
                // $("table tbody td")
                //   .find('[data-idpedido="' + id_modal + '"]')
                //   .remove();
            },
        });
    });
    $(".btnEditar").on("click", function(e) {
        let pr = $(this).parents("tr");
        $("#idpedido").val(pr.find("td")[0].textContent);
        $("#username").val(pr.find("td")[0].dataset.usuario);
        $("#firstName").val(pr.find("td")[1].textContent);
        $("#lastName").val(pr.find("td")[2].textContent);
        $("#email").val(pr.find("td")[3].textContent);
        $("#address").val(pr.find("td")[4].textContent);
        $("#state").val(pr.find("td")[6].dataset.idprovincia).change();
        $("#country").val(pr.find("td")[5].dataset.idlocalidad);
        $("#zip").val(pr.find("td")[7].textContent);
        $("[name='paymentMethod'][value='" + pr.find("td")[8].textContent + "']").prop('checked', true).change();
        $("#cc-name").val(pr.find("td")[9].textContent);
        $("#cc-number").val(pr.find("td")[10].textContent);
        $("#cc-expiration").val(pr.find("td")[11].textContent);
        $("#cc-cvv").val(pr.find("td")[12].textContent);
    });
    $('.btn-update').on('click', function(e) {
        let form = $(this).parents('.modal-body').find('form');
        let data = new FormData(form[0]);
        data.append('username', $("#username").val());
        $.ajax({
            type: "POST",
            url: "../controller/altaPedido.php",
            data: data,
            cache: false,
            processData: false,
            contentType: false,

            success: function(res) {
                console.log(res);
                if (res == 1) {
                    location.reload();
                }
            },
        });
    });
});