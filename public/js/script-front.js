$(function() {
    // ajax select program studi
    $('#program_studi').attr('disabled', true);
    $('#program_pendidikan').click(function() {
        var program_pendidikan = $(this).val();
        if(program_pendidikan == "Sarjana") {
            $('#program_studi').attr('disabled', false);
            $('#program_studi').empty();
            $('#program_studi').append("<option value='S1 Teknik Elektro' @if (old('program_studi') == 'S1 Teknik Elektro') selected @endif>S1 Teknik Elektro</option>");
            $('#program_studi').append("<option value='S1 Teknik Sipil' @if (old('program_studi') == 'S1 Teknik Sipil') selected @endif>S1 Teknik Sipil</option>");
            $('#program_studi').append("<option value='S1 Teknik Mesin' @if (old('program_studi') == 'S1 Teknik Mesin') selected @endif>S1 Teknik Mesin</option>");
        }else if(program_pendidikan == "Diploma"){
            $('#program_studi').attr('disabled', false);
            $('#program_studi').empty();
            $('#program_studi').append("<option value='D3 Teknik Mesin' @if (old('program_studi') == 'D3 Teknik Mesin') selected @endif>D3 Teknik Mesin</option>");
        }
    });
});

// option toast
var option = {
    animation: true,
    autohide: true,
    delay: 5000
}

// toast front end
var myAlert = document.querySelector('.toast');
var bsAlert = new bootstrap.Toast(myAlert, option);
bsAlert.show();

