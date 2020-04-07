//* Datatable
$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#table-admin-products").DataTable();
    $("#table-admin-category").DataTable();
    $("#table-admin-size").DataTable();
    $("#table-admin-post").DataTable();

    $("#form-product").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: $("#form-product").attr("action"),
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: (res) => {
                $("#form-product .alert-dismissible").remove();
                $("#form-product").prepend(`
                    <div class="alert alert-success alert-dismissible fade" role="alert">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">×</span>
                        </button>
                        ${res.message}
                    </div>`);
                setTimeout(() => {
                    $("#form-product .alert-dismissible").remove();
                }, 3000);
                console.log(res);
            },
            error: (e) => {
                $("#form-product .alert-dismissible").remove();
                $("#form-product").prepend(`
                    <div class="alert alert-danger alert-dismissible fade" role="alert">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">×</span>
                        </button>
                        ${e.responseJSON.message}
                    </div>`);
                setTimeout(() => {
                    $("#form-product .alert-dismissible").remove();
                }, 3000);
                console.log(e.responseJSON);
            },
        });
    });

    $("#form-create-product").submit(function (e) {
        e.preventDefault();
        let form = $(this);

        $.ajax({
            type: "POST",
            url: $("#form-product").attr("action"),
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: (res) => {
                window.location.href = res.redirect;
            },
            error: (e) => {
                form.find(".alert-dismissible");
                form.prepend(`
                    <div class="alert alert-danger alert-dismissible fade" role="alert">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">×</span>
                        </button>
                        ${e.responseJSON.message}
                    </div>`);
                setTimeout(() => {
                    form.find(".alert-dismissible").remove();
                }, 3000);
                console.log(e.responseJSON);
            },
        });
    });

    $("#form-category").submit(function (e) {
        e.preventDefault();
        let form = $(this);

        $.ajax({
            type: "POST",
            url: form.attr("action"),
            data: form.serialize(),
            dataType: "json",
            success: (res) => {
                form.find(".alert-dismissible").remove();
                form.prepend(`
                    <div class="alert alert-success alert-dismissible fade" role="alert">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">×</span>
                        </button>
                        ${res.message}
                    </div>`);

                setTimeout(() => {
                    form.find(".alert-dismissible").remove();
                }, 3000);

                $("#table-admin-category")
                    .DataTable()
                    .row.add(
                        $(`
                        <tr>
                            <td>${res.category.id}</td>
                            <td>${res.category.name}</td>
                            <td class="row-actions">
                                <a href="${res.category.url}")}}">
                                    <i class="os-icon os-icon-ui-49"></i>
                                </a>
                                <a class="danger" href="#">
                                    <i class="os-icon os-icon-ui-15"></i>
                                </a>
                            </td>
                        </tr>`).appendTo($("#table-admin-category tbody"))
                    )
                    .draw();
            },
            error: (e) => {
                form.find(".alert-dismissible");
                form.prepend(`
                    <div class="alert alert-danger alert-dismissible fade" role="alert">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">×</span>
                        </button>
                        ${e.responseJSON.message}
                    </div>`);
                setTimeout(() => {
                    form.find(".alert-dismissible").remove();
                }, 3000);
                console.log(e.responseJSON);
            },
        });
    });

    $("#form-size").submit(function (e) {
        e.preventDefault();
        let form = this;

        $.ajax({
            type: "POST",
            url: form.attr("action"),
            data: form.serialize(),
            dataType: "json",
            success: (res) => {
                form.find(".alert-dismissible").remove();
                form.prepend(`
                    <div class="alert alert-success alert-dismissible fade" role="alert">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">×</span>
                        </button>
                        ${res.message}
                    </div>`);

                setTimeout(() => {
                    form.find(".alert-dismissible").remove();
                }, 3000);

                $("#table-admin-size")
                    .DataTable()
                    .row.add(
                        $(`
                        <tr>
                            <td>${res.size.id}</td>
                            <td>${res.size.name}</td>
                            <td class="row-actions">
                                <a href="${res.size.url}")}}">
                                    <i class="os-icon os-icon-ui-49"></i>
                                </a>
                                <a class="danger" href="#">
                                    <i class="os-icon os-icon-ui-15"></i>
                                </a>
                            </td>
                        </tr>`).appendTo($("#table-admin-category tbody"))
                    )
                    .draw();
            },
            error: (e) => {
                form.find(".alert-dismissible");
                form.prepend(`
                    <div class="alert alert-danger alert-dismissible fade" role="alert">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">×</span>
                        </button>
                        ${e.responseJSON.message}
                    </div>`);
                setTimeout(() => {
                    form.find(".alert-dismissible").remove();
                }, 3000);
                console.log(e.responseJSON);
            },
        });
    });

    $("#form-post").submit(function (e) {
        e.preventDefault();
        let form = $(this);

        $.ajax({
            type: "POST",
            url: form.attr("action"),
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: (res) => {
                form.find(".alert-dismissible").remove();
                form.prepend(`
                    <div class="alert alert-success alert-dismissible fade" role="alert">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">×</span>
                        </button>
                        ${res.message}
                    </div>`);

                setTimeout(() => {
                    form.find(".alert-dismissible").remove();
                }, 3000);
                console.log(res);
            },
            error: (e) => {
                form.find(".alert-dismissible");
                form.prepend(`
                    <div class="alert alert-danger alert-dismissible fade" role="alert">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">×</span>
                        </button>
                        ${e.responseJSON.message}
                    </div>`);
                setTimeout(() => {
                    form.find(".alert-dismissible").remove();
                }, 3000);
                console.log(e.responseJSON);
            },
        });
    });

    $(".dt-delete, .single-delete").on("click", function () {
        return confirm(
            "Are you sure you want to delete this? This action cannot be undone."
        );
    });

    $("input[type=file]").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(".input-preview").attr("src", e.target.result);
            };

            reader.readAsDataURL(this.files[0]);
        }
    });

    $("#content-editor").on("keyup", function (e) {
        if (e.key === "Enter") {
            $(this).val(
                $(this)
                    .val()
                    .replace(/\n(?!.|\n)/g, "\n<br>\n")
            );
        }

        let content = $(this).val();
        $("#preview-post").html(content);
        $("#content-editor").trigger("change");
    });

    $("textarea").on("change", function () {
        $(this)
            .height(105)
            .height(
                this.scrollHeight - parseInt($(this).css("padding-top")) * 2
            );
    });

    $("#add-content-i").click(function (e) {
        e.preventDefault();

        $("#content-editor").val(`${$("#content-editor").val()}<i></i>`);
        $("#content-editor").trigger("change");
    });

    $("#add-content-b").click(function (e) {
        e.preventDefault();

        $("#content-editor").val(`${$("#content-editor").val()}<b></b>`);
        $("#content-editor").trigger("change");
    });

    $("#add-content-link").click(function (e) {
        e.preventDefault();

        $("#content-editor").val(
            `${$("#content-editor").val()}<a href=""></a>`
        );
        $("#content-editor").trigger("change");
    });

    $("#add-content-ul").click(function (e) {
        e.preventDefault();

        if (!$(this).hasClass("opened")) {
            $("#content-editor").val(`${$("#content-editor").val()}\n<ul>`);
            $(this).addClass("opened");
            $(this).text("/ul");
        } else {
            $("#content-editor").val(`${$("#content-editor").val()}</ul>`);
            $(this).removeClass("opened");
            $(this).text("ul");
        }
        $("#content-editor").trigger("change");
    });

    $("#add-content-ol").click(function (e) {
        e.preventDefault();

        if (!$(this).hasClass("opened")) {
            $("#content-editor").val(`${$("#content-editor").val()}\n<ol>`);
            $(this).addClass("opened");
            $(this).text("/ol");
        } else {
            $("#content-editor").val(`${$("#content-editor").val()}</ol>`);
            $(this).removeClass("opened");
            $(this).text("ol");
        }
        $("#content-editor").trigger("change");
    });

    $("#add-content-li").click(function (e) {
        e.preventDefault();

        if (!$(this).hasClass("opened")) {
            $("#content-editor").val(`${$("#content-editor").val()}\n<li>`);
            $(this).addClass("opened");
            $(this).text("/li");
        } else {
            $("#content-editor").val(`${$("#content-editor").val()}</li>`);
            $(this).removeClass("opened");
            $(this).text("li");
        }
        $("#content-editor").trigger("change");
    });
});
