@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-10 mx-auto mb-3">
                <h1>Edytuj kolejność kategorii</h1>
                <p>W łatwy sposób edytuj kolejność wyświetlanych kategorii. Złap element i upuść w wybranym miejscu,
                    następnie kliknij zapisz.</p>

                <div>
                    <form method="POST" action="{{ route('category.updateOrder') }}">
						@csrf
						@method('PUT')
                        <ul class="list-group rounded-0 drag-sort-enable">

                            @foreach ($categories as $category)
                                <li class="list-group-item mb-1 shadow-sm">
                                    <input type="hidden" name="id[]" value="{{ $category->id }}">
                                    <input type="hidden" name="order[]" value="{{ $category->order }}">
                                    <h5 class="fw-bold">{{ $category->catName }}</h5>
                                </li>
                            @endforeach

                        </ul>

						<button class="btn btn-outline-success my-5">Zapisz</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        function enableDragSort(listClass) {
            const sortableLists = document.getElementsByClassName(listClass);
            Array.prototype.map.call(sortableLists, (list) => {
                enableDragList(list)
            });
        }

        function enableDragList(list) {
            Array.prototype.map.call(list.children, (item) => {
                enableDragItem(item)
            });
        }

        function enableDragItem(item) {
            item.setAttribute('draggable', true)
            item.ondrag = handleDrag;
            item.ondragend = handleDrop;
        }

        function handleDrag(item) {
            const selectedItem = item.target,
                list = selectedItem.parentNode,
                x = event.clientX,
                y = event.clientY;

            let swapItem = document.elementFromPoint(x, y) === null ? selectedItem : document.elementFromPoint(x, y);

            if (list === swapItem.parentNode) {
                swapItem = swapItem !== selectedItem.nextSibling ? swapItem : swapItem.nextSibling;
                list.insertBefore(selectedItem, swapItem);
            }
        }

        function handleDrop(item) {
			document.querySelectorAll('[name="order[]"]').forEach((input, index) => input.value = index + 1);
        }

        (() => {
            enableDragSort('drag-sort-enable')
        })();
    </script>
@endsection
