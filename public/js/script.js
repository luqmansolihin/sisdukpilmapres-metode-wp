$(function () {
    // lightbox
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
            alwaysShowClose: true
        });
    });
    
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
    
    // custom file input
    bsCustomFileInput.init();

    // datatable
    $('#table_data').DataTable({
        pagingType: 'numbers',
        buttons: [
        {extend: 'csv', className:'bg-primary btn-outline-primary'},
        {extend: 'excel', className:'bg-primary btn-outline-primary'},
        {extend: 'pdf', className:'bg-primary btn-outline-primary'}
    ]
    }).buttons().container().appendTo('#table_data_wrapper .col-md-6:eq(0)');

    // datatable pcu sarjana
    $('#table_data_sarjana').DataTable({
        pagingType: 'numbers',
        buttons: [
        {extend: 'csv', className:'bg-primary btn-outline-primary'},
        {extend: 'excel', className:'bg-primary btn-outline-primary'},
        {extend: 'pdf', className:'bg-primary btn-outline-primary'}
    ]
    }).buttons().container().appendTo('#table_data_sarjana_wrapper .col-md-6:eq(0)');

    // datatable pcu diploma
    $('#table_data_diploma').DataTable({
        pagingType: 'numbers',
        buttons: [
        {extend: 'csv', className:'bg-primary btn-outline-primary'},
        {extend: 'excel', className:'bg-primary btn-outline-primary'},
        {extend: 'pdf', className:'bg-primary btn-outline-primary'}
    ]
    }).buttons().container().appendTo('#table_data_diploma_wrapper .col-md-6:eq(0)');

    // datatable tahun seleksi
    $('#table_data_tahun_seleksi').DataTable({
        order: [0, 'desc'],
        pagingType: 'numbers',
        buttons: [
            {extend: 'csv', className:'bg-primary btn-outline-primary'},
            {extend: 'excel', className:'bg-primary btn-outline-primary'},
            {extend: 'pdf', className:'bg-primary btn-outline-primary'}
        ]
    }).buttons().container().appendTo('#table_data_tahun_seleksi_wrapper .col-md-6:eq(0)');

    // datatable masukan capaian unggulan
    $('#table_data_capaian_unggulan').DataTable({
        pagingType: 'numbers'
    });

    // option toast
    var option = {
        animation: true,
        autohide: true,
        delay: 5000
    }

    // toast dashboard
    $('.toast').toast(option).toast('show');

    // datetime picker tahun seleksi
    $('#tanggal_buka').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
        icons: {
            time: "fas fa-clock"
        }
    });

    // datetime picker tahun seleksi
    $('#tanggal_tutup').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
        icons: {
            time: "fas fa-clock"
        }
    });
});

// preview image
function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
}

// preview image capaian unggulan
function previewImageCU() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
}