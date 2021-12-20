<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD 63116503</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="fa/css/font-awesome.min.css">
</head>

<style>
    .bg {
        background-color: #f2eddd;
        margin: 40px 20px;
    }
</style>

<body class="bg">
    <h4 class="text-center">Charissa food Items</h4>
    <br>
    <div class="container">
        <div class="col-md-12 mx-auto">
        <form class="row" >
            <br>
            <div class="col-3">
                <input type="number" class="form-control" placeholder="ID" id="listid">
            </div>

            <div class="col-4">
                <input type="text" class="form-control" placeholder="Name" id="listname">
            </div>

            <div class="col-3">
                <input type="number" class="form-control" placeholder="Price" id="listprice">
            </div>

            <div class="col-2">
                <button type="button" class="btn btn-primary" id='btnAdd'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>  Add</button>
            </div>
        </form>
    </div>

    <div class="container">
        <table id="tblAll" class="table table-striped" style="margin-top:23px">
            <thead>
                <tr>
                    <th>รหัสอาหาร :</th>
                    <th>เมนูอาหาร :</th>
                    <th>ราคาอาหาร :</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <br />
    </div>
    </div>
</body>

<script>
    $(function () {
        $('#btnAdd').on('click', function () {
            var listid, listname, listprice;
            listid = $("#listid").val();
            listname = $("#listname").val();
            listprice = $("#listprice").val();
            var edit = "<a class='edit' href='JavaScript:void(1);' >Edit</a>";
            var del = "<a class='delete' href='JavaScript:void(1);'>Delete</a>";
            if (listid == "" || listname == "" || listprice == " ") {
                alert("กรุณากรอกข้อมูลให้ครบถ้วน");
            } else {
                var table = "<tr><td>" + listid + "</td><td>" + listname + "</td><td>" + listprice + "</td><td>" + edit + "</td><td>" + del + "</td></tr>";
                $("#tblAll").append(table);
            }
            listid = $("#listid").val("");
            listname = $("#listname").val("");
            listprice = $("#listprice").val("");
            Clear();
        });
    });

    $('#btnUpdate').on('click', function () {
        var listid, listname, listprice;
        listid = $("#listid").val();
        listname = $("#listname").val();
        listprice = $("#listprice").val();
        $('#tblAll tbody tr').eq($('#hfRowIndex').val()).find('td').eq(0).html(listid);
        $('#tblAll tbody tr').eq($('#hfRowIndex').val()).find('td').eq(1).html(listname);
        $('#tblAll tbody tr').eq($('#hfRowIndex').val()).find('td').eq(2).html(listprice);
        $('#btnAdd').show();
        $('#btnUpdate').hide();
        Clear();
    });

    $("#tblAll").on("click", ".delete", function (e) {
        if (confirm("ยืนยันการลบ")) {
            $(this).closest('tr').remove();
        } else {
            e.preventDefault();
        }
    });

    $('#btnClear').on('click', function () {
        Clear();
    });

    $("#tblAll").on("click", ".edit", function (e) {
        var row = $(this).closest('tr');
        var td = $(row).find("td");
        $('#listname').val($(td).eq(0).html());
        $('#listid').val($(td).eq(1).html());
        $('#listprice').val($(td).eq(2).html());
        $('#btnAdd').show();
        $('#btnUpdate').show();
    });

    function Clear() {
        $("#listname").val("");
        $("#listid").val("");
        $("#listprice").val("");
    }
</script>


</html>
