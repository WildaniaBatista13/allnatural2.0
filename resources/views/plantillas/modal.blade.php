<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order PDF</title>
    <!-- Incluye aquí el CSS de tu framework de modal, por ejemplo Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order PDF</h5>
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
                <a href="{{ route('home.index') }}" class="close">x</a>
            </div>
            <div class="modal-body">
                <iframe src="data:application/pdf;base64,{{ base64_encode($pdf) }}" width="100%" height="500px"></iframe>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-secondary" href="{{ route('home.index') }}">Close</a>
            </div>
        </div>
    </div>
</div>

<!-- Scripts de JavaScript de Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Script para mostrar el modal automáticamente -->
<script>
    $(document).ready(function(){
        $('#pdfModal').modal('show');
    });
</script>

</body>
</html>