$(document).ready(function() {
    $("#btn-add").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        /*var id = 0;
        id++;

        var d = new Date();
        d = d.toString("yy");

        var fmipa = 0;
        var fkh = 0;
        var lastNumber;
        var fk = $("#fakultas option:selected").val();
        if(fk == 'FMIPA'){
            fmipa++;
            fk = 42;
            if(fmipa < 10){
                fmipa="00"+ fmipa;
                lastNumber = fmipa;
            }else if(fmipa < 100){
                fmipa="0" + fmipa;
                lastNumber = fmipa;
            }else{
                fmipa = fmipa;
                lastNumber = fmipa;
            }
        }else{
            fkh++;
            fk = 41;
            if(fkh < 10){
                fkh="00"+ fkh;
                lastNumber = fkh;
            }else if(fkh < 100){
                fkh="0" + fkh;
                lastNumber = fkh;
            }else{
                fkh = fkh;
                lastNumber = fkh;
            }
        }*/

        /*var nim = d + fk + "101" + lastNumber;*/
        /*var nama = $("#addform input[name=nama]").val();
        var alamat = $("#addform input[name=alamat]").val();
        var fakultas = $("#fakultas option:selected").val();
        var token = $('input[name=_token]').val();*/

        $.ajax({
            type: 'POST',
            url: '/dashboard/dashboard/',
            data: {
                nama: $("#cnama").val(),
                alamat: $("#calamat").val(),
                fakultas: $("#cfakultas option:selected").val(),
            },
            dataType: 'json',
            success: function(data) {
                $('#addform').trigger("reset");
                $("#addform .close").click();
                window.location.reload();
            },
            error: function(data) {
                if (data.status === 422){
                    var errors = $.parseJSON(data.responseText);
                    $('#add-errors').html('');
                    $.each(errors.messages, function(key, value) {
                        $('#add-errors').append('<li>' + value + '</li>');
                    });
                    $("#add-error-bag").show();
                }
            }
        });
    });
    $("#btn-edit").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'PUT',
            url: '/dashboard/dashboard/' + $("#editform input[name=id]").val()+'/update' ,
            data: {
                nama: $("#enama").val(),
                alamat: $("#ealamat").val(),
                /*fakultas: $("#efakultas option:selected").val(),*/
            },
            dataType: 'json',
            success: function(data) {
                $('#editform').trigger("reset");
                $("#editform .close").click();
                window.location.reload();
            },
            error: function(data) {
                if (data.status === 422) {
                    var errors = $.parseJSON(data.responseText);
                    $('#edit-errors').html('');
                    $.each(errors.messages, function(key, value) {
                        $('#edit-errors').append('<li>' + value + '</li>');
                    });
                    $("#edit-error-bag").show();
                }
                /*$('#edit-errors').html('');
                $.each(errors.messages, function(key, value) {
                    $('#edit-errors').append('<li>' + value + '</li>');
                });
                $("#edit-error-bag").show();*/
            }
        });
    });
    $("#btn-delete").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'DELETE',
            url: '/dashboard/' + $("#delform input[name=id]").val(),
            dataType: 'json',
            success: function(data) {
                $("#delform .close").click();
                window.location.reload();
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
    /*$("#addmhsForm").click(function() {
        event.preventDefault();
        $("#add-error-bag").hide();
        $('#addModal').modal('show');
    });*/
});

function addmhsForm() {
    $(document).ready(function() {
        /*event.preventDefault();*/
        $("#add-error-bag").hide();
        $('#addModal').modal('show');
    });
}

function editmhsForm(id) {
    $.ajax({
        type: 'GET',
        url: '/dashboard/dashboard/' + id,
        success: function(data) {
            $("#edit-error-bag").hide();
            $("#enama input[name=nama]").val(data.mhs.nama);
            $("#ealamat input[name=alamat]").val(data.mhs.alamat);
            $("#efakultas option:selected").val(data.mhs.fakultas);
            $("#editform input[name=id]").val(data.mhs.id);
            $('#editModal').modal('show');
        },
        error: function(data) {
            console.log(data);
        }
    });
}

function deletemhsForm(id) {
    $.ajax({
        type: 'GET',
        url: '/dashboard/' + id,
        success: function(data) {
            $("#delform #delete-title").html("Delete (" + data.mhs.nama + ")?");
            $("#delform input[name=id]").val(data.mhs.id);
            $('#deleteModal').modal('show');
        },
        error: function(data) {
            console.log(data);
        }
    });
}
