
        $(document).ready(function () {
            $('.modal').modal();
            $("#note-container").on("click", "#editBtn", function () {
                $('#modal1').modal('open');
                $("#note-id").val($(this).data("id"));
                $("#textarea2").val($(this).siblings("p").text());
            })
        });

        //when u type in the text area the button get enabled once u stop typing
        $("#textarea1").keyup(function () {
            if ($(this).val()) {
                $("#postNote").removeAttr('disabled');
            }
            else {
                $("#postNote").attr('disabled', true);
            }
        })

        var post = function (requestType, id) {
            var text = $("#textarea1").val();
            var user = "Fatma Mohammed";
            if (requestType == undefined && id == undefined) {
                requestType = "";
            }

            else if (id == undefined ) {
                id = '';
                if (requestType == "edit") {
                text = $("#textarea2").val();
                id = $("#note-id").val();
            }
            }
            else if (requestType == "del") {
                var a = window.confirm("are you sure you want to delete this?");
                if (a == false) {
                    id = '';
                }
            }
            // else if (requestType == "edit") {
            //     // alert("edit");
            //     id = '';
            //     text = $("#textarea2").val();
            //     id = $("#note-id").val();
            // }

            // window.alert(requestType);

            $.get("server.php",
                {
                    t: text,
                    u: user,
                    d: id,
                    req: requestType

                }).done(function (data) {
                    $("#note-container").html(data);
                    $("#textarea1").val("");
                })
        }


        $(document).ready(post);

        //calling the post funcrion from the submit buttom with preventing the ready document from invoking it 
        $("#postNote").click(function () {
            var type = "add";
            post(type);
        })
        $("#edit-postNote").click(function () {
            var type = "edit";
            post(type);
        })


        //prevent the page from reloading when pressing submit
        $("form").submit(function (a) {
            a.preventDefault();
        });

