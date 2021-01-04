@component('files.includes.file', compact('file'))
    @slot('links')
        <div class="level">
            <div class="level-left">
                <p class="level-item">
                    <a href="{{route('admin.files.show',$file)}}">Preview changes</a>
                </p>


                <p class="level-item">
                    <a href="#"
                       onclick="event.preventDefault();document.getElementById('approved-{{$file->id}}').submit()">Approve</a>
                </p>
                <form action="{{route('admin.files.updated.update',$file)}}" id="approved-{{$file->id}}" method="post"
                      class="is-hidden">
                    @csrf
                    @method('PATCH')
                </form>


                <p class="level-item">
                    <a href="#"
                       onclick="event.preventDefault();document.getElementById('reject-{{$file->id}}').submit()">Reject</a>
                </p>
                <form action="{{route('admin.files.updated.update',$file)}}" id="reject-{{$file->id}}" method="post"
                      class="is-hidden">
                    @csrf
                    @method('DELETE')
                </form>


            </div>
        </div>
    @endslot
@endcomponent
