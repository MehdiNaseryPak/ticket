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
            <th class="text-center align-middle text-primary">نام و نام خانوادگی</th>
            <th class="text-center align-middle text-primary">عکس</th>
            <th class="text-center align-middle text-primary">موبایل</th>
            <th class="text-center align-middle text-primary">ایمیل</th>
            <th class="text-center align-middle text-primary">تاریخ تولد</th>
            <th class="text-center align-middle text-primary"> وضعیت</th>
            <th class="text-center align-middle text-primary">ویرایش</th>
            <th class="text-center align-middle text-primary">حذف</th>
            <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td class="text-center align-middle">{{ $loop->iteration }}</td>
                <td class="text-center align-middle">{{ $user->name }}</td>
                <td class="text-center align-middle"><img src="{{ asset('images/users/small/'.$user->image) }}" class="rounded-circle" width="80" height="80" /></td>
                <td class="text-center align-middle">{{ $user->mobile }}</td>
                <td class="text-center align-middle">{{ $user->email }}</td>
                <td class="text-center align-middle">{{ $user->birthdate }}</td>
                <td class="text-center align-middle">
                    @if($user->status == 1)
                        <span class="cursor-pointer badge badge-success" wire:click="changeStatus({{ $user->id }})">فعال</span>
                    @else
                        <span class="cursor-pointer badge badge-danger" wire:click="changeStatus({{ $user->id }})">غیر فعال</span>
                    @endif
                </td>
                <td class="text-center align-middle">
                    <a class="btn btn-outline-info" href="{{ route('admin.users.edit',$user->id) }}">
                        ویرایش
                    </a>
                </td>
                <td class="text-center align-middle">
                    <button class="btn btn-outline-danger"  wire:click="deleteConfirm({{ $user->id }})">
                        حذف
                    </button>
                </td>
                <td class="text-center align-middle">{{ verta($user->created_at) }}</td>
            </tr>
        @endforeach
    </table>
    <div style="margin: 40px !important;" class="pagination pagination-rounded pagination-sm d-flex justify-content-center">{{ $users->links() }}</div>
</div>
@section('script')
    <script>
        document.addEventListener('livewire:init', () => {
            console.log("livewireLoad");
            Livewire.on('deleteUser', (message,type) => {
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
                        Livewire.dispatch('delete',{id: message.userId});
                    }
                })
            })
        })
    </script>
@endsection
