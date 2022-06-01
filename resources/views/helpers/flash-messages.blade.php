@if (session('status'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success" role="alert">
                <div class="float-end">
                    <button class="btn-close" data-bs-dismiss="alert" aria-hidden="true">
                        &times;
                    </button>
                </div>
                {{ session('status') }}
            </div>
        </div>
    </div>
@endif
