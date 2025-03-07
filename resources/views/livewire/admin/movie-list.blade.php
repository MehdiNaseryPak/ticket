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
            <th class="text-center align-middle text-primary">نام</th>
            <th class="text-center align-middle text-primary">عکس</th>
            <th class="text-center align-middle text-primary">ژانر</th>
            <th class="text-center align-middle text-primary">کارگردان</th>
            <th class="text-center align-middle text-primary"> کامنت گذاری</th>
            <th class="text-center align-middle text-primary"> وضعیت</th>
            <th class="text-center align-middle text-primary">ویرایش</th>
            <th class="text-center align-middle text-primary">حذف</th>
            <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody>
        @foreach($movies as $movie)
            <tr>
                <td class="text-center align-middle">{{ $loop->iteration }}</td>
                <td class="text-center align-middle">{{ $movie->name }}</td>
                <td class="text-center align-middle"><img src="{{ asset('images/movies/small/'.$movie->image) }}" class="rounded-circle" width="80" height="80" /></td>
                <td class="text-center align-middle">{{ $movie->genre }}</td>
                <td class="text-center align-middle">{{ $movie->director }}</td>
                <td class="text-center align-middle">
                    @if($movie->commentable == 1)
                        <span class="cursor-pointer badge badge-success" wire:click="changeCommentable({{ $movie->id }})">فعال</span>
                    @else
                        <span class="cursor-pointer badge badge-danger" wire:click="changeCommentable({{ $movie->id }})">غیر فعال</span>
                    @endif
                </td>
                <td class="text-center align-middle">
                    @if($movie->status == 1)
                        <span class="cursor-pointer badge badge-success" wire:click="changeStatus({{ $movie->id }})">فعال</span>
                    @else
                        <span class="cursor-pointer badge badge-danger" wire:click="changeStatus({{ $movie->id }})">غیر فعال</span>
                    @endif
                </td>
                <td class="text-center align-middle">
                    <a class="btn btn-outline-info" href="{{ route('admin.movies.edit',$movie->id) }}">
                        ویرایش
                    </a>
                </td>
                <td class="text-center align-middle">
                    <button class="btn btn-outline-danger"  wire:click="deleteConfirm({{ $movie->id }})">
                        حذف
                    </button>
                </td>
                <td class="text-center align-middle">{{ verta($movie->created_at) }}</td>
            </tr>
        @endforeach
    </table>
    <div style="margin: 40px !important;" class="pagination pagination-rounded pagination-sm d-flex justify-content-center">{{ $movies->links() }}</div>
</div>
@section('script')
    <script>
        document.addEventListener('livewire:init', () => {
            console.log("livewireLoad");
            Livewire.on('deleteMovie', (message,type) => {
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
                        Livewire.dispatch('delete',{id: message.movieId});
                    }
                })
            })
        })
    </script>
@endsection
