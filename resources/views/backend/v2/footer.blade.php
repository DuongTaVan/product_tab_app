{{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script> --}}
<script type="text/javascript" src="{{ secure_asset('/js/backend/v2/bootstrap-custom.js') }}"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jscolor/2.0.4/jscolor.min.js"></script>
<script src="//cdn.ckeditor.com/4.10.0/full/ckeditor.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ secure_asset('/js/backend/custom.js') }}"></script>
<script type="text/javascript" src="{{ secure_asset('/js/backend/v2/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
<script type="text/javascript"
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="{{ secure_asset('/bootstrap-iconpicker-1.10.0/dist/js/bootstrap-iconpicker.bundle.min.js')}}"></script>
<script type="text/javascript">
    //Plan
    function upgradeModal() {
        //$('#form-upgrade').modal({backdrop: 'static', keyboard: false}, 'show');
        $('#form-upgrade').modal('show');
    }

    var upgrade_model = '';
    $(document).on('click', '.upgrade-modal', function () {
        $('#form-upgrade').modal('show');
        upgrade_model = this;
    });
    //if you click CANCEL with PLAN popup
    $("#form-upgrade").on("hide.bs.modal", function (e) {
        $(upgrade_model).trigger('click');
    });

    function saveStatus(response) {
        var messageAlert = response.type;
        var messageText = response.message;
        var alertBox = '<div id="toast-container" class="toast-bottom-center"><div class="toast toast-' + messageAlert + '" aria-live="polite"><div class="toast-message">' + messageText + '</div></div></div>';
        if (messageAlert && messageText) {
            $('.ndn-loading').hide();
            $('.ndn-message').html(alertBox);
            $('.ndn-message').addClass('show');
            setTimeout(function () {
                $('.ndn-message').removeClass('show');
                $('.ndn-message').html('');
            }, 3000);
        }
    }

    //CUSTOM JS FOR APP HERE


</script>

<!-- Start of ndnappshelp Zendesk Widget script -->
<script id="ze-snippet"
        src="https://static.zdassets.com/ekr/snippet.js?key=c19b3ebd-46b2-4c72-b588-cac8deb76088"></script>
<!-- End of ndnappshelp Zendesk Widget script -->
<script type="text/javascript">
    $(function () {
        $('#showZendeskWidget').click(function (e) {
            $('#launcher').contents().find('#Embed button').click();
        });
    });
</script>
<script>
    CKEDITOR.replace('summary-ckeditor');
    CKEDITOR.replace('summary-description');
</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#imgInp").change(function () {
        readURL(this);
    });
    $(document).ready(function () {
        $('#example').DataTable();
    });

    $(document).ready(function () {
        $('#confirm-delete').on('show.bs.modal', function (e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
    $(function () {
        $('.js-add-item').click(function () {
            let route = '{{route('post.ajax_modal')}}';
            $.ajax({
                url: route,
            })
                .done(function (data) {
                    $('#exampleModal .modal-body').html(data.html);
                });
        });
        $('.js-edit-item').click(function () {
            let route = $(this).attr('href');
            $.ajax({
                url: route,
            })
                .done(function (data) {
                    //console.log(data.html);
                    $('#exampleModal .modal-body').html(data.html);
                });
        });
    });
    $('#target').iconpicker({
        cols: 10,
        rows: 5,
    });
</script>
@yield('script_dth')

@include('backend.v2.upgrade-popup')
@include('backend.v2.redirecting')
<div class="ndn-loading" style="display: none;">
    <img src="{{ secure_asset('/images/backend/ajax-spinner.gif') }}"/>
</div>
<div class="ndn-message">
    @include('backend.v2.message')
</div>

</body>
</html>