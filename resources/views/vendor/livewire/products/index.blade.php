<div class="card">
    <div class="card-header">
        <h2>Halaman Empat</h2>

        <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
                <a href="/products/create" active="{{ request()->routeIs('products/create') }}" class="btn btn-block btn-primary">Tambah Product</a>
          </div>
        </div>
      </div>
    <div class="card-body">
        <div>

            <x-data-table/>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      Footer
    </div>
    <!-- /.card-footer-->
  </div>

