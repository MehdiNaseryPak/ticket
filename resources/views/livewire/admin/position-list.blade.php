<div class="table overflow-auto" tabindex="8">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">عنوان جستجو</label>
        <div class="col-sm-10">
            <input type="text" class="form-control text-left" dir="rtl" wire:model="search">
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead class="thead-light">
        <tr>
            <th class="text-center align-middle text-primary">ردیف</th>
            <th class="text-center align-middle text-primary">ردیف</th>
            <th class="text-center align-middle text-primary">شماره</th>
            <th class="text-center align-middle text-primary"> وضعیت</th>
            <th class="text-center align-middle text-primary">ویرایش</th>
            <th class="text-center align-middle text-primary">حذف</th>
            <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody>
        @foreach($positions as $position)
            <tr>
                <td class="text-center align-middle">{{ $loop->iteration }}</td>
                <td class="text-center align-middle">{{ $position->row }}</td>
                <td class="text-center align-middle">{{ $position->number }}</td>
                <td class="text-center align-middle">
                    @if($position->status == 1)
                        <span class="cursor-pointer badge badge-success" wire:click="changeStatus({{ $position->id }})">فعال</span>
                    @else
                        <span class="cursor-pointer badge badge-danger" wire:click="changeStatus({{ $position->id }})">غیر فعال</span>
                    @endif
                </td>
                <td class="text-center align-middle">
                    <a class="btn btn-outline-info" href="{{ route('admin.positions.edit',$position->id) }}">
                        ویرایش
                    </a>
                </td>
                <td class="text-center align-middle">
                    <button class="btn btn-outline-danger"  wire:click="deleteConfirm({{ $position->id }})">
                        حذف
                    </button>
                </td>
                <td class="text-center align-middle">{{ verta($position->created_at) }}</td>
            </tr>
        @endforeach
    </table>
    <div style="margin: 40px !important;" class="pagination pagination-rounded pagination-sm d-flex justify-content-center">{{ $positions->links() }}</div>
</div>
@section('script')
    <script>
        document.addEventListener('livewire:init', () => {
            console.log("livewireLoad");
            Livewire.on('deletePosition', (message,type) => {
                Swal.fire({
                    title: 'آیا مطمئن هستید؟',
                    text: "این عملیات قابل بازگشت نیست!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'بله حذف کن',
                    cancelButtonText: 'خیر'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('delete',{id: message.positionId});
                    }
                })
            })
        })
    </script>
@endsection
